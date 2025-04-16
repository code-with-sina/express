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
        Schema::create('anchor_bank_lists', function (Blueprint $table) {
            $table->id();
            $table->string('uuid');
            $table->string('type');
            $table->string('nipcode');
            $table->string('name');
            $table->string('cbncode');
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
        Schema::dropIfExists('anchor_bank_lists');
    }
};
