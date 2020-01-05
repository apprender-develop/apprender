<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            [
                'name' => 'super-administrador'
            ],
            [
                'name' => 'administrador'
            ]
        ];
        foreach ($roles as $key => $value) {
            Role::firstOrCreate($value);
        }
    }
}
