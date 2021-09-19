<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToGuitarLikesTable extends Migration
{
    public function up()
    {
        Schema::table('guitar_likes', function (Blueprint $table) {
            $table->unsignedBigInteger('guitar_id')->nullable();
            $table->foreign('guitar_id', 'guitar_fk_4906648')->references('id')->on('guitars');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id', 'user_fk_4906649')->references('id')->on('users');
        });
    }
}
