<?php

use App\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
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

$factory->define(User::class, function (Faker $faker) {
    return [
        'name' => 'Root User',
        // 'name' => $faker->name,
        'email' => 'root@user.com',
        // 'email' => $faker->unique()->safeEmail,
        // 'photo' => 'public/images/user.png',
        'phone_number' => '01700000000',
        'role' => 'root',
        'status' => '1',
        'email_verified_at' => now(),
        'password' => Hash::make('12345678'),
        'api_key' => substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 30),
        'sender_id' => substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 15),
        'remember_token' => Str::random(10),
    ];
});
