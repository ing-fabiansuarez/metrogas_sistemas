<?php

namespace App\Http\Livewire\Inventario\InvActaDevolucion;

use App\Enums\EStateActaDevolucion;
use App\Models\InvActaDevolucion;
use App\Models\InvProducto;
use App\Models\User;
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
                    'users' => User::getEmpleadosActivos()
                ]);
                break;
            case EStateActaDevolucion::CERRADO->getId():
                return view('livewire.inventario.inv-acta-devolucion.acta-devolucion-cerrado');
                break;
        }
    }

    public function addDetalle(InvProducto $product)
    {
        $this->model->detalle()->save($product, ['cantidad' => 1]);
        $this->model->refresh();
    }
    public function deleteDetalle(InvProducto $product)
    {
        $this->model->detalle()->detach($product);
        $this->model->refresh();
    }
    public function finalizar()
    {
        $this->model->estado = EStateActaDevolucion::CERRADO->getId();
        $this->model->save();
    }
}
