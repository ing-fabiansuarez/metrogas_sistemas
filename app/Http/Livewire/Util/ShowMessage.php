<?php

namespace App\Http\Livewire\Util;

use App\Enums\ETipoMensaje;
use Livewire\Component;

class ShowMessage extends Component
{
    protected $listeners = ['mensaje'];
    public function render()
    {
        return view('livewire.util.show-message', [
            'ETipoMensaje' => ETipoMensaje::class
        ]);
    }
    public function mensaje($configs)
    {
        /* $configs = ['tipo' => 1, 'titulo' => 'jslfd', 'cuerpo' => 'jslkdfkasjdk']; */
        $this->dispatchBrowserEvent('mensaje',$configs);
    }
}
