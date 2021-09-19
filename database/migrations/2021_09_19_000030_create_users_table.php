<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->nullable();
            $table->string('email')->nullable()->unique();
            $table->datetime('email_verified_at')->nullable();
            $table->string('password')->nullable();
            $table->string('remember_token')->nullable();
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('mobile_prefix')->nullable();
            $table->string('mobile_number')->nullable();
            $table->string('language')->nullable();
            $table->date('date_birth')->nullable();
            $table->string('avatar')->nullable();
            $table->integer('disabled')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
