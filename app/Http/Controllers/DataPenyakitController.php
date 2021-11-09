<?php

namespace App\Http\Controllers;

use App\DataPenyakit;
use App\TabelJenisHewan;
use Illuminate\Http\Request;

class DataPenyakitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('datapenyakit',[
            'title' => 'Data Penyakit',
            'menu1' => 'Contents',
            'menu2' => 'Data Penyakit',
            'menu3' => 'Created',
            'menu4' => 'Data Penyakit',
            'hewan' => DataPenyakit::sakit()->get(),
            'jenis' => TabelJenisHewan::all()
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
            'nama_penyakit'   => 'required',
            'id_jenis_hewan'  => 'required'
            
        ]);

        
        //return dd($simpan);
        DataPenyakit::create($simpan);
        $hasil->session()->flash('news', 'Created successfully!');
        return redirect('/penyakit_b');
 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\DataPenyakit  $dataPenyakit
     * @return \Illuminate\Http\Response
     */
    public function show(DataPenyakit $dataPenyakit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\DataPenyakit  $dataPenyakit
     * @return \Illuminate\Http\Response
     */
    public function edit(DataPenyakit $dataPenyakit)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\DataPenyakit  $dataPenyakit
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_penyakit'       => 'required',
            'id_jenis_hewan'       => 'required'
            
        ]);

       
       DataPenyakit::find($id)->update($request->all());
    
        $request->session()->flash('jenis', 'news update has been successfuly!');
        return redirect('/penyakit_b');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\DataPenyakit  $dataPenyakit
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //return(dd($tabelPenyakit));
        DataPenyakit::find($id)->delete();
        // TabelPenyakit::destroy($tabelPenyakit->id);

 
        // $tabelPenyakit->session()->flash('news', 'news has been deleted!');

        return redirect('/penyakit_b')->with('jenis','news has been deleted!');
    }
}
