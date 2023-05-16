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
        Schema::create('buyings', function (Blueprint $table) {
            $table->id();
            $table->integer('seller_id');
            $table->string('wallets');
            $table->integer('available')->default(0);
            $table->double('capacity', 8,2);
            $table->enum('currency', ['USD', 'GBP', 'EUR']);
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
        Schema::dropIfExists('buyings');
    }
};
