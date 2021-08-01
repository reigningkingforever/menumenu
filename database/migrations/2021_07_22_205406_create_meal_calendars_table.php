<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMealCalendarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('meal_calendars', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamp('datentime');
            $table->unsignedBigInteger('meal_id');
            $table->string('period'); //breakfast, lunch, dinner, dessert
            $table->timestamps();
            $table->foreign('meal_id')->references('id')->on('meals')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('meal_calendars');
    }
}
