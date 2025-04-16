<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
            $table->string('username')->nullable();
            $table->string('picture')->nullable();
            $table->text('biography')->nullable()->fulltext();
            $table->integer('type')->default(2);
            $table->integer('blocked')->default(0);
            $table->integer('direct_publish')->default(0);
            $table->string('mobile_number')->nullable();
            $table->string('emailcode')->nullable();
            $table->integer('activate')->default(0);
            $table->tinyInteger('active_status')->default(0);
            $table->string('avatar')->default('avatar.png');
            $table->tinyInteger('dark_mode')->default(0);
            $table->string('messenger_color')->default('#2180f3');
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
    }
};
