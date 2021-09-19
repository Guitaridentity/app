<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToGuitarHardwareTable extends Migration
{
    public function up()
    {
        Schema::table('guitar_hardware', function (Blueprint $table) {
            $table->unsignedBigInteger('guitar_id')->nullable();
            $table->foreign('guitar_id', 'guitar_fk_4906605')->references('id')->on('guitars');
            $table->unsignedBigInteger('country_produced_id')->nullable();
            $table->foreign('country_produced_id', 'country_produced_fk_4906610')->references('id')->on('countries');
            $table->unsignedBigInteger('body_shape_id')->nullable();
            $table->foreign('body_shape_id', 'body_shape_fk_4906611')->references('id')->on('guitar_taxonomies');
            $table->unsignedBigInteger('top_material_id')->nullable();
            $table->foreign('top_material_id', 'top_material_fk_4906612')->references('id')->on('guitar_taxonomies');
            $table->unsignedBigInteger('neck_material_id')->nullable();
            $table->foreign('neck_material_id', 'neck_material_fk_4906613')->references('id')->on('guitar_taxonomies');
            $table->unsignedBigInteger('fretboard_material_id')->nullable();
            $table->foreign('fretboard_material_id', 'fretboard_material_fk_4906614')->references('id')->on('guitar_taxonomies');
            $table->unsignedBigInteger('body_finish_id')->nullable();
            $table->foreign('body_finish_id', 'body_finish_fk_4906615')->references('id')->on('guitar_taxonomies');
            $table->unsignedBigInteger('hardware_finish_id')->nullable();
            $table->foreign('hardware_finish_id', 'hardware_finish_fk_4906616')->references('id')->on('guitar_taxonomies');
            $table->unsignedBigInteger('bridge_type_id')->nullable();
            $table->foreign('bridge_type_id', 'bridge_type_fk_4906617')->references('id')->on('guitar_taxonomies');
            $table->unsignedBigInteger('pickup_neck_id')->nullable();
            $table->foreign('pickup_neck_id', 'pickup_neck_fk_4906620')->references('id')->on('guitar_taxonomies');
            $table->unsignedBigInteger('pickup_center_id')->nullable();
            $table->foreign('pickup_center_id', 'pickup_center_fk_4906621')->references('id')->on('guitar_taxonomies');
            $table->unsignedBigInteger('pickup_bridge_id')->nullable();
            $table->foreign('pickup_bridge_id', 'pickup_bridge_fk_4906622')->references('id')->on('guitar_taxonomies');
        });
    }
}
