<?php

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
        $admin = new App\Role();
        $admin->name = 'admin';
        $admin->description = 'Administrator';
        $admin->save();

        $user = new App\Role();
        $user->name = 'user';
        $user->description = 'Regular User';
        $user->save();
    }
}
