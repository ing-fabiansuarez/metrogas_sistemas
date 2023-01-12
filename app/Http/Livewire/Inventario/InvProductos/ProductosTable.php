<?php

namespace App\Http\Livewire\Inventario\InvProductos;

use App\Models\InvBodega;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\InvProducto;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\Views\Filters\SelectFilter;
use Rappasoft\LaravelLivewireTables\Views\Filters\TextFilter;

class ProductosTable extends DataTableComponent
{
    protected $model = InvProducto::class;

    protected $listeners = ['render' => 'configure'];

    public function configure(): void
    {
        $this->setPrimaryKey('id')
            ->setDefaultSort('id', 'desc')
            ->setConfigurableAreas([
                'toolbar-left-end' => 'elements.loader',
                'toolbar-right-start' => 'elements.btn-nuevo',
            ])
            ->setSecondaryHeaderTrAttributes(function ($rows) {
                return ['class' => 'bg-gray-100'];
            })
            ->setSecondaryHeaderTdAttributes(function (Column $column, $rows) {
                if ($column->isField('id')) {
                    return ['class' => 'text-red-500'];
                }

                return ['default' => true];
            });
    }

    public function columns(): array
    {
        return [

            Column::make('Id', 'id')
                ->sortable()
                ->searchable(),
            Column::make('')
                // Note: The view() method is reserved for columns that have a field
                ->label(
                    fn ($row, Column $column) => view('elements.productos.acciones', [
                        'row' => InvProducto::find($row->id),
                    ])
                ),
            Column::make('Nombre', 'nombre')
                ->sortable()
                ->searchable(),
            Column::make('Disponibilidad', 'ubicacion_id')
                ->secondaryHeader($this->getFilterByKey('disponibilidad'))
                ->format(
                    function ($value, $row, Column $column) {
                        $producto = InvProducto::find($row->id);
                        switch (get_class($producto->ubicacion)) {
                            case InvBodega::class:
                                return '<span class="badge badge-pill badge-lg bg-gradient-success">DISPONIBLE</span>';
                                break;
                            case User::class:
                                return '<span class="badge badge-pill badge-lg bg-gradient-warning">OCUPADO</span>';
                                break;
                            default:
                                echo "No se encontro Ubicación";
                                break;
                        }
                    }
                )->html()->sortable(),
            Column::make('Ubicación')
                ->secondaryHeader($this->getFilterByKey('ubicacion'))
                ->sortable()
                ->label(
                    function ($row, Column $column) {
                        $producto = InvProducto::find($row->id);
                        switch (get_class($producto->ubicacion)) {
                            case InvBodega::class:
                                echo $producto->ubicacion->nombre;
                                break;
                            case User::class:
                                echo $producto->ubicacion->name;
                                break;
                            default:
                                echo "No se encontro Ubicación";
                                break;
                        }
                    }
                )->html(),


            Column::make('Codigo interno', 'codigo_interno')
                ->sortable()
                ->searchable(),
            Column::make('Serial', 'serial')
                ->sortable()
                ->searchable(),
            Column::make('Marca', 'marca_id')
                ->sortable()
                ->format(fn ($value, $row, Column $column) => $row->marca->nombre)
                ->searchable(),
            Column::make('Creado Por', 'created_by')
                ->sortable()
                ->format(fn ($value, $row, Column $column) => $row->createdBy->name)
                ->searchable(),
            Column::make('Fecha Creación', 'created_at')->sortable(),
            Column::make('Actualización', 'updated_at')->sortable(),

        ];
    }

    public function filters(): array
    {
        return [
            TextFilter::make('Ubicación', 'ubicacion')
                ->config([
                    'placeholder' => 'Ubicación',
                ])
                ->filter(function (Builder $builder, string $value) {
                    $builder->whereHasMorph('ubicacion', [InvBodega::class], function (Builder $query) use ($value) {
                        $query->where('nombre', 'ilike', "%$value%");
                    });
                }),
            SelectFilter::make('Disponibilidad', 'disponibilidad')
                ->options([
                    '' => 'Todo',
                    '1' => 'Disponible',
                    '0' => 'Ocupado',
                ])
                ->filter(function (Builder $builder, string $value) {
                    switch ($value) {
                        case 1:
                            $builder->where('ubicacion_type', InvBodega::class);
                            break;
                        case 0:
                            $builder->where('ubicacion_type', User::class);
                            break;
                    }
                }),
        ];
    }
}
