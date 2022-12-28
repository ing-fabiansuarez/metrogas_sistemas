<?php

namespace App\Http\Livewire\Inventario\InvBodegas;

use Livewire\Component;

class Bodegas extends Component
{
    public $TITLE_TABLE = 'Bodegas';

    public function render()
    {
        return view('livewire.inventario.inv-bodegas.bodegas');
    }
}
