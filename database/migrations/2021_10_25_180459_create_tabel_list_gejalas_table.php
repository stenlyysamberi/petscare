<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTabelListGejalasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tabel_list_gejalas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('tabel_jenis_hewan_id')->unsigned();
            $table->string('nama_gejala',50)->nullable();
            $table->timestamps();

            $table->foreign('tabel_jenis_hewan_id')->references('id')->on('tabel_jenis_hewans')
            ->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tabel_list_gejalas');
    }
}
