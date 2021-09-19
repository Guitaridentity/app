<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMotherVideosTable extends Migration
{
    public function up()
    {
        Schema::create('mother_videos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('url')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
