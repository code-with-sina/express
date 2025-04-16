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
        Schema::create('express_transaction_chats', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('session_id');
            $table->integer('user_id');
            $table->text('message');
            $table->timestamps();
            $table->integer('sender_id');
            $table->integer('receiver_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('express_transaction_chats');
    }
};
