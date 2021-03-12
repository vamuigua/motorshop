<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->foreignId('car_make_id')->constrained();
            $table->foreignId('car_model_id')->constrained();
            $table->year('year');
            $table->bigInteger('mileage');
            $table->string('body_type');
            $table->string('condition_type');
            $table->string('transmission_type');
            $table->bigInteger('price');
            $table->string('duty');
            $table->boolean('negotiable');
            $table->string('fuel_type');
            $table->string('interior_type');
            $table->string('color_type');
            $table->bigInteger('engine_size');
            $table->text('description');
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
        Schema::drop('cars');
    }
}
