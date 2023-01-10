<?php

namespace App\Http\Livewire\Inventario\InvProductos;

use App\Models\InvBodega;
use App\Models\InvMarca;
use App\Models\InvProducto;
use App\Models\InvProductoCaracteristica;
use App\Models\InvProductoHistorial;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\DB;
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
        //dd("sudo");
        $this->model = new InvProducto();
    }

    public function save()
    {
        $this->validate();
        //dd($this->model);

        if ($this->model->id!=null) {
            $iconHistorial = "edit";
            $descripcionHistorial = "Editarón la información del producto";
            //Se valida que este en obdega para poder ser editado
            switch (get_class($this->model->ubicacion)) {
                case User::class:
                    $this->emit('mensaje', [
                        'typeMsg' => 1,
                        'title' => 'No se puede Editar!',
                        'cuerpo' => 'El producto no se puede editar porque lo tiene un empleado'
                    ]);
                    return;
                    break;
            }
        } else {
            $iconHistorial = "add_circle";
            $descripcionHistorial = "Se creó el producto.";
        }

        $this->model->created_by = auth()->user()->id;
        $bodega = InvBodega::find($this->idBodega);

        DB::beginTransaction();
        $bodega->productos()->save($this->model);

        //agregar las caracteristicas al producto
        $this->model->caracteristicas()->delete();
        $this->model->caracteristicas()->createMany($this->arrayCarac);

        //guardar el historial
        $historial = new InvProductoHistorial();
        $historial->responsable = $this->model->created_by;
        $historial->icon = $iconHistorial;
        $historial->descripcion = $descripcionHistorial;
        $historial->ubicacion()->associate(User::find(auth()->user()->id));
        $this->model->historial()->save($historial);


        DB::commit();


        $this->arrayCarac = [];

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
        try {
            $this->model = $objeto;
            $this->model->delete();
            //comunicar a la tabla que hay uno nuevo
            $this->emit('render');
        } catch (Exception $e) {
            $this->emit('mensaje', [
                'typeMsg' => 1,
                'title' => 'No se puede Eliminar!',
                'cuerpo' => 'El producto puede estar relacionado en otros registros'
            ]);
            return;
        }
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
