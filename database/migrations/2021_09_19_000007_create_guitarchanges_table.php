<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGuitarchangesTable extends Migration
{
    public function up()
    {
        Schema::create('guitarchanges', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->longText('description')->nullable();
            $table->date('date_change')->nullable();
            $table->string('done_by')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
