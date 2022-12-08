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
        Schema::create('hoadon', function (Blueprint $table) {
            $table->bigIncrements('mahoadon');
            $table->integer('manv')->index();
            $table->dateTime('ngaylaphd');
            $table->dateTime('ngaysuahd');
            $table->string('soban', 2)->index();
            $table->string('tenkh', 60)->nullable();
            $table->string('sdt', 10)->nullable();
            $table->string('diachi', 100)->nullable();
            $table->time('giovao');
            $table->time('giora');
            $table->tinyInteger('chietkhau')->nullable();
            $table->double('tongtien', 10, 2);
            $table->tinyInteger('tinhtrang')->comment('0:Chưa thanh toán, 1:Chờ thanh toán, 2:Đã thanh toán');
            $table->double('khachdua', 10, 2);
            $table->double('trakhach', 10, 2);
            $table->string('ghichu', 150);
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
