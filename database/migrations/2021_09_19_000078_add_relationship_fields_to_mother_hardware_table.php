<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToMotherHardwareTable extends Migration
{
    public function up()
    {
        Schema::table('mother_hardware', function (Blueprint $table) {
            $table->unsignedBigInteger('mother_id')->nullable();
            $table->foreign('mother_id', 'mother_fk_4906694')->references('id')->on('mothers');
            $table->unsignedBigInteger('country_produced_id')->nullable();
            $table->foreign('country_produced_id', 'country_produced_fk_4906696')->references('id')->on('countries');
            $table->unsignedBigInteger('body_shape_id')->nullable();
            $table->foreign('body_shape_id', 'body_shape_fk_4906697')->references('id')->on('guitar_taxonomies');
            $table->unsignedBigInteger('top_material_id')->nullable();
            $table->foreign('top_material_id', 'top_material_fk_4906698')->references('id')->on('guitar_taxonomies');
            $table->unsignedBigInteger('neck_material_id')->nullable();
            $table->foreign('neck_material_id', 'neck_material_fk_4906699')->references('id')->on('guitar_taxonomies');
            $table->unsignedBigInteger('fretboard_material_id')->nullable();
            $table->foreign('fretboard_material_id', 'fretboard_material_fk_4906700')->references('id')->on('guitar_taxonomies');
            $table->unsignedBigInteger('body_finish_id')->nullable();
            $table->foreign('body_finish_id', 'body_finish_fk_4906701')->references('id')->on('guitar_taxonomies');
            $table->unsignedBigInteger('hardware_finish_id')->nullable();
            $table->foreign('hardware_finish_id', 'hardware_finish_fk_4906702')->references('id')->on('guitar_taxonomies');
            $table->unsignedBigInteger('bridge_type_id')->nullable();
            $table->foreign('bridge_type_id', 'bridge_type_fk_4906703')->references('id')->on('guitar_taxonomies');
            $table->unsignedBigInteger('pickup_neck_id')->nullable();
            $table->foreign('pickup_neck_id', 'pickup_neck_fk_4906706')->references('id')->on('guitar_taxonomies');
            $table->unsignedBigInteger('pickup_center_id')->nullable();
            $table->foreign('pickup_center_id', 'pickup_center_fk_4906707')->references('id')->on('guitar_taxonomies');
            $table->unsignedBigInteger('pickup_bridge_id')->nullable();
            $table->foreign('pickup_bridge_id', 'pickup_bridge_fk_4906708')->references('id')->on('guitar_taxonomies');
        });
    }
}
