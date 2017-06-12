<?php

use Illuminate\Database\Seeder;
use \App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $adminRole = App\Role::where('name', '=', 'admin')->first();
        $userRole = App\Role::where('name', '=', 'user')->first();

        $admin = new User();
        $admin->firstname = 'Admin';
        $admin->surname = 'Istrator';
        $admin->employeenumber = '1';
        $admin->dob = '1982-04-01';
        $admin->vessel = 'Prometheus';
        $admin->email = 'admin@admin.admin';
        $admin->password = bcrypt('123456');
        $admin->save();
        $admin->roles()->attach($adminRole);

        $user = new User();
        $user->firstname = 'Regular';
        $user->surname = 'User';
        $user->employeenumber = '2';
        $user->dob = '1992-08-01';
        $user->vessel = 'Gretha';
        $user->email = 'user@user.user';
        $user->password = bcrypt('123456');
        $user->save();
        $user->roles()->attach($userRole);
    }
}
