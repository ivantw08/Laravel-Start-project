<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAllTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //user table 
        Schema::create('user', function (Blueprint $table) {
            $table->increments('id');
            $table->string('profile_img')->nullable();
            $table->string('name',50)->nullable();
            $table->string('email')->unique();
            $table->string('password');
            $table->string('level')->nullable();
            $table->string('app_id')->nullable();
            $table->string('city')->default(0);
            $table->string('address')->default(0);
            $table->string('store_id')->default(0);
            $table->rememberToken()->nullable();
            $table->softDeletes();	
            $table->timestamps();
        });
        Schema::create('order', function (Blueprint $table) {
            $table->increments('id');
            $table->string('user_id');
            $table->string('payment');
            $table->string('status');
            $table->softDeletes();	
            $table->timestamps();
        });

        Schema::create('order_detail', function (Blueprint $table) {
            $table->increments('id');
            $table->string('order_id');
            $table->string('product_id');
            $table->string('quantity');
            $table->softDeletes();	
            $table->timestamps();
        });
        
        Schema::create('category', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique();
            $table->softDeletes();	
            $table->timestamps();
        });


        Schema::create('product', function (Blueprint $table) {
            $table->increments('id');
            $table->string('store_id');
            $table->string('name');
            $table->string('category_id');
            $table->string('price');
            $table->string('sell_price');
            $table->string('description');
            $table->softDeletes();	
            $table->timestamps();
        });

        Schema::create('product_image', function (Blueprint $table) {
            $table->increments('id');
            $table->string('product_id');
            $table->string('name');
            $table->string('url');
            $table->softDeletes();	
            $table->timestamps();
        });


        Schema::create('auction', function (Blueprint $table) {
            $table->increments('id');
            $table->string('store_id');
            $table->string('name');
            $table->string('description');
            $table->string('img');
            $table->string('category_id');
            $table->string('start_price');
            $table->string('bid');
            $table->string('price');
            $table->string('deal_price');
            $table->string('status');
            $table->softDeletes();	
            $table->timestamps();
        });
        
        Schema::create('auction', function (Blueprint $table) {
            $table->increments('id');
            $table->string('store_id');
            $table->string('name');
            $table->string('description');
            $table->string('img');
            $table->string('category_id');
            $table->string('start_price');
            $table->string('bid');
            $table->string('price');
            $table->string('deal_price');
            $table->string('status');
            $table->softDeletes();	
            $table->timestamps();
        });
       

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
