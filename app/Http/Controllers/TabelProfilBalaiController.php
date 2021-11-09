<?php

namespace App\Http\Controllers;

use App\TabelProfilBalai;
use Illuminate\Http\Request;

class TabelProfilBalaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    
    {

       //return TabelProfilBalai:: all();

        return view('profil',[
            'title'  => 'Profil Balai',
            'menu1' => 'Content',
            'menu2' => 'Profil Balai',
            'menu3' => 'Updated',
            
            'profil' => TabelProfilBalai::all()
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
        $simpan =  $request->validate([
            'judul'       => 'required',
            'isi'         => 'required',
            'img_p'       => 'image|file|max:1024'
        ]);

        if($request->file('img_p')){
            $simpan['img_p'] = $request->file('img_p')->store('image-file');
        }

        TabelProfilBalai::create($simpan);
        $request->session()->flash('profil', 'News Created successfully!');
        return redirect('/profil_b');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\TabelProfilBalai  $tabelProfilBalai
     * @return \Illuminate\Http\Response
     */
    public function show(TabelProfilBalai $tabelProfilBalai)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TabelProfilBalai  $tabelProfilBalai
     * @return \Illuminate\Http\Response
     */
    public function edit(TabelProfilBalai $tabelProfilBalai)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TabelProfilBalai  $tabelProfilBalai
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
       
        $simpan= $request->validate([
            'image'       => 'image|file|max:1024',
            'isi'         => 'required',
            'judul'       => 'required'
           
        ]);

       // return (dd($request));

        if($request->file('image')){
            $request['image'] = $request->file('image')->store('image-file');
        }

       TabelProfilBalai::find($id)->update($request->all());

        $request->session()->flash('profil', 'news update has been successfuly!');
        return redirect('/profil_b');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TabelProfilBalai  $tabelProfilBalai
     * @return \Illuminate\Http\Response
     */
    public function destroy(TabelProfilBalai $tabelProfilBalai, $id)
    {
        
        TabelProfilBalai::find($id)->delete();
        return redirect('/profil_b')->with('profil','news has been deleted!');
        
    }
}
