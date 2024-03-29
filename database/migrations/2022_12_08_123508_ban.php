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
        Schema::create('ban', function (Blueprint $table) {
            $table->string('soban', 2)->primary();
            $table->string('tenban', 50);
            $table->string('loaiban', 50)->comment('Standard, Premium, Couple, Family');
            $table->integer('dongiaban');
            $table->tinyInteger('trangthaiban');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ban');
    }
};
