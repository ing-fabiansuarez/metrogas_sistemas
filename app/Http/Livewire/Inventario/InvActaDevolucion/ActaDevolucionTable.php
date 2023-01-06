<?php

namespace App\Http\Livewire\Inventario\InvActaDevolucion;

use App\Enums\EStateActaDevolucion;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\InvActaDevolucion;

class ActaDevolucionTable extends DataTableComponent
{
    protected $model = InvActaDevolucion::class;
    protected $listeners = ['render' => 'configure'];

    public function configure(): void
    {
        $this->setPrimaryKey('id')
            ->setDefaultSort('id', 'desc')
            ->setConfigurableAreas([
                'toolbar-left-end' => 'elements.loader',
                'toolbar-right-start' => 'elements.acta-devolucion.btn-nuevo',
            ]);
    }

    public function columns(): array
    {
        return [
            Column::make("Id", "id")
                ->searchable()
                ->sortable(),
            Column::make('')
                // Note: The view() method is reserved for columns that have a field
                ->label(
                    fn ($row, Column $column) => view('elements.acta-devolucion.acciones', [
                        'row' => $row,
                        'EStateActaDevolucion' => EStateActaDevolucion::class
                    ])
                ),
            Column::make('Estado', 'estado')
                ->sortable()
                ->format(function ($value, $row, Column $column) {
                    switch ($row->estado) {
                        case EStateActaDevolucion::CREADO->getId():
                            return '<span class="badge badge-pill badge-lg bg-gradient-warning">' . EStateActaDevolucion::from($row->estado)->getName() . '</span>';
                            break;
                        case EStateActaDevolucion::CERRADO->getId():
                            return '<span class="badge badge-pill badge-lg bg-gradient-success">' . EStateActaDevolucion::from($row->estado)->getName() . '</span>';
                            break;
                    }
                })
                ->html()
                ->searchable(),
            Column::make('Quien entrega', 'quien_entrega')
                ->sortable()
                ->format(fn ($value, $row, Column $column) => $row->quienEntrega->name)
                ->searchable(),
            Column::make("Fecha Entrega", "fecha_entrega")
                ->searchable()
                ->sortable(),
            Column::make("Area", "area")
                ->searchable()
                ->sortable(),
            Column::make("Centro Operativo", "centro_operativo")
                ->searchable()
                ->sortable(),
            Column::make("Ubicación", "ubicacion")
                ->searchable()
                ->sortable(),
            Column::make("Descripción", "descripcion")
                ->searchable()
                ->sortable(),
            Column::make("Fecha Creación", "created_at")
                ->searchable()
                ->sortable(),
            Column::make("Fecha Actualización", "updated_at")
                ->searchable()
                ->sortable(),
        ];
    }
}
