<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataPenyakitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_penyakits', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama_penyakit');
            $table->bigInteger('id_jenis_hewan')->unsigned();
            
            $table->timestamps();

            $table->foreign('id_jenis_hewan')->references('id')->on('tabel_jenis_hewans');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('data_penyakits');
    }
}
