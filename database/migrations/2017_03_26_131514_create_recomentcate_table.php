<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Model;

class CreateRecomentCateTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Model::unguard();
        Schema::create('recomentcate',function(Blueprint $table){
            $table->increments("id");
            $table->string("image");
            $table->string("name");
            $table->string("alias");
            $table->integer("shopslist_id")->references("id")->on("shopslist")->nullable();
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
        Schema::drop('recomentcate');
    }

}