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
        Schema::table('bank_users', function (Blueprint $table) {
            //
            $table->integer('bank_id');
            $table->string('code')->nullable();
            $table->string('slug')->nullable();
            $table->string('longcode')->nullable();
            $table->string('gateway')->nullable();
            $table->enum('active', ['false', 'true'])->default('false');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('bank_users', function (Blueprint $table) {
            //
        });
    }
};
