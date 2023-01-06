<?php

namespace App\Http\Livewire\Inventario\InvProductos;

use App\Models\InvBodega;
use App\Models\InvMarca;
use App\Models\InvProducto;
use App\Models\InvProductoCaracteristica;
use Livewire\Component;

class Productos extends Component
{
    public $TITLE_TABLE = 'Articulos';

    public $model;
    public $newCaracteristica;
    public $arrayCarac;
    public $idBodega;

    protected $rules = [
        'model.nombre' => 'required',
        'model.codigo_interno' => 'required',
        'model.serial' => 'required',
        'model.marca_id' => 'required',
        'idBodega' => 'required',
        'newCaracteristica.nombre' => '',
        'newCaracteristica.valor' => '',
    ];

    protected $listeners = ['add', 'save', 'edit', 'delete'];

    public function mount()
    {
        $this->newCaracteristica = new InvProductoCaracteristica();
        $this->arrayCarac = [];
        $this->model = new InvProducto();
    }

    public function render()
    {
        return view('livewire.inventario.inv-productos.productos', [
            'marcas' => InvMarca::all(),
            'bodegas' => InvBodega::all()
        ]);
    }
    public function add()
    {
        $this->model = new InvProducto();
    }

    public function save()
    {
        $this->validate();

        $this->model->created_by = auth()->user()->id;

        $bodega = InvBodega::find($this->idBodega);

        $bodega->productos()->save($this->model);
        $this->model->caracteristicas()->delete();
        $this->model->caracteristicas()->createMany($this->arrayCarac);
        //comunicar a la tabla que hay uno nuevo
        $this->emit('render');
        //ocultar el modal
        $this->dispatchBrowserEvent('close-modal');
        //mostrar el mensaje de que se creo correctamente
        $this->emit('message', 'Buen trabajo!', 'Se han guardado los cambios.');
    }
    public function edit(InvProducto $objeto)
    {
        $this->model = $objeto;

        //Se hace la validacion para comprobar si esta en la bodega
        if (!get_class($objeto->ubicacion) == InvBodega::class) {
            return "NO SE PUEDE EDITAR NO ESTA EN BODEGA";
        }

        //asignar al objeto la bodega
        $this->idBodega = $objeto->ubicacion->id;

        //abrir el modal
        $this->dispatchBrowserEvent('open-modal');
        $this->loadArrayCaracteristicas();
    }
    public function delete(InvProducto $objeto)
    {
        $this->model = $objeto;
        $this->model->delete();
        //comunicar a la tabla que hay uno nuevo
        $this->emit('render');
    }

    public function addCaracteristica()
    {
        $this->validate([
            'newCaracteristica.nombre' => 'required',
            'newCaracteristica.valor' => 'required',
        ]);
        array_push($this->arrayCarac, [
            'nombre' => $this->newCaracteristica->nombre,
            'valor' => $this->newCaracteristica->valor,
        ]);
        $this->newCaracteristica = new InvProductoCaracteristica();
    }

    public function deleteCaracteristica($key_entrada)
    {
        foreach ($this->arrayCarac as $key => $item) {
            if ($key == $key_entrada) {
                unset($this->arrayCarac[$key]);
            }
        }
    }

    private function loadArrayCaracteristicas()
    {
        $this->arrayCarac = [];
        foreach ($this->model->caracteristicas as $item) {
            array_push($this->arrayCarac, [
                'nombre' => $item->nombre,
                'valor' => $item->valor,
            ]);
        }
    }
}
