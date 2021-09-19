<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMotherDescriptionsTable extends Migration
{
    public function up()
    {
        Schema::create('mother_descriptions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->longText('description')->nullable();
            $table->integer('approved')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
