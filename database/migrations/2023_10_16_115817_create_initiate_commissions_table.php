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
        Schema::create('initiate_commissions', function (Blueprint $table) {
            $table->id();
            $table->double('amount', 10, 2);
            $table->string('from_uuid');
            $table->string('to_uuid');
            $table->enum('status', ['sent', 'not sent']);
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
        Schema::dropIfExists('initiate_commissions');
    }
};
