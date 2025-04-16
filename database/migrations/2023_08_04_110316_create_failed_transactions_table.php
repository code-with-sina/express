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
        Schema::create('failed_transactions', function (Blueprint $table) {
            $table->id();
            $table->integer('express_payout_histories_id');
            $table->string('failed_transact_rfx_id');
            $table->string('tx_ref');
            $table->string('amount');
            $table->string('bank');
            $table->string('account_number');
            $table->string('recipient_name');
            $table->string('recipient_code');
            $table->string('channel');
            $table->string('transact_rfx');
            $table->string('session_id');
            $table->enum('status', ['pending', 'failed', 'completed']);
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
        Schema::dropIfExists('failed_transactions');
    }
};
