<?php

namespace App\Http\Livewire\Inventario\InvProductos;

use App\Models\InvProducto;
use Livewire\Component;

class SearchDropdown extends Component
{
    public $searchTerm = '';
    public $results = [];
    public $msg = '';
    protected $listeners = ['beforeSelect'];

    public function updatedSearchTerm()
    {
        $search = $this->searchTerm;
        if ($this->searchTerm != '') {
            $search =
                $this->results = InvProducto::from('inv_productos as a')
                ->where(function ($query) use ($search) {
                    $query = $query->orWhere('a.nombre', 'ilike', "%$search%");
                    $query = $query->orWhere('a.codigo_interno', 'ilike', "%$search%");
                    $query = $query->orWhere('a.serial', 'ilike', "%$search%");
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

    public function beforeSelect(InvProducto $product)
    {
        $this->reset();
        //se emite el metodo de seleccion al otro componente
        $this->emit('selectProduct', $product);
    }
}
