<?php

namespace App\Http\Livewire\Inventario\InvProductos;

use Livewire\Component;

class SearchDropdown extends Component
{


    public $searchTerm = '';
    public $results =  ['result 1', 'result 2', 'result 3'];

    public function render()
    {
        return view('livewire.inventario.inv-productos.search-dropdown');
    }

    public function search()
    {
        $this->results = ['result 1', 'result 2', 'result 3'];
    }
}
