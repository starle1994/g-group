<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Model;

class CreateScheduleTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Model::unguard();
        Schema::create('schedule',function(Blueprint $table){
            $table->increments("id");
            $table->string("name_event");
            $table->text("description");
            $table->dateTime("start_time");
            $table->dateTime("end_time");
            $table->string("image");
            $table->string("color");
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
        Schema::drop('schedule');
    }

}