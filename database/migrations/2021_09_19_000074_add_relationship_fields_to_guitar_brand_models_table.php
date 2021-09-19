<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToGuitarBrandModelsTable extends Migration
{
    public function up()
    {
        Schema::table('guitar_brand_models', function (Blueprint $table) {
            $table->unsignedBigInteger('guitar_brand_id')->nullable();
            $table->foreign('guitar_brand_id', 'guitar_brand_fk_4906556')->references('id')->on('guitar_brands');
        });
    }
}
