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
            $table->id(); // Auto-incrementing primary key
            $table->string('username')->unique(); // Ensure usernames are unique
            $table->string('email')->unique(); // Ensure email are unique
            $table->charset = 'utf8';
            $table->collation = 'utf8_unicode_ci';
        });

        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->date('task_date');
            $table->time('task_time');
            $table->string('task_location');
            $table->string('tag_id'); // tag_id field for foreign key
            $table->string('username'); // username field for foreign key
            $table->charset = 'utf8';
            $table->collation = 'utf8_unicode_ci';
        });

        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->string('tag_name');
            $table->date('tag_id')->unique();
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