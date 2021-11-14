<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class TabelBasisAturan extends Model
{
    protected $guarded = [];

   

    protected $primaryKey = "id_basis_atauran";


    static function basis_aturan(){
        $basis = DB::table('tabel_basis_aturans')
        ->join('tabel_list_gejalas','tabel_basis_aturans.id_gejala','=','tabel_list_gejalas.id')
        ->join('data_penyakits','tabel_basis_aturans.id_penyakit','=','data_penyakits.id')
        ->join('tabel_jenis_hewans','tabel_basis_aturans.id_hewan','=','tabel_jenis_hewans.id')
        
        ;

        return $basis;
    }
}
