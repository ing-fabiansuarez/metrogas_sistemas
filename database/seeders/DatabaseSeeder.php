<?php

namespace Database\Seeders;

use App\Models\InvBodega;
use App\Models\InvCategoria;
use App\Models\InvMarca;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call(RolesAndPermissionsSeeder::class);
    }
}
