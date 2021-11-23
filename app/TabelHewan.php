<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class TabelHewan extends Model
{
    protected $guarded = [];

    protected $PrimaryKey = "id_pemilik_hewan";

    static function hewan(){
        $basis = DB::table('tabel_hewans')
        ->join('tabel_pemilik_hewans','tabel_hewans.id_pemilik_hewan','=','tabel_pemilik_hewans.id')
        ->join('tabel_jenis_hewans','tabel_hewans.id_jenis_hewan','=','tabel_jenis_hewans.id');
        return $basis;
    }

}
