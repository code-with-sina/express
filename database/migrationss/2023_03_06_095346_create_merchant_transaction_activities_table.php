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
        Schema::create('merchant_transaction_activities', function (Blueprint $table) {
            $table->id();
            $table->string('tnx_ref');
            $table->double('amount', 8,2);
            $table->integer('success')->default(0);
            $table->integer('failure')->default(0);
            $table->string('ratefy_ref');
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
        Schema::dropIfExists('merchant_transaction_activities');
    }
};
