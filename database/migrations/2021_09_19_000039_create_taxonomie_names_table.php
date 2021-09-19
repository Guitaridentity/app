<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTaxonomieNamesTable extends Migration
{
    public function up()
    {
        Schema::create('taxonomie_names', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name_en')->nullable();
            $table->string('name_it')->nullable();
            $table->string('name_es')->nullable();
            $table->string('name_ja')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
