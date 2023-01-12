<?php

namespace App\Http\Livewire;

use App\Models\InvActaDevolucion;
use App\Models\InvActaEntrega;
use App\Models\InvBodega;
use App\Models\InvMarca;
use App\Models\InvProducto;
use App\Models\User;
use Livewire\Component;

class Dashboard extends Component
{
    public function render()
    {
        return view('livewire.dashboard', [
            'totalArticulos' => InvProducto::all()->count(),
            'totalUsers' => User::all()->count(),
            'totalBodegas' => InvBodega::all()->count(),
            'totalMarcas' => InvMarca::all()->count(),
            'listActaEntregas' => InvActaEntrega::orderBy('id', 'desc')->limit(10)->get(),
            'listActaDevoluciones' => InvActaDevolucion::orderBy('id', 'desc')->limit(10)->get()
        ]);
    }
}
