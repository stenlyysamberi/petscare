<?php

namespace App\Http\Controllers;

use App\TabelJenisHewan;
use Illuminate\Http\Request;

class TabelJenisHewanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       //return TabelJenisHewan::all();
        return view('jenis',[
            'title' => 'Jenis Hewan',
            'menu1' => 'Content',
            'menu2' => 'Jenis Hewan',
            'menu3' => 'Created',
            'hewan' => TabelJenisHewan::all()
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
    public function store(Request $request)
    {
       //return $request->file('image')->store('image-file');
       $simpan =  $request->validate([
        
        'nama_hewan' => 'required',
        'category'   =>'required'
    ]);

   
    // return(dd($simpan));
    TabelJenisHewan::create($simpan);

 $request->session()->flash('jenis', 'Hewan Created successfully!');

 return redirect('/hewan_p');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\TabelJenisHewan  $tabelJenisHewan
     * @return \Illuminate\Http\Response
     */
    public function show(TabelJenisHewan $tabelJenisHewan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TabelJenisHewan  $tabelJenisHewan
     * @return \Illuminate\Http\Response
     */
    public function edit(TabelJenisHewan $tabelJenisHewan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TabelJenisHewan  $tabelJenisHewan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id){

        

        $request->validate([
            'nama_hewan'  => 'required'
        ]);

        TabelJenisHewan::find($id)->update($request->all());
        

        $request->session()->flash('jenis', 'update has been created!');
        return redirect('/hewan_p');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TabelJenisHewan  $tabelJenisHewan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       //return(dd($tabelPenyakit));
       TabelJenisHewan::find($id)->delete();
       
       return redirect('/hewan_p')->with('jenis','delete has been successfully!');
    }
}
