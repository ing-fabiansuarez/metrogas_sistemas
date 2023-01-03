<?php

namespace App\Http\Livewire\Inventario\InvProductos;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\InvProducto;

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
            ]);
    }

    public function columns(): array
    {
        return [
            Column::make('Id', 'id')
                ->sortable()
                ->searchable(),
          /*   Column::make('Ubicación', 'bodega_id')
                ->sortable()
                ->format(fn ($value, $row, Column $column) => $row->bodega != null ? $row->bodega->nombre : 'No esta en bodega')
                ->searchable(), */
            Column::make('Nombre', 'nombre')
                ->sortable()
                ->searchable(),
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
            Column::make('Acciones')
                // Note: The view() method is reserved for columns that have a field
                ->label(
                    fn ($row, Column $column) => view('elements.acciones', [
                        'row' => $row,
                    ])
                ),
        ];
    }
}
