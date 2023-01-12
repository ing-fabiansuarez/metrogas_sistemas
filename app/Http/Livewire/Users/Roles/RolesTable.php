<?php

namespace App\Http\Livewire\Users\Roles;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Spatie\Permission\Models\Role;

class RolesTable extends DataTableComponent
{
    protected $model = Role::class;

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
            Column::make('')
                ->label(
                    fn ($row, Column $column) => view('elements.users.roles.acciones', [
                        'row' => $this->model::find($row->id)
                    ])
                ),
            Column::make("Id", "id")
                ->searchable()
                ->sortable(),
            Column::make("Nombre", "descripcion")
                ->sortable()
                ->searchable(),
            Column::make("Fecha Creación", "created_at")
                ->searchable()
                ->sortable(),
            Column::make("Ultima Actualización", "updated_at")
                ->searchable()
                ->sortable(),
        ];
    }
}
