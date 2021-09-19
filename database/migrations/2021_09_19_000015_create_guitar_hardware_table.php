<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGuitarHardwareTable extends Migration
{
    public function up()
    {
        Schema::create('guitar_hardware', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('guitar_production_year')->nullable();
            $table->integer('pickup_number')->nullable();
            $table->string('pickup_configuration')->nullable();
            $table->integer('is_left_handed')->nullable();
            $table->longText('decription')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
