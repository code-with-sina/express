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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->integer('users_id');
            $table->integer('seller_id');
            $table->double('amount', 8,2);
            $table->double('amount_release', 8,2);
            $table->string('selling');
            $table->enum('currency', ['NGN', 'USD', 'GBP']);
            $table->integer('start')->default(0);
            $table->integer('end')->default(0);
            $table->integer('hold')->default(0);
            $table->integer('release')->default(0);
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
        Schema::dropIfExists('transactions');
    }
};
