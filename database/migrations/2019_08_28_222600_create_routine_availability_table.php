<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoutineAvailabilityTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('routine_availability', function (Blueprint $table) {
            $table->unsignedInteger('routine_id');
            $table->unsignedInteger('available_day_id');

            //Foreign keys
            $table->foreign('routine_id')->references('id')->on('routines');
            $table->foreign('available_day_id')->references('id')->on('available_days');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('routine_availability');
    }
}
