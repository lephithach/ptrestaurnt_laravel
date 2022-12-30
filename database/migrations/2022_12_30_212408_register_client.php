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
        Schema::create('clientuser', function (Blueprint $table) {
            $table->string('sdt', 10)->primary();
            $table->text('password');
            $table->string('ho', 20);
            $table->string('ten', 20);
            $table->date('ngaysinh')->nullable();
            $table->tinyInteger('gioitinh')->comment('0:Nam, 1:Nữ, 2:Khác');
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
        //
    }
};
