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
        Schema::create('contacts', function (Blueprint $table) {
            $table->foreignId('id')->primary();
            $table->string('phone');
            $table->string('email');
            $table->timestamps();
        });

        Schema::table('contacts', function (Blueprint $table) {
            $table->foreign('id')->references('id')->on('authors')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('contacts', function (Blueprint $table) {
            $table->dropForeign(['id']);
        });

        Schema::dropIfExists('contacts');
    }
};
