<?php

namespace App\Http\Livewire\Inventario\InvProductos;

use App\Models\InvProducto;
use Livewire\Component;

class ProductosHistorial extends Component
{
    public $model;
    public function mount(InvProducto $producto)
    {
        $this->model = $producto;
    }
    public function render()
    {
        return view('livewire.inventario.inv-productos.productos-historial');
    }
}
