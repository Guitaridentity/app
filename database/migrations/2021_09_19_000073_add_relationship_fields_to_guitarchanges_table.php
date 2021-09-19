<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToGuitarchangesTable extends Migration
{
    public function up()
    {
        Schema::table('guitarchanges', function (Blueprint $table) {
            $table->unsignedBigInteger('guitar_owner_id')->nullable();
            $table->foreign('guitar_owner_id', 'guitar_owner_fk_4906654')->references('id')->on('guitarowners');
        });
    }
}
