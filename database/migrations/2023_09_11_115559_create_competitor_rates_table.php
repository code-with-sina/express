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
        Schema::create('competitor_rates', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->double('withdraw_in_fee', 8, 2);
            $table->double('conversion_fee', 8, 2);
            $table->double('service_fee', 8, 2);
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
        Schema::dropIfExists('competitor_rates');
    }
};
