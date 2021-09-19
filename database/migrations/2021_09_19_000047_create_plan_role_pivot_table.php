<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlanRolePivotTable extends Migration
{
    public function up()
    {
        Schema::create('plan_role', function (Blueprint $table) {
            $table->unsignedBigInteger('plan_id');
            $table->foreign('plan_id', 'plan_id_fk_4906527')->references('id')->on('plans')->onDelete('cascade');
            $table->unsignedBigInteger('role_id');
            $table->foreign('role_id', 'role_id_fk_4906527')->references('id')->on('roles')->onDelete('cascade');
        });
    }
}
