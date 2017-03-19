<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Model;

class CreateGodStaffsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Model::unguard();
        Schema::create('godstaffs',function(Blueprint $table){
            $table->increments("id");
            $table->integer("shopslist_id")->references("id")->on("shopslist");
            $table->string("name");
            $table->string("romajiname")->nullable();
            $table->string("position")->nullable();
            $table->string("image");
            $table->text("description")->nullable();
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
        Schema::drop('godstaffs');
    }

}