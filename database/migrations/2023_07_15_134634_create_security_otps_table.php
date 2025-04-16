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
        Schema::create('security_otps', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('complete')->default(0);
            $table->string('name');
            $table->string('email');
            $table->string('number');
            $table->string('type');
            $table->string('otp');
            $table->string('session');
            $table->string('account');
            $table->text('fingerprint');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('security_otps');
    }
};
