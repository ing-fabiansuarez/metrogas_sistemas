<?php

namespace App\Http\Livewire\Inventario\InvProductos;

use App\Models\InvProducto;
use Livewire\Component;

class SearchDropdown extends Component
{
    public $searchTerm = '';
    public $results = [];
    public $msg = '';

    public function updatedSearchTerm()
    {
        $search = $this->searchTerm;
        if ($this->searchTerm != '') {
            $this->results = InvProducto::from('inv_productos as a')
                ->where(function ($query) use ($search) {
                    $query = $query->orWhere('a.nombre', 'like', "%$search%");
                    $query = $query->orWhere('a.codigo_interno', 'like', "%$search%");
                    $query = $query->orWhere('a.serial', 'like', "%$search%");
                })->get();
            if (count($this->results) <= 0) {
                $this->msg = "No se encontraron resultados...";
            }
        } else {
            $this->results = [];
            $this->msg = "";
        }
    }
    public function render()
    {
        return view('livewire.inventario.inv-productos.search-dropdown');
    }
}
