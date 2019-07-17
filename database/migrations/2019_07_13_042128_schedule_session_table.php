<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ScheduleSessionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schedule_session', function (Blueprint $table) {
            $table->unsignedInteger('customer_id');
            $table->unsignedInteger('routine_id');
            $table->unsignedInteger('session_id');
            $table->string('session_date', 50);
            $table->timestamps();

            $table->unique(['customer_id', 'routine_id', 'session_id', 'session_date'], 'schedule_session_primary');

            //Foreign
            $table->foreign('customer_id')->references('id')->on('customers');
            $table->foreign('routine_id')->references('id')->on('routines');
            $table->foreign('session_id')->references('id')->on('sessions');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('schedule_session');
    }
}
