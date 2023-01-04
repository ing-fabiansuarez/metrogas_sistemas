<?php

namespace App\Http\Livewire\Inventario\InvActaEntrega;

use Livewire\Component;

class ActaEntregaCreate extends Component
{
    public function render()
    {
        return view('livewire.inventario.inv-acta-entrega.acta-entrega-create', [
            'items' => [
                ['id' => 'paso1', 'nombre' => 'Crear Acta de Entrega', 'icon' => '\f13e'],
                ['id' => 'paso2', 'nombre' => 'Articulos', 'icon' => '\f015'],
                ['id' => 'paso3', 'nombre' => 'Revisión', 'icon' => '\f007'],
            ]
        ]);
    }
}
