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
        Schema::create('net_auth_transceivers', function (Blueprint $table) {
            $table->id();
            $table->string('token', 255)->unique();
            $table->string('user_id');
            $table->string('from_subdomain');
            $table->string('grant_pass');
            $table->enum('one_grant', ['pending', 'granted', 'denied', 'expired'])->default('pending');
            $table->timestamp('expires_at')->nullable();
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
        Schema::dropIfExists('net_auth_transceivers');
    }
};
