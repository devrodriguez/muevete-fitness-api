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
            $table->unsignedInteger('calendar_id');
            
            $table->timestamps();

            $table->unique(['customer_id', 'calendar_id']);

            //Foreign keys
            $table->foreign('customer_id')->references('id')->on('customers');
            $table->foreign('calendar_id')->references('id')->on('calendars');
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
