<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToUserAddressesTable extends Migration
{
    public function up()
    {
        Schema::table('user_addresses', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id', 'user_fk_4906492')->references('id')->on('users');
        });
    }
}
