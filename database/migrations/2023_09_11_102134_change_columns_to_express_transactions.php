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
        Schema::table('express_transactions', function (Blueprint $table) {
            $table->double('wallet_amount', 10, 2)->change();
            $table->double('conversion_amount', 10, 2)->change();
            $table->double('conversion_percentage', 10, 2)->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('express_transactions', function (Blueprint $table) {
            //
        });
    }
};
