<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use App\User;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $crearusuario = $this->command->ask('Desea crear un usuario administrador? (y)si (n)no');
        if ($crearusuario == 'y') {
            $mRole = Role::firstOrCreate(['name' => 'administrador']);
            $role = Role::where('name', 'administrador')->first();
            $user = array();
            $this->command->comment('');
            $this->command->comment('Se creara el usuario ' . $role->uiname .'.');
            $this->command->info('...................................');

            // DATOS USUARIO
            $user['nombreCompleto'] = $this->command->ask('ingrese nombre completo');
            $user['email'] = $this->command->ask('Correo del usuario super-admin?');
            $user['pseudoficha'] = 'xyz';
            $pass = false;
            $password = '';
            while ($pass != true) {
                $password = $this->command->secret('Password');
                $pass = $password === $this->command->secret('confirma');
                if ($pass === false) {
                    $this->command->info('las contraseñas no coinciden.');
                } else {
                    $user['password'] = bcrypt($password);
                }
            }
            $adminUser = User::firstorcreate($user);
            $adminUser->assignRole($role);
        } else {
            $this->command->comment('Tranquilo viejo, continuemos....');
        }
    }
}
