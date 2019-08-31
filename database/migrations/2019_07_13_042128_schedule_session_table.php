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
            $table->unsignedInteger('weekly_id');
            $table->unsignedInteger('customer_id');
            $table->string('session_date', 50);
            $table->timestamps();

            //Foreign keys
            $table->foreign('weekly_id')->references('id')->on('weeklies');
            $table->foreign('customer_id')->references('id')->on('customers');

            //Unique
            $table->unique(['weekly_id', 'customer_id', 'session_date']);
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
