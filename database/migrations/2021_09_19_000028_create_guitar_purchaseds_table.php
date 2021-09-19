<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGuitarPurchasedsTable extends Migration
{
    public function up()
    {
        Schema::create('guitar_purchaseds', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('purchased_date')->nullable();
            $table->string('purchase_price_currency')->nullable();
            $table->decimal('purchase_price_amount', 15, 2)->nullable();
            $table->string('purchased_who')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
