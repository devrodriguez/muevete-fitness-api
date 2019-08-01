<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RoutineCategoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('routine_category', function (Blueprint $table) {
            $table->unsignedInteger('category_id');
            $table->unsignedInteger('routine_id');
            $table->timestamps();

            //Foreign Keys
            $table->foreign('category_id')->references('id')->on('categories');
            $table->foreign('routine_id')->references('id')->on('routines');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('routine_category');
    }
}
