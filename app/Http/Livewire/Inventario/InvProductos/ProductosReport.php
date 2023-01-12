<?php

namespace App\Http\Livewire\Inventario\InvProductos;

use App\Exports\InvProductoExport;
use App\Models\InvBodega;
use App\Models\InvProducto;
use App\Models\User;
use Livewire\Component;
use Maatwebsite\Excel\Facades\Excel;

class ProductosReport extends Component
{
    public function render()
    {
        return view('livewire.inventario.inv-productos.productos-report');
    }

    public function exportDisponibles()
    {
        return Excel::download(
            new InvProductoExport(InvProducto::where(
                'ubicacion_type',
                InvBodega::class
            )->pluck('id')->toArray()),
            'Articulos Disponibles.xlsx'
        );
    }
    public function exportOcupados()
    {
        return Excel::download(
            new InvProductoExport(InvProducto::where(
                'ubicacion_type',
                User::class
            )->pluck('id')->toArray()),
            'Articulos Ocupados.xlsx'
        );
    }
    public function exportTodo()
    {
        return Excel::download(
            new InvProductoExport(InvProducto::all()->pluck('id')->toArray()),
            'Articulos Ocupados.xlsx'
        );
    }
}
