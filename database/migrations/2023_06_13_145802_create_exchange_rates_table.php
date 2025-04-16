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
        Schema::create('exchange_rates', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->double('rate_decimal');
            $table->string('rate_normal');
            $table->string('assets_id_from');
            $table->string('assets_id_to');
            $table->integer('status')->default(2);
            $table->string('compare')->nullable();
            $table->integer('ordering')->default(10000);
            $table->timestamps();
            $table->timestamp('exchange_time')->default('0000-00-00 00:00:00');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('exchange_rates');
    }
};
