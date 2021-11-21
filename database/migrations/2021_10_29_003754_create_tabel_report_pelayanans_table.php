<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTabelReportPelayanansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_konsultasi', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->String('tgl_konsultasi');
            $table->Integer('id_data_hewan');
            $table->Integer('id_data_basis_aturan');
            $table->Integer('id_data_jenis_hewan');
            $table->String('hasil_konsultasi');
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
        Schema::dropIfExists('tabel_report_pelayanans');
    }
}
