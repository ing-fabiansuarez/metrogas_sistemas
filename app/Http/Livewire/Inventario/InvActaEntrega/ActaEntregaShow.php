<?php

namespace App\Http\Livewire\Inventario\InvActaEntrega;

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
    ];

    protected $listeners = ['addProduct'];

    public function mount(InvActaEntrega $invActaEntrega)
    {
        $this->model = $invActaEntrega;
    }

    public function render()
    {
        return view('livewire.inventario.inv-acta-entrega.acta-entrega-show', [
            'items' => [
                ['id' => 'paso1', 'nombre' => 'Crear Acta de Entrega', 'icon' => '\f13e'],
                ['id' => 'paso2', 'nombre' => 'Agregar Articulos', 'icon' => '\f015'],
                ['id' => 'paso3', 'nombre' => 'Revisión', 'icon' => '\f007'],
            ],
            'users' => User::getEmpleadosActivos()
        ]);
    }

    public function addProduct(InvProducto $id)
    {
        dd($id);
    }
}
