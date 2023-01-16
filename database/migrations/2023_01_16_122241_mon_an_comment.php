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
        Schema::create('monancomment', function (Blueprint $table) {
            $table->bigIncrements('id_comment');
            $table->integer('mamon')->index();
            $table->integer('sdt')->index();
            $table->text('comment');
            $table->tinyInteger('hienthi')->default(0);
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
        Schema::dropIfExists('monancomment');
    }
};
