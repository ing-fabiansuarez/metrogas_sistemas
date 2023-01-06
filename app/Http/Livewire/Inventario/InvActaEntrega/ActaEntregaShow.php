<?php

namespace App\Http\Livewire\Inventario\InvActaEntrega;

use App\Enums\EStateActaEntrega;
use App\Models\InvActaEntrega;
use App\Models\InvProducto;
use App\Models\User;
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
        $this->model->detalle()->save($product, ['stock' => 1]);
        $this->model->refresh();
    }
    public function deleteDetalle(InvProducto $product)
    {
        $this->model->detalle()->detach($product);
        $this->model->refresh();
    }
    public function finalizar()
    {
        $this->model->estado = EStateActaEntrega::CERRADO->getId();
        $this->model->save();
    }
}
