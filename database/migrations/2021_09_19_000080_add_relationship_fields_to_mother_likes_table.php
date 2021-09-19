<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToMotherLikesTable extends Migration
{
    public function up()
    {
        Schema::table('mother_likes', function (Blueprint $table) {
            $table->unsignedBigInteger('mother_id')->nullable();
            $table->foreign('mother_id', 'mother_fk_4906724')->references('id')->on('mothers');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id', 'user_fk_4906725')->references('id')->on('users');
        });
    }
}
