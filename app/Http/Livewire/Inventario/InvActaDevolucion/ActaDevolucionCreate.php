<?php

namespace App\Http\Livewire\Inventario\InvActaDevolucion;

use App\Enums\EStateActaDevolucion;
use App\Models\InvActaDevolucion;
use App\Models\User;
use Livewire\Component;

class ActaDevolucionCreate extends Component
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

    public function mount($model = new InvActaDevolucion())
    {
        $this->model = $model;
    }
    public function render()
    {
        return view('livewire.inventario.inv-acta-devolucion.acta-devolucion-create', [
            'items' => [
                ['id' => 'paso1', 'nombre' => 'Crear Acta de Devolución', 'icon' => '\f13e'],
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
        $this->model->estado = EStateActaDevolucion::CREADO->getId();
        $this->model->save();
        return redirect()->route('inv.actas-devolucion.show', $this->model->id);
    }
}
