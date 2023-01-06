<?php

namespace App\Http\Livewire\Inventario\InvActaEntrega;

use App\Enums\EStateActaEntrega;
use App\Models\InvActaEntrega;
use App\Models\User;
use Livewire\Component;

class ActaEntregaCreate extends Component
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

    public function mount($model = new InvActaEntrega())
    {
        $this->model = $model;
    }

    public function render()
    {
        return view('livewire.inventario.inv-acta-entrega.acta-entrega-create', [
            'items' => [
                ['id' => 'paso1', 'nombre' => 'Crear Acta de Entrega', 'icon' => '\f13e'],
                ['id' => 'paso2', 'nombre' => 'Agregar Articulos', 'icon' => '\f015'],
                /*   ['id' => 'paso3', 'nombre' => 'Revisión', 'icon' => '\f007'], */
            ],
            'users' => User::getEmpleadosActivos()
        ]);
    }

    public function save()
    {
        $this->validate();
        $this->model->created_by = auth()->user()->id;
        $this->model->estado = EStateActaEntrega::CREADO->getId();
        $this->model->save();
        return redirect()->route('inv.actas-entrega.show', $this->model->id);
    }
}
