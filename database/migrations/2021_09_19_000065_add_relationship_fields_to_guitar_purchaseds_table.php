<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToGuitarPurchasedsTable extends Migration
{
    public function up()
    {
        Schema::table('guitar_purchaseds', function (Blueprint $table) {
            $table->unsignedBigInteger('owner_id')->nullable();
            $table->foreign('owner_id', 'owner_fk_4906662')->references('id')->on('guitarowners');
        });
    }
}
