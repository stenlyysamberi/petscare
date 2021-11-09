<?php

namespace App\Http\Controllers;


use App\TabelListGejala;
use App\TabelJenisHewan;
use Illuminate\Http\Request;

class TabelListGejalaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    
    {

        // dd(TabelListGejala::class);
        return view('listgejala',[
           
            'title' => 'Gejalah',
            'gejala'  => TabelListGejala::jenis_hewan()->get(),
            'jenis_hewan' => TabelJenisHewan::all()
            
       ]);
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
    public function store(Request $hasil)
    {
        
        $simpan =  $hasil->validate([
            'nama_gejala'                => 'required',
            'tabel_jenis_hewan_id'       => 'required'
            
        ]);

        

        TabelListGejala::create($simpan);
        $hasil->session()->flash('news', 'Created successfully!');
        return redirect('/list_gejala');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\TabelListGejala  $tabelListGejala
     * @return \Illuminate\Http\Response
     */
    public function show(TabelListGejala $tabelListGejala)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TabelListGejala  $tabelListGejala
     * @return \Illuminate\Http\Response
     */
    public function edit(TabelListGejala $tabelListGejala)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TabelListGejala  $tabelListGejala
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_gejala'       => 'required',
            'tabel_jenis_hewan_id'       => 'required'
            
        ]);

       
       TabelListGejala::find($id)->update($request->all());
    
        $request->session()->flash('jenis', 'news update has been successfuly!');
        return redirect('/list_gejala');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TabelListGejala  $tabelListGejala
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        TabelListGejala::find($id)->delete();
        return redirect('/list_gejala')->with('jenis','news has been deleted!');
    }
}
