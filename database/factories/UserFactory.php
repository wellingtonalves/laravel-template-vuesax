<?php

use Faker\Generator as Faker;

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

$factory->define(\App\Models\User::class, function (Faker $faker) {
    return [
        'uuid' => $faker->uuid,
        'name' => $faker->name,
        'email' => $faker->email,
        'email_verified_at' => null,
        'password' => '123456',
        'remember_token' => null,
        'status' => 'active',
        'is_admin' => 0,
        'username' => strtolower($faker->firstName),
        'profile_id' => 2,
    ];
});
