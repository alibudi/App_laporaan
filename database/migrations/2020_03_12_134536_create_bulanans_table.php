<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBulanansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bulanans', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama', 255);
            $table->date('tgl');
            $table->integer('nilai');
            $table->text('keterangan');
            $table->string('nota', 255);
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
        Schema::dropIfExists('bulanans');
    }
}
