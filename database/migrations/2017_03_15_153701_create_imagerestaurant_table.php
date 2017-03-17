<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Model;

class CreateImageRestaurantTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Model::unguard();
        Schema::create('imagerestaurant',function(Blueprint $table){
            $table->increments("id");
            $table->string("name")->nullable();
            $table->string("description")->nullable();
            $table->string("image")->nullable();
            $table->integer("restaurant_id")->references("id")->on("restaurant")->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('imagerestaurant');
    }

}