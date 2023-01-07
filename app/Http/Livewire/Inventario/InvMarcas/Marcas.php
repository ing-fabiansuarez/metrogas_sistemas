<?php

namespace App\Http\Livewire\Inventario\InvMarcas;

use App\Models\InvMarca;
use Livewire\Component;

class Marcas extends Component
{
    public $TITLE_TABLE = 'Marcas';

    public $model;
    protected $rules = [
        'model.nombre' => 'required',
    ];

    protected $listeners = ['add', 'save', 'edit', 'delete'];

    public function mount()
    {
        $this->model = new InvMarca();
    }

    public function render()
    {
        return view('livewire.inventario.inv-marcas.marcas');
    }
    public function add()
    {
        $this->model = new InvMarca();
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
    public function edit(InvMarca $objeto)
    {
        $this->model = $objeto;
        //abrir el modal
        $this->dispatchBrowserEvent('open-modal');
    }
    public function delete(InvMarca $objeto)
    {
        $this->model = $objeto;
        $this->model->delete();
        //comunicar a la tabla que hay uno nuevo
        $this->emit('render');
        $this->dispatchBrowserEvent('eliminado');
    }
}
