<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserAndTasksTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    public function boot()
    {
        Schema::defaultStringLength(191);
    }

    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id() -> unique();
            $table->uid() -> unique() -> unique();
            $table->string('username');
            $table->string('password');
            $table->charset = 'utf8';
            $table->collation = 'utf8_unicode_ci';
        });

        Schema::create('tasks', function (Blueprint $table) {
            $table->id() -> unique();
            $table->uid() -> unique() -> unique();
            $table->string('title');
            $table->date('task_date');
            $table->time('task_time');
            $table->string('task_location');
            $table->string('task_tag');
            $table->charset = 'utf8';
            $table->collation = 'utf8_unicode_ci';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('tasks');
    }
}