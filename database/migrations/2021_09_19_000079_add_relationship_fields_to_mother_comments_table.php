<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToMotherCommentsTable extends Migration
{
    public function up()
    {
        Schema::table('mother_comments', function (Blueprint $table) {
            $table->unsignedBigInteger('mother_id')->nullable();
            $table->foreign('mother_id', 'mother_fk_4906715')->references('id')->on('mothers');
        });
    }
}
