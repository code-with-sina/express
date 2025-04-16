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
        Schema::create('exchange_items', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('item');
            $table->string('sub_item', 255);
            $table->string('labels', 255);
            $table->integer('ordering')->default(10000);
            $table->double('percntage', 8, 2);
            $table->integer('active')->default(1);
            $table->timestamps();
            $table->string('image_path');
            $table->string('currency')->nullable();
            $table->text('seller_note')->nullable();
            $table->string('duration_cap')->nullable();
            $table->string('duration')->nullable();
            $table->text('confirmation_note')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('exchange_items');
    }
};
