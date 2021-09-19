<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToGuitarsTable extends Migration
{
    public function up()
    {
        Schema::table('guitars', function (Blueprint $table) {
            $table->unsignedBigInteger('guitar_type_id')->nullable();
            $table->foreign('guitar_type_id', 'guitar_type_fk_4906582')->references('id')->on('guitar_types');
            $table->unsignedBigInteger('guitar_brand_id')->nullable();
            $table->foreign('guitar_brand_id', 'guitar_brand_fk_4906583')->references('id')->on('guitar_brands');
            $table->unsignedBigInteger('guitar_brand_model_id')->nullable();
            $table->foreign('guitar_brand_model_id', 'guitar_brand_model_fk_4906584')->references('id')->on('guitar_brand_models');
            $table->unsignedBigInteger('guitar_color_id')->nullable();
            $table->foreign('guitar_color_id', 'guitar_color_fk_4906586')->references('id')->on('guitar_taxonomies');
            $table->unsignedBigInteger('guitar_owner_id')->nullable();
            $table->foreign('guitar_owner_id', 'guitar_owner_fk_4906594')->references('id')->on('guitarowners');
        });
    }
}
