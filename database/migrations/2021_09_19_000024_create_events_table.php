<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventsTable extends Migration
{
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title')->nullable();
            $table->longText('description')->nullable();
            $table->datetime('start')->nullable();
            $table->integer('hours_endurance')->nullable();
            $table->decimal('price_vod', 15, 2)->nullable();
            $table->decimal('price_live', 15, 2)->nullable();
            $table->string('link_live')->nullable();
            $table->string('link_vod')->nullable();
            $table->integer('percent_to_author')->nullable();
            $table->string('cover_img')->nullable();
            $table->string('cover_video')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
