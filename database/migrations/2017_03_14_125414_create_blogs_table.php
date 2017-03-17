<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Model;

class CreateBlogsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Model::unguard();
        Schema::create('blogs',function(Blueprint $table){
            $table->increments("id");
            $table->string("name");
            $table->string("text")->nullable();
            $table->string("description")->nullable();
            $table->string("content");
            $table->string("image");
            $table->integer("shopslist_id")->references("id")->on("shopslist");
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
        Schema::drop('blogs');
    }

}