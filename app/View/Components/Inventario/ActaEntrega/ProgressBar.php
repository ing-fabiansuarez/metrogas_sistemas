<?php

namespace App\View\Components\Inventario\ActaEntrega;

use Illuminate\View\Component;

class ProgressBar extends Component
{
    public $stepsCompletes;
    public $totalSteps;
    public $width;
    public $items = [];

    public function __construct($stepsCompletes, $items)
    {
        $this->items = $items;
        $this->totalSteps = count($items);
        $this->stepsCompletes = $stepsCompletes;
        $this->width = 100 / $this->totalSteps;
    }

    public function render()
    {
        return view('components.inventario.acta-entrega.progress-bar');
    }
}
