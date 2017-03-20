<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Model;

class CreateBestRankingTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Model::unguard();
        Schema::create('bestranking',function(Blueprint $table){
            $table->increments("id");
            $table->integer("godstaffs_id")->references("id")->on("godstaffs");
            $table->string("image");
            $table->integer("ranking_id")->references("id")->on("ranking");
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
        Schema::drop('bestranking');
    }

}