<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $createData = 20;
        // $this->call(UsersTableSeeder::class);
        factory(App\User::class,10)->create();
        factory(App\Store::class,$createData)->create();
        factory(App\Product::class,$createData)->create();
        factory(App\Product_image::class,10)->create();
        factory(App\Order::class,$createData)->create();
        factory(App\Order_detail::class,$createData)->create();
        factory(App\Category::class,$createData)->create();
        factory(App\Auction::class,$createData)->create();

    }
}
