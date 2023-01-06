<?php

namespace App\Http\Livewire\Inventario\InvActaEntrega;

use App\Enums\EStateActaEntrega;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\InvActaEntrega;

class ActaEntregaTable extends DataTableComponent
{
    protected $model = InvActaEntrega::class;

    protected $listeners = ['render' => 'configure'];

    public function configure(): void
    {
        $this->setPrimaryKey('id')
            ->setDefaultSort('id', 'desc')
            ->setConfigurableAreas([
                'toolbar-left-end' => 'elements.loader',
                'toolbar-right-start' => 'elements.acta-entrega.btn-nuevo',
            ]);
    }

    public function columns(): array
    {
        return [
            Column::make("Id", "id")
                ->sortable(),
            Column::make('')
                // Note: The view() method is reserved for columns that have a field
                ->label(
                    fn ($row, Column $column) => view('elements.acta-entrega.acciones', [
                        'row' => $row,
                        'EStateActaEntrega' => EStateActaEntrega::class
                    ])
                ),
            Column::make('Estado', 'estado')
                ->sortable()
                ->format(function ($value, $row, Column $column) {
                    switch ($row->estado) {
                        case EStateActaEntrega::CREADO->getId():
                            return '<span class="badge badge-pill badge-lg bg-gradient-warning">' . EStateActaEntrega::from($row->estado)->getName() . '</span>';
                            break;
                        case EStateActaEntrega::CERRADO->getId():
                            return '<span class="badge badge-pill badge-lg bg-gradient-success">' . EStateActaEntrega::from($row->estado)->getName() . '</span>';
                            break;
                    }
                })
                ->html()
                ->searchable(),
            Column::make('Responsable', 'responsable')
                ->sortable()
                ->format(fn ($value, $row, Column $column) => $row->userResponsable->name)
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
            Column::make("Created at", "created_at")
                ->sortable(),
            Column::make("Updated at", "updated_at")
                ->sortable(),
        ];
    }
}
