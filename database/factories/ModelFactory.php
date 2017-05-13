<?php

use App\Models\CargoLetter;
use App\Models\Category;
use App\Models\Customer;
use App\Models\Destination;
use App\Models\Product;
use App\Models\TravelDocument;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});


$factory->define(Product::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->word,
        'image' => $faker->imageUrl(),
        'weight' => $faker->randomDigit,
        'price' => $faker->randomNumber(),
        'unit' => $faker->word,
        'detail' => $faker->paragraph(),
        'category_id' => 1,
    ];
});

$factory->define(Category::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->word,
    ];
});


$factory->define(Customer::class, function (Faker\Generator $faker) {
    return [
        'customer_id' => $faker->unique()->randomLetter,
        'name' => $faker->name,
    ];
});


$factory->define(CargoLetter::class, function (Faker\Generator $faker) {
    return [
        'license_plate' => $faker->bothify('? #### ???'),
    ];
});


$factory->define(TravelDocument::class, function (Faker\Generator $faker) {
    return [
        'card_id' => $faker->uuid,
        'address' => $faker->address,
        'arrive_at' => $faker->dateTime(),
    ];
});
