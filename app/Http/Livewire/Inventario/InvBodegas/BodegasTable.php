<?php

namespace App\Http\Livewire\Inventario\InvBodegas;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\InvBodega;
class BodegasTable extends DataTableComponent
{
    protected $model = InvBodega::class;

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
            Column::make('Nombre', 'nombre')
                ->sortable()
                ->searchable(),
            Column::make('Fecha Creación', 'created_at')->sortable(),
            Column::make('Fecha Actualización', 'updated_at')->sortable(),
            Column::make('Acciones')
                // Note: The view() method is reserved for columns that have a field
                ->label(
                    fn($row, Column $column) => view('elements.bodegas.acciones', [
                        'row' => $row,
                    ])
                ),
        ];
    }
}
