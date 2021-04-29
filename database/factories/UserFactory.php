<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

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

$factory->define(App\User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'remember_token' => Str::random(10),
    ];
});
$factory->define(App\Post::class, function (Faker $faker) {

    return [
        'title'=>$faker->sentence,
        'body'=>$faker->sentences(3,TRUE),
        'is_published'=>$faker->boolean,
        'excerpt'=>$faker->paragraph(1),
        'user_id'=>App\User::inRandomOrder()->first()->id,
        'created_at'=>\Carbon\Carbon::createFromDate(2020,rand(1,Carbon\Carbon::now()->month), rand(1,28))
    ];

});
$factory->define(App\Comment::class, function (Faker $faker) {

    return [
        'comment'=>$faker->sentences(3,TRUE),
        'user_id'=>App\User::inRandomOrder()->first()->id,
        'post_id'=>App\Post::inRandomOrder()->first()->id,
        'created_at'=>\Carbon\Carbon::createFromDate(2020,rand(1,Carbon\Carbon::now()->month), rand(1,28))
        
    ];

});
