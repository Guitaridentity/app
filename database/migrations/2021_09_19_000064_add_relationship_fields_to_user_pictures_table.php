<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToUserPicturesTable extends Migration
{
    public function up()
    {
        Schema::table('user_pictures', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id', 'user_fk_4906504')->references('id')->on('users');
        });
    }
}
