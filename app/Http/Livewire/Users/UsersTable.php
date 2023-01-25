<?php

namespace App\Http\Livewire\Users;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;

class UsersTable extends DataTableComponent
{
    protected $model = User::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id')
            ->setDefaultSort('id', 'desc')
            ->setConfigurableAreas([
                'toolbar-left-end' => 'elements.loader',
                'toolbar-right-start' => 'elements.users.btn-nuevo',
            ]);;
    }

    public function columns(): array
    {
        return [
            Column::make('')
                ->label(
                    fn ($row, Column $column) => view('elements.users.acciones', [
                        'row' => $row,
                    ])
                ),
            Column::make("Id", "id")
                ->sortable()
                ->searchable(),
            Column::make("Nombre", "name")
                ->searchable()
                ->sortable(),
            Column::make("Email", "email")
                ->searchable()
                ->sortable(),

            /* Column::make("Location", "location")
                ->sortable(),
            Column::make("Phone", "phone")
                ->sortable(),
            Column::make("About", "about")
                ->sortable(), */
            Column::make("Username", "username")
                ->searchable()
                ->sortable(),
            Column::make("Cargo", "jobtitle_ldap")
                ->searchable()
                ->sortable(),
            Column::make("Creación", "created_at")
                ->searchable()
                ->sortable(),
            Column::make("Ulti. Actualización", "updated_at")
                ->searchable()
                ->sortable(),
        ];
    }
}
