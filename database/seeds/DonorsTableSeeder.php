<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class DonorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Donor::class,10)->create();

        }
}
