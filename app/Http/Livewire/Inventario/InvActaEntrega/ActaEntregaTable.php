<?php

namespace App\Http\Livewire\Inventario\InvActaEntrega;

use App\Enums\EStateActaEntrega;
use App\Exports\ActaEntregaExport;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\InvActaEntrega;
use App\Models\User;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\Views\Filters\MultiSelectFilter;
use Rappasoft\LaravelLivewireTables\Views\Filters\TextFilter;

class ActaEntregaTable extends DataTableComponent
{
    protected $model = InvActaEntrega::class;

    protected $listeners = ['render' => 'configure'];

    public array $bulkActions = [
        'exportarExcel' => 'Exportar Excel',
    ];

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
                ->secondaryHeader($this->getFilterByKey('responsable_filter'))
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
            Column::make("Creado por", "created_by")
                ->sortable()
                ->format(fn ($value, $row, Column $column) => $row->createdBy->name)
                ->secondaryHeader($this->getFilterByKey('created_by_filter')),
            Column::make("Fecha creación", "created_at")
                ->sortable(),
            Column::make("Ultima Actualiza.", "updated_at")
                ->sortable(),

        ];
    }


    public function filters(): array
    {
        return [
            TextFilter::make('responsable_filter')
                ->setFilterPillTitle('Responsable')
                ->hiddenFromMenus()
                ->config([
                    'placeholder' => 'Nombre',
                ])
                ->filter(function (Builder $builder, string $value) {
                    $builder->whereRelation('userResponsable', 'name', 'ilike', "%$value%");
                }),
            TextFilter::make('created_by_filter')
                ->setFilterPillTitle('Creado por')
                ->hiddenFromMenus()
                ->config([
                    'placeholder' => 'Nombre',
                ])
                ->filter(function (Builder $builder, string $value) {
                    $builder->whereRelation('createdBy', 'name', 'ilike', "%$value%");
                }),
            MultiSelectFilter::make('estado')
                ->setFilterPillTitle('Estado')
                ->options(
                    EStateActaEntrega::toArray()
                )->filter(function (Builder $builder, array $values) {
                    $builder->whereIn('estado', $values);
                }),
        ];
    }

    public function exportarExcel()
    {
        $data = $this->getSelected();
        //$this->clearSelected();
        return Excel::download(new ActaEntregaExport($data), 'Actas de Entrega.xlsx');
    }
}
