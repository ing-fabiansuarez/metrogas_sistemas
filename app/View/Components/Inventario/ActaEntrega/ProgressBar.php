<?php

namespace App\View\Components\Inventario\ActaEntrega;

use Illuminate\View\Component;

class ProgressBar extends Component
{
    public $stepsCompletes;
    public $totalSteps = 3;
    public $width;

   

    public function __construct($stepsCompletes)
    {
        $this->stepsCompletes = $stepsCompletes;
        $this->width = 100 / $this->totalSteps;
    }

    public function render()
    {
        return view('components.inventario.acta-entrega.progress-bar');
    }
}
