<?php

namespace App\Http\Livewire\Inventario\InvActaDevolucion;

use App\Models\InvActaDevolucion;
use Livewire\Component;

class ActaDevolucion extends Component
{
    public $TITLE_TABLE = 'Actas de Devolución';

    public $model;
    protected $rules = [
        'model.nombre' => 'required',
    ];

    protected $listeners = ['edit', 'delete'];

    public function mount()
    {
        $this->model = new InvActaDevolucion();
    }

    public function render()
    {
        return view('livewire.inventario.inv-acta-devolucion.acta-devolucion');
    }

    public function edit(InvActaDevolucion $objeto)
    {
        $this->model = $objeto;
        //abrir el modal
        $this->dispatchBrowserEvent('open-modal');
    }
    public function delete(InvActaDevolucion $objeto)
    {
        $this->model = $objeto;
        $this->model->delete();
        //comunicar a la tabla que hay uno nuevo
        $this->emit('render');
    }
}
