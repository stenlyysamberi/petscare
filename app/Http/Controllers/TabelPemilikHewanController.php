<?php

namespace App\Http\Controllers;
use App\TabelPemilikHewan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class TabelPemilikHewanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        

        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        $simpan =  $request->validate([
            'id_pemiliki_hewan'         => '',
            'name'       => 'required',
            "username"   => "required",
            "password"   => "required",
            "alamat"     => "required",
            "phone"      => ['required'],
            "hak_akses"  => ['required']
        ]);
 
         $simpan['password'] = Hash::make($simpan['password']);
        //$simpan['password'] = bcrypt($simpan);
        //dd($simpan);
       //  dd("Registrasi berhasil");
     TabelPemilikHewan::create($simpan);
 
     $request->session()->flash('status', ',Please login using mobile phone');
 
     return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\TabelPemilikHewan  $tabelPemilikHewan
     * @return \Illuminate\Http\Response
     */
    public function show(TabelPemilikHewan $tabelPemilikHewan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TabelPemilikHewan  $tabelPemilikHewan
     * @return \Illuminate\Http\Response
     */
    public function edit(TabelPemilikHewan $tabelPemilikHewan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TabelPemilikHewan  $tabelPemilikHewan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TabelPemilikHewan $tabelPemilikHewan)
    {
        //
    }

  

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TabelPemilikHewan  $tabelPemilikHewan
     * @return \Illuminate\Http\Response
     */
    public function destroy(TabelPemilikHewan $tabelPemilikHewan)
    {
        //
    }
}
