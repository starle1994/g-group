<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Model;

class CreateRankingAllTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Model::unguard();
        Schema::create('rankingall',function(Blueprint $table){
            $table->increments("id");
            $table->integer("grouprankingtype_id")->references("id")->on("grouprankingtype")->nullable();
            $table->integer("godstaffs_id")->references("id")->on("godstaffs")->nullable();
            $table->string("image")->nullable();
            $table->integer("ranking_id")->references("id")->on("ranking")->nullable();
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
        Schema::drop('rankingall');
    }

}