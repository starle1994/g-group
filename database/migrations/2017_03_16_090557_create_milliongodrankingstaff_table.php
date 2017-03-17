<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Model;

class CreateMillionGodRankingStaffTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Model::unguard();
        Schema::create('milliongodrankingstaff',function(Blueprint $table){
            $table->increments("id");
            $table->integer("ranking_id")->references("id")->on("ranking");
            $table->string("name")->nullable();
            $table->string("image")->nullable();
            $table->tinyInteger("executive_layer")->default(0)->nullable();
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
        Schema::drop('milliongodrankingstaff');
    }

}