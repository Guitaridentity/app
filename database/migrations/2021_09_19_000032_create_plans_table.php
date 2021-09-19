<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlansTable extends Migration
{
    public function up()
    {
        Schema::create('plans', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->nullable();
            $table->decimal('price', 15, 2)->nullable();
            $table->integer('certification')->nullable();
            $table->integer('picture')->nullable();
            $table->string('video')->nullable();
            $table->integer('events')->nullable();
            $table->string('courses')->nullable();
            $table->integer('month')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
