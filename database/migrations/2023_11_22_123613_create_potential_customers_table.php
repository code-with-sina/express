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
        Schema::create('potential_customers', function (Blueprint $table) {
            $table->id();
            $table->integer('firstname');
            $table->string('email');
            $table->enum('reminded', ['no', 'first_reminder', 'last_reminder']);
            $table->enum('status', ['registered', 'unregistered']);
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
        Schema::dropIfExists('potential_customers');
    }
};
