<?php

namespace App\Http\Controllers;

use App\TabelPenyakit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class TabelPenyakitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return 'ini halaman dashboard';     
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        // $simpan =  $request->validate([
        //     'title'         => 'required',
        //     'jenis'       => 'required',
        //     "isi"  => ['required']
        // ]);
 
         //$simpan['password'] = Hash::make($simpan['password']);
        //$simpan['password'] = bcrypt($simpan);
        //dd($simpan);
        //dd($simpan);
    //  TabelPenyakit::create($simpan);
 
    //  $request->session()->flash('news', 'News Created successfully!');
 
    //  return redirect('/Gejala_p');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\TabelPenyakit  $tabelPenyakit
     * @return \Illuminate\Http\Response
     */
    public function show(TabelPenyakit $tabelPenyakit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TabelPenyakit  $tabelPenyakit
     * @return \Illuminate\Http\Response
     */
    public function edit(TabelPenyakit $tabelPenyakit)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TabelPenyakit  $tabelPenyakit
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TabelPenyakit $tabelPenyakit)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TabelPenyakit  $tabelPenyakit
     * @return \Illuminate\Http\Response
     */
    public function destroy(TabelPenyakit $tabelPenyakit)
    {
        //
    }
}
