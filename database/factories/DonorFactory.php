<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */


use App\Donor;
use Faker\Generator as Faker;

$factory->define(Donor::class, function (Faker $faker) {
    return [
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'surname' => $faker->lastName,
        'email' => $faker->unique()->safeEmail,
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'phoneNo'=>$faker->unique()->phoneNumber,
        'blood_type_id' => $faker->numberBetween(1, App\Blood_type::count()),
        'm_data' => $faker->unique()->file(),
        'created_at' => $faker->dateTime($max = 'now'),
        'updated_at' => $faker->dateTime($max = 'now'),
    ];
});
