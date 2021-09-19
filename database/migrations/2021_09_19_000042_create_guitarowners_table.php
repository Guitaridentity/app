<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGuitarownersTable extends Migration
{
    public function up()
    {
        Schema::create('guitarowners', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('hix')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
