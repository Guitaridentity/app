<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToGuitarPicturesTable extends Migration
{
    public function up()
    {
        Schema::table('guitar_pictures', function (Blueprint $table) {
            $table->unsignedBigInteger('guitar_id')->nullable();
            $table->foreign('guitar_id', 'guitar_fk_4906636')->references('id')->on('guitars');
        });
    }
}
