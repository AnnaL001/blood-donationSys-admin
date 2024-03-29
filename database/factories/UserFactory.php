<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\User;
use Illuminate\Support\Str;
use Faker\Generator as Faker;
use App\Role;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(User::class, function (Faker $faker) {
    return [
        'fname' => $faker->firstName(),
        'lname' => $faker->lastName,
        'sname' => $faker->lastName,
        'email' => $faker->unique()->safeEmail,
        'phoneNo' =>$faker->unique()->phoneNumber,
        'email_verified_at' => now(),
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'gender' => $faker->randomElement(['male', 'female']),
        'branch_id' => $faker->numberBetween(1,8),
        'remember_token' => Str::random(10),
    ];
});

$factory->afterCreating(User::class, function ($admin,$faker){
    $roles = Role::where('name', 'Admin') -> get();
    $admin->roles()->sync($roles->pluck('id')->toArray());
});
