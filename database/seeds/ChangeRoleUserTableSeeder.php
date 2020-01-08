<?php

use App\User;
use Illuminate\Database\Seeder;

class ChangeRoleUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users_id = [1,2,3,4,5,6];
        $roles_id = ['2'];
        foreach ($users_id as $user_id) {
            $user = User::find($user_id);
            $user->roles()->sync($roles_id);
        }

    }
}
