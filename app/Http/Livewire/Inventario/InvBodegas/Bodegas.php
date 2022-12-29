<?php

namespace App\Http\Livewire\Inventario\InvBodegas;

use App\Models\InvBodega;
use Livewire\Component;

class Bodegas extends Component
{
    public $TITLE_TABLE = 'Bodegas';

    public $model;
    protected $rules = [
        'model.nombre' => 'required',
    ];

    protected $listeners = ['add', 'save', 'edit', 'delete'];

    public function mount()
    {
        $this->model = new InvBodega();
    }

    public function render()
    {
        return view('livewire.inventario.inv-bodegas.bodegas');
    }

    public function add()
    {
        $this->model = new InvBodega();
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
    public function edit(InvBodega $objeto)
    {
        $this->model = $objeto;
        //abrir el modal
        $this->dispatchBrowserEvent('open-modal');
    }
    public function delete(InvBodega $objeto)
    {
        $this->model = $objeto;
        $this->model->delete();
        //comunicar a la tabla que hay uno nuevo
        $this->emit('render');
    }
}
