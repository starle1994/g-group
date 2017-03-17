<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Model;

class CreateImagesEventFeatureTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Model::unguard();
        Schema::create('imageseventfeature',function(Blueprint $table){
            $table->increments("id");
            $table->string("image");
            $table->string("description")->nullable();
            $table->integer("eventsfeature_id")->references("id")->on("eventsfeature")->nullable();
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
        Schema::drop('imageseventfeature');
    }

}