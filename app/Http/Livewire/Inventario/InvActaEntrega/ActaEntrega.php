<?php

namespace App\Http\Livewire\Inventario\InvActaEntrega;

use App\Models\InvActaEntrega;
use Livewire\Component;

class ActaEntrega extends Component
{

    public $TITLE_TABLE = 'Actas de Entrega';

    public $model;
    protected $rules = [
        'model.nombre' => 'required',
    ];

    protected $listeners = ['add', 'save', 'edit', 'delete'];

    public function mount()
    {
        $this->model = new InvActaEntrega();
    }

    public function render()
    {
        return view('livewire.inventario.inv-acta-entrega.acta-entrega');
    }

    public function add()
    {
        $this->model = new InvActaEntrega();
    }

    public function save()
    {
        $this->validate();
        $this->model->save();
        //comunicar a la tabla que hay uno nuevo
        $this->emit('render');
        //ocultar el modal
        $this->dispatchBrowserEvent('close-modal');
        //mostrar el mensaje de que se creo correctamente
        $this->emit('message', 'Buen trabajo!', 'Se han guardado los cambios.');
    }
    public function edit(InvActaEntrega $objeto)
    {
        $this->model = $objeto;
        //abrir el modal
        $this->dispatchBrowserEvent('open-modal');
    }
    public function delete(InvActaEntrega $objeto)
    {
        $this->model = $objeto;
        $this->model->delete();
        //comunicar a la tabla que hay uno nuevo
        $this->emit('render');
    }
}
