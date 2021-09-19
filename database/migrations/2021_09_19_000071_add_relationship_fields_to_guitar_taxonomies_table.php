<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToGuitarTaxonomiesTable extends Migration
{
    public function up()
    {
        Schema::table('guitar_taxonomies', function (Blueprint $table) {
            $table->unsignedBigInteger('taxonomy_id')->nullable();
            $table->foreign('taxonomy_id', 'taxonomy_fk_4906570')->references('id')->on('taxonomie_names');
        });
    }
}
