<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class DataPenyakit extends Model
{
    protected $guarded = [];



    static function sakit (){
        $del = DB::table('tabel_jenis_hewans')
        ->join('data_penyakits','tabel_jenis_hewans.id','=','data_penyakits.id_jenis_hewan');
        return $del;
    }
}
