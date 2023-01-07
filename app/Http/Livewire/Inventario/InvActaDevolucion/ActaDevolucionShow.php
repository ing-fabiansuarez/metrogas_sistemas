<?php

namespace App\Http\Livewire\Inventario\InvActaDevolucion;

use App\Enums\EStateActaDevolucion;
use App\Models\InvActaDevolucion;
use App\Models\InvBodega;
use App\Models\InvProducto;
use App\Models\InvProductoHistorial;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class ActaDevolucionShow extends Component
{

    public $model;

    protected $rules = [
        'model.fecha_entrega' => 'required',
        'model.quien_entrega' => 'required',
        'model.area' => 'required',
        'model.centro_operativo' => 'required',
        'model.ubicacion' => 'required',
        'model.descripcion' => 'required',
        'model.bodega_id_entrega' => 'required',
    ];

    protected $listeners = ['selectProduct' => 'addDetalle', 'deleteDetalle', 'finalizar'];

    public function mount(InvActaDevolucion $invActaDevolucion)
    {
        $this->model = $invActaDevolucion;
    }

    public function render()
    {
        switch ($this->model->estado) {
            case EStateActaDevolucion::CREADO->getId():
                return view('livewire.inventario.inv-acta-devolucion.acta-devolucion-show', [
                    'items' => [
                        ['id' => 'paso1', 'nombre' => 'Crear Acta de Devolución', 'icon' => '\f13e'],
                        ['id' => 'paso2', 'nombre' => 'Agregar Articulos', 'icon' => '\f015'],
                        /* ['id' => 'paso3', 'nombre' => 'Revisión', 'icon' => '\f007'], */
                    ],
                    'users' => User::getEmpleadosActivos(),
                    'bodegas' => InvBodega::all()
                ]);
                break;
            case EStateActaDevolucion::CERRADO->getId():
                return view('livewire.inventario.inv-acta-devolucion.acta-devolucion-cerrado');
                break;
        }
    }

    public function addDetalle(InvProducto $product)
    {
        if ($this->model->detalle->contains($product)) {
            $this->emit('mensaje', [
                'typeMsg' => 1,
                'title' => 'No se puede agregar!',
                'cuerpo' => 'El producto ya esta agregado en el detalle!'
            ]);
            return;
        }
        switch (get_class($product->ubicacion)) {
            case User::class:
                if ($product->ubicacion->id != $this->model->quien_entrega) {
                    $this->emit('mensaje', [
                        'typeMsg' => 1,
                        'title' => 'No se puede agregar!',
                        'cuerpo' => 'El producto no se puede agregar por que el poducto no esta en el poder del empleado '
                    ]);
                    return;
                }

                break;
            case InvBodega::class:
                $this->emit('mensaje', [
                    'typeMsg' => 1,
                    'title' => 'No se puede agregar!',
                    'cuerpo' => 'El producto no se puede agregar por que el poducto esta en bodega'
                ]);
                return;
                break;
        }

        $this->model->detalle()->attach($product, ['cantidad' => 1]);
        $this->model->refresh();
    }
    public function deleteDetalle(InvProducto $product)
    {
        $this->model->detalle()->detach($product);
        $this->model->refresh();
    }
    public function finalizar()
    {
        DB::beginTransaction();
        $this->model->estado = EStateActaDevolucion::CERRADO->getId();
        $this->model->save();


        $bodega = InvBodega::find($this->model->bodega_id_entrega);
        foreach ($this->model->detalle as $detalle) {
            //cambiar la ubicacion actual del producto
            $detalle->ubicacion()->associate($bodega);
            $detalle->save();

            //Cremos el historial de cada producto
            $historial = new InvProductoHistorial();
            $historial->responsable = $this->model->quien_entrega;
            $historial->icon = "receipt_long";
            $historial->descripcion = "Por medio del acta de devolución N° " . $this->model->id . ' el articulo regreso a la bodega ' . $bodega->nombre;
            $historial->ubicacion()->associate($bodega);
            $detalle->historial()->save($historial);
        }



        DB::commit();
    }
}
