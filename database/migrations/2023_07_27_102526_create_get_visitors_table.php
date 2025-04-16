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
        Schema::create('get_visitors', function (Blueprint $table) {
            $table->id();
            $table->string('ip');
            $table->text('browser')->nullable();
            $table->text('version')->nullable();
            $table->string('is_mobile')->nullable();
            $table->string('is_tablet')->nullable();
            $table->string('is_phone')->nullable();
            $table->string('is_robot')->nullable();
            $table->string('platform')->nullable();
            $table->string('device')->nullable();
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
        Schema::dropIfExists('get_visitors');
    }
};
