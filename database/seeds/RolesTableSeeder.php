<?php

use Illuminate\Database\Seeder;
use App\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Delete data every time the seeder is run to avoid doubles
        Role::truncate();

        Role::create(['name' => 'Super admin']);
        Role::create(['name' => 'Admin']);
    }
}
