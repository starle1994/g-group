<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Model;

class CreateGigoloRankingStaffTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Model::unguard();
        Schema::create('gigolorankingstaff',function(Blueprint $table){
            $table->increments("id");
            $table->integer("ranking_id")->references("id")->on("ranking")->nullable();
            $table->string("name")->nullable();
            $table->string("image")->nullable();
            $table->tinyInteger("Executive_layer")->default(0)->nullable();
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
        Schema::drop('gigolorankingstaff');
    }

}