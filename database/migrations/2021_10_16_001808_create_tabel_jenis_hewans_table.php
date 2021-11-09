<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTabelJenisHewansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tabel_jenis_hewans', function (Blueprint $table) {
            $table->bigIncrements('id');
            //$table->Integer('tabel_list_gejala_id')->unsigned();
            // $table->foreign('gejala_id')->references('id')->on('tabel_list_gejalas');
            $table->string('nama_hewan',20);
            $table->string('category',50)->nullable();
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
        Schema::dropIfExists('tabel_jenis_hewans');
    }
}
