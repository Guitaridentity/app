<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGuitarsTable extends Migration
{
    public function up()
    {
        Schema::create('guitars', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('serial')->nullable();
            $table->integer('strings_number')->nullable();
            $table->integer('certified')->nullable();
            $table->string('cert_code')->nullable();
            $table->integer('to_sell')->nullable();
            $table->decimal('to_sell_price', 15, 2)->nullable();
            $table->string('image_url')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
