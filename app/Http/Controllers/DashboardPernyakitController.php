<?php

namespace App\Http\Controllers;

use App\TabelPenyakit;
use Illuminate\Http\Request;

class DashboardPernyakitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    //   $data = TabelPenyakit::all();
    //   return response()->json($data);

       return view('penyakit',[
           
            'title' => 'Penyakit',
            'menu1' => 'Content',
            'menu2' => 'Penyakit & Pengobatan',
            'menu3' => 'Created',
            'news'  => TabelPenyakit::all()
       ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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
            'title'       => 'required',
            'jenis'       => 'required',
            'isi'         => 'required',
            'image'       => 'image|file|max:1024'
        ]);

        //return dd($simpan);

        if($request->file('image')){
            $simpan['image'] = $request->file('image')->store('image-file');
        }
 
         //$simpan['password'] = Hash::make($simpan['password']);
        //$simpan['password'] = bcrypt($simpan);
        //dd($simpan);
        //dd($simpan);
     TabelPenyakit::create($simpan);
 
     $request->session()->flash('news', 'News Created successfully!');
 
     return redirect('/Gejala_p');
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
    public function update(Request $request, $id)
    {
        

         $request->validate([
            'title'       => 'required',
            'jenis'       => 'required',
            'isi'         => 'required',
            'image'       => 'image|file|max:1024'
        ]);

       //return (dd($simpan));

        if($request->file('image')){
            $simpan['image'] = $request->file('image')->store('image-file');
        }

        // TabelPenyakit::where('id', $tabelPenyakit->id)
        //             ->update($simpan);

       TabelPenyakit::find($id)->update($request->all());
    
        $request->session()->flash('news', 'news update has been successfuly!');
        return redirect('/Gejala_p');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TabelPenyakit  $tabelPenyakit
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

       
        //return(dd($tabelPenyakit));
        TabelPenyakit::find($id)->delete();
        // TabelPenyakit::destroy($tabelPenyakit->id);

 
        // $tabelPenyakit->session()->flash('news', 'news has been deleted!');

        return redirect('/Gejala_p')->with('news','news has been deleted!');
    }
}
