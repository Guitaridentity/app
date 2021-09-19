<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGuitarTaxonomiesTable extends Migration
{
    public function up()
    {
        Schema::create('guitar_taxonomies', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('value')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
