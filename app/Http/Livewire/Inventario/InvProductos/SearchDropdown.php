<?php

namespace App\Http\Livewire\Inventario\InvProductos;

use Livewire\Component;

class SearchDropdown extends Component
{


    public $searchTerm = '';
    public $results = [];

    public function render()
    {
        return view('livewire.inventario.inv-productos.search-dropdown');
    }
}
