<?php

namespace Database\Seeders;

use App\Models\InvBodega;
use App\Models\InvCategoria;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@material.com',
            'password' => 'secret',
        ]);
        /* InvBodega::factory(30)->create(); */
    }
}
