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
        Schema::create('khachhang', function (Blueprint $table) {
            $table->bigIncrements('makh');
            $table->string('ho', 20);
            $table->string('ten', 6);
            $table->string('sdt', 10)->nullable();
            $table->tinyInteger('gioitinh')->comment('0:Nam, 1:Nữ, 2:Khác, 3:Default')->default('3');
            $table->string('diachi', 150)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('khachhang');
    }
};
