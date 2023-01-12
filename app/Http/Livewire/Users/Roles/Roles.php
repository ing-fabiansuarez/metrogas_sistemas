<?php

namespace App\Http\Livewire\Users\Roles;

use Livewire\Component;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class Roles extends Component
{
    public $TITLE_TABLE = 'Roles';

    public $model;
    protected $rules = [
        'model.descripcion' => 'required',
        'model.permissions.*.id' => '',
    ];
    protected $listeners = ['add', 'save', 'edit', 'delete'];

    public function mount()
    {
        $this->model = new Role();
    }

    public function render()
    {
        return view('livewire.users.roles.roles', ['allPermissions' => Permission::all()]);
    }

    public function add()
    {
        $this->model = new Role();
    }

    public function save()
    {
        dd($this->model->permissions);
        /* $this->validate();
        $this->model->name = $this->model->descripcion;
        $this->model->save();
        //comunicar a la tabla que hay uno nuevo
        $this->emit('render');
        //ocultar el modal
        $this->dispatchBrowserEvent('close-modal');
        //mostrar el mensaje de que se creo correctamente
        $this->emit('message', 'Buen trabajo!', 'Se han guardado los cambios.'); */
    }
    public function edit(Role $objeto)
    {
        $this->model = $objeto;
        //abrir el modal
        $this->dispatchBrowserEvent('open-modal');
    }
    public function delete(Role $objeto)
    {
        $this->model = $objeto;
        $this->model->delete();
        //comunicar a la tabla que hay uno nuevo
        $this->emit('render');
        $this->dispatchBrowserEvent('eliminado');
    }
}
