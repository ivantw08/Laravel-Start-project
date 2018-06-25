<?php

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
        'level' => 'sliver',
        'app_id' =>rand(00000,99999),
        //'postcode'=> rand(00000,99999),
        'city' =>$faker->city,
        'address' =>$faker->address,
        'remember_token' => str_random(10),
    ];
});

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Store::class, function (Faker\Generator $faker) {
    static $password;
    return [
        'fb_id' => rand(1,10),
        'user_id' => rand(1,10),
        'name' => $faker->company ,
        'description' => $faker->text,
    ];
});

$factory->define(App\Store::class, function (Faker\Generator $faker) {
    static $password;
    return [
        'fb_id' => rand(1,10),
        'user_id' => rand(1,10),
        'name' => $faker->company ,
        'description' => $faker->word,
    ];
});


$factory->define(App\Product::class, function (Faker\Generator $faker) {
    return [
        'store_id' => rand(1,10),
        'name' => $faker->word ,
        'category_id' => rand(1,10) ,
        'price' => rand(200,700),
        'sell_price' => rand(200,700),
        'description' => $faker->word,
    ];
});

$factory->define(App\Product_image::class, function (Faker\Generator $faker) {
    return [
        'product_id' => rand(1,10),
        'name' =>$faker->word,
        'url' => 'www.test.com/'.$faker->word.rand(1,10),
    ];
});

$factory->define(App\Order::class, function (Faker\Generator $faker) {
    return [
        'user_id' => rand(1,10),
        'payment' =>'green',
        'status' => 'shipped',
    ];
});


$factory->define(App\Order_detail::class, function (Faker\Generator $faker) {
    return [
        'order_id' => rand(1,10),
        'product_id' => rand(1,10),
        'quantity' =>  rand(1,10),
    ];
});



$factory->define(App\Category::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->word.rand(1,1000),
    ];
});


$factory->define(App\Auction::class, function (Faker\Generator $faker) {
    return [
        'store_id' =>rand(1,10),
        'name' =>$faker->word,
        'description' =>$faker->word,
        'img' => 'www.test.com/'.$faker->word.rand(1,10),
        'category_id' => rand(1,10),
        'start_price' => '200',
        'bid' => '100',
        'price'=>'300',
        'deal_price'=>'300',
        'status'=>'finish'
    ];
});