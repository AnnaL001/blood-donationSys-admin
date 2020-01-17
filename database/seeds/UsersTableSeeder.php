<?php

use Illuminate\Database\Seeder;
use App\Role;
use App\User;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Delete data every time the seeder is run to avoid doubles
        User::truncate();
        DB::table('role_user')->truncate();

        $super_adminRole = Role::where('name','Super admin')->first();
        $adminRole = Role::where('name','Admin')->first();

        //Create users
        $super_admin = User::create([
            'fname' => 'Anna',
            'lname' => 'Kelly',
            'sname' => 'Roberts',
            'email' => 'Anna.roberts@blooddonation.com',
            'password' => bcrypt('superADM001!*'),
            'phoneNo' => '0709110900',
            'gender' => 'Female',
            'branch_id' => '1'
        ]);

        $admin = User::create([
            'fname' => 'Robert',
            'lname' => 'Mikaelson',
            'sname' => 'Andrews',
            'email' => 'Robert.andrews@blooddonation.com',
            'password' => bcrypt('ADM001!*'),
            'phoneNo' => '0708110800',
            'gender' => 'Male',
            'branch_id' => '2'
        ]);

        $admin1 = User::create([
            'fname' => 'Alexa',
            'lname' => 'Mariana',
            'sname' => 'Mendoza',
            'email' => 'Alexa.mendoza@blooddonation.com',
            'password' => bcrypt('ADM002!*'),
            'phoneNo' => '0708110700',
            'gender' => 'Female',
            'branch_id' => '2'
        ]);

        $admin2 = User::create([
            'fname' => 'Lucas',
            'lname' => 'Juan',
            'sname' => 'Mendoza',
            'email' => 'Lucas.mendoza@blooddonation.com',
            'password' => bcrypt('ADM003!*'),
            'phoneNo' => '0708111700',
            'gender' => 'Male',
            'branch_id' => '2'
        ]);


        //Attach roles
        $super_admin -> roles() -> attach ($super_adminRole);
        $admin -> roles() -> attach ($adminRole);
        $admin1 -> roles() -> attach ($adminRole);
        $admin2 -> roles() -> attach ($adminRole);

        factory(App\User::class,10)->create();

    }
}
