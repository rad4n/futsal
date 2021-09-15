<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSchedulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schedules', function (Blueprint $table) {
            $table->id();
            $table->integer('price')->unsigned();
            $table->date('schedule_from');
            $table->date('schedule_to');
            $table->time('opening_hour', $precision = 0);
            $table->time('closing_hour', $precision = 0);
            $table->integer('duration');
            $table->enum('status',['Availabe','Not Availabe']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('schedules');
    }
}
