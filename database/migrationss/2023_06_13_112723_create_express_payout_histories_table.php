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
        Schema::create('express_payout_histories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('tx_ref');
            $table->string('amount');
            $table->string('bank');
            $table->string('account_number');
            $table->string('recipient_name');
            $table->string('recipient_code');
            $table->string('channel');
            $table->enum('status', ['pending', 'fail', 'success', 'manual_confirmation']);
            $table->timestamps();
            $table->string('session_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('express_payout_histories');
    }
};
