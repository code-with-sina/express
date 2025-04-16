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
        Schema::create('express_transactions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('seller_id');
            $table->integer('buyer_id');
            $table->integer('wallet_id')->nullable();
            $table->string('wallet_name');
            $table->string('wallet_currency');
            $table->double('wallet_amount', 8, 2);
            $table->string('conversion_name');
            $table->double('conversion_amount', 8, 2);
            $table->double('conversion_percentage', 8, 2);
            $table->string('seller_name');
            $table->string('seller_bank_name');
            $table->string('seller_account_number');
            $table->string('seller_account_name');
            $table->text('express_binding_detail_note');
            $table->text('express_binding_confirmation_note')->nullable();
            $table->integer('express_binding_detail_duration')->default(15);
            $table->dateTime('express_binding_detail_start_time');
            $table->dateTime('express_binding_detail_end_time');
            $table->integer('express_binding_detail_expires')->default(0);
            $table->integer('seller_recieved_payment_confirmation')->default(0);
            $table->integer('buyer_disbursment_confirmation')->default(0);
            $table->enum('transaction_status', ['processing', 'pending', 'expires', 'success', 'failure', 're_open', 'closed']);
            $table->string('order_id', 255);
            $table->timestamps();
            $table->string('pop_path')->nullable();
            $table->integer('wallet_name_id')->default(0);
            $table->integer('seller_payment_approval')->default(0);
            $table->text('express_binding_confirmatio_note')->nullable();
            $table->integer('pop_confirmation')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('express_transactions');
    }
};
