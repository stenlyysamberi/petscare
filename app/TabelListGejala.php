<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class TabelListGejala extends Model
{
    //
    protected $guarded = [];

    

    public function tabel_jenis_hewan(){
        // return $this->hasMany(TabelJenisHewan::class);
        
    }

    static function jenis_hewan(){
        $return = DB::table('tabel_jenis_hewans')
        ->join('tabel_list_gejalas','tabel_jenis_hewans.id',
        '=','tabel_list_gejalas.tabel_jenis_hewan_id');
        return $return;
       }
}






