<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMotherCommentsTable extends Migration
{
    public function up()
    {
        Schema::create('mother_comments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->longText('comment')->nullable();
            $table->integer('signaled')->nullable();
            $table->integer('disabled')->nullable();
            $table->integer('likes')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
