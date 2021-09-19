<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToUsersTable extends Migration
{
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->unsignedBigInteger('user_profession_id')->nullable();
            $table->foreign('user_profession_id', 'user_profession_fk_4906488')->references('id')->on('user_professions');
        });
    }
}
