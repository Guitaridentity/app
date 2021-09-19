<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToEventUsersTable extends Migration
{
    public function up()
    {
        Schema::table('event_users', function (Blueprint $table) {
            $table->unsignedBigInteger('event_id')->nullable();
            $table->foreign('event_id', 'event_fk_4911667')->references('id')->on('events');
        });
    }
}
