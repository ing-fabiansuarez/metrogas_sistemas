<?php

namespace App\Http\Livewire\Users;

use App\Models\User;
use Livewire\Component;
use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;

class UsersShow extends Component
{
    public $model;
    public $rolesSelected = [];

    protected $rules = [
        'rolesSelected' => '',
    ];

    public function mount(User $user)
    {
        $this->model = $user;
        foreach ($this->model->roles as $rol) {
            array_push($this->rolesSelected, $rol->name);
        }
    }

    public function render()
    {
        return view('livewire.users.users-show', ['roles' => Role::all()]);
    }

    public function save()
    {
        $this->model->assignRole($this->rolesSelected);
        return $this->emit('mensaje', [
            'typeMsg' => 2,
            'title' => 'Se agregarón los roles a los Usuarios',
        ]);
    }
}
