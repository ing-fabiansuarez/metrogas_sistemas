<?php

namespace App\Http\Livewire\Auth;

use Illuminate\Validation\ValidationException;
use Livewire\Component;

class Login extends Component
{

    public $username = '';
    public $password = '';

    protected $rules = [
        'username' => 'required',
        'password' => 'required'

    ];

    public function render()
    {
        return view('livewire.auth.login');
    }

    public function mount()
    {

        //$this->fill(['email' => 'admin@material.com', 'password' => 'secret']);
    }

    public function store()
    {
        $attributes = $this->validate();

        if (!auth()->attempt($attributes)) {
            throw ValidationException::withMessages([
                'username' => 'Usuario o contraseña incorrectos.'
            ]);
        }

        session()->regenerate();

        return redirect('/dashboard');
    }
}
