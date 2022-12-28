<?php

namespace App\Http\Livewire\Inventario\InvProductos;

use Livewire\Component;

class Productos extends Component
{
    public $TITLE_TABLE = 'Productos';
    public function render()
    {
        return view('livewire.inventario.inv-productos.productos');
    }
}
