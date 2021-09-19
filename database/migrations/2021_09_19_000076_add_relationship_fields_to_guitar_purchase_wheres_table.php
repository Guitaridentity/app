<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToGuitarPurchaseWheresTable extends Migration
{
    public function up()
    {
        Schema::table('guitar_purchase_wheres', function (Blueprint $table) {
            $table->unsignedBigInteger('guitar_purchase_id')->nullable();
            $table->foreign('guitar_purchase_id', 'guitar_purchase_fk_4906678')->references('id')->on('guitar_purchaseds');
        });
    }
}
