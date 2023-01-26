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
        Schema::create('nhanvien', function (Blueprint $table) {
            $table->bigIncrements('manv');
            $table->string('ho', 25);
            $table->string('ten', 6);
            $table->tinyInteger('gioitinh')->comment('0:Nam, 1:Nữ, 2:Khác');
            $table->date('ngaysinh');
            $table->string('cccd', 12);
            $table->string('sdt', 10);
            $table->string('diachi', 100);
            $table->text('hinh');
            $table->string('machucvu', 3)->index();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('nhanvien');
    }
};
