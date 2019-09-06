<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class WeeklyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('weeklies', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('routine_availability_id');
            $table->unsignedInteger('session_id');
            $table->boolean('enabled')->default(true);
            $table->timestamps();

            //Foreign keys
            $table->foreign('routine_availability_id')->references('id')->on('routine_availability');
            $table->foreign('session_id')->references('id')->on('sessions');

            //Unique
            $table->unique(['routine_availability_id', 'session_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('weeklies');
    }
}
