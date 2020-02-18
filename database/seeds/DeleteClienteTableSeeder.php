<?php

use App\User;
use Illuminate\Database\Seeder;

class DeleteClienteTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $mUser = new User;
        $adminUser = $mUser->where('email', 'admin@gmail.com')->first();

        $delete = $mUser->where('id', '!=', $adminUser->id)->delete();

        $this->command->comment('Usuarios de tipo cliente eliminados');
    }
}
