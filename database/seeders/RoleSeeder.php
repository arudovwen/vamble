<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Role::create([
            'role' => 'admin'
        ]);
        \App\Models\Role::create([
            'role' => 'supervisor'
        ]);
        \App\Models\Role::create([
            'role' => 'guest'
        ]);
    }
}
