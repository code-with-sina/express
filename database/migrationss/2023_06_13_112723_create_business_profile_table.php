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
        Schema::create('business_profile', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('users_id');
            $table->string('logo_path');
            $table->string('business_name');
            $table->string('category');
            $table->text('description');
            $table->string('linkedin');
            $table->string('siteprofiles');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('business_profile');
    }
};
