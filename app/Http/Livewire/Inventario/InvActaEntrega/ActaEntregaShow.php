<?php

namespace App\Http\Livewire\Inventario\InvActaEntrega;

use App\Enums\EStateActaEntrega;
use App\Models\InvActaEntrega;
use App\Models\InvProducto;
use App\Models\InvProductoHistorial;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class ActaEntregaShow extends Component
{
    public $model;

    protected $rules = [
        'model.responsable' => 'required',
        'model.fecha_entrega' => 'required',
        'model.descripcion' => 'required',
        'model.area' => 'required',
        'model.centro_operativo' => 'required',
        'model.ubicacion' => 'required',
    ];

    protected $listeners = ['selectProduct' => 'addDetalle', 'deleteDetalle', 'finalizar'];

    public function mount(InvActaEntrega $invActaEntrega)
    {
        $this->model = $invActaEntrega;
    }

    public function render()
    {

        switch ($this->model->estado) {
            case EStateActaEntrega::CREADO->getId():
                return view('livewire.inventario.inv-acta-entrega.acta-entrega-show', [
                    'items' => [
                        ['id' => 'paso1', 'nombre' => 'Crear Acta de Entrega', 'icon' => '\f13e'],
                        ['id' => 'paso2', 'nombre' => 'Agregar Articulos', 'icon' => '\f015'],
                        /* ['id' => 'paso3', 'nombre' => 'Revisión', 'icon' => '\f007'], */
                    ],
                    'users' => User::getEmpleadosActivos()
                ]);
                break;
            case EStateActaEntrega::CERRADO->getId():
                return view('livewire.inventario.inv-acta-entrega.acta-entrega-cerrado');
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
        $this->model->detalle()->attach($product, ['stock' => 1]);
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
        $this->model->estado = EStateActaEntrega::CERRADO->getId();
        $this->model->save();


        $user = User::find(auth()->user()->id);
        foreach ($this->model->detalle as $detalle) {
            //cambiar la ubicacion actual del producto
            $detalle->ubicacion()->associate($user);
            $detalle->save();

            //Cremos el historial de cada producto
            $historial = new InvProductoHistorial();
            $historial->responsable = $this->model->responsable;
            $historial->icon = "receipt_long";
            $historial->descripcion = "Se Agrego a la acta de Entrega N° " . $this->model->id;
            $historial->ubicacion()->associate($user);
            $detalle->historial()->save($historial);
        }



        DB::commit();
    }
}
