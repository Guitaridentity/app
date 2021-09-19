<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGuitarPurchaseWheresTable extends Migration
{
    public function up()
    {
        Schema::create('guitar_purchase_wheres', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('town')->nullable();
            $table->string('province')->nullable();
            $table->string('state')->nullable();
            $table->string('country')->nullable();
            $table->string('zip')->nullable();
            $table->float('latitude', 9, 6)->nullable();
            $table->float('longitude', 9, 6)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
