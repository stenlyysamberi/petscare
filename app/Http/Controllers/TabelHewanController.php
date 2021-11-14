<?php

namespace App\Http\Controllers;

use App\TabelHewan;
use Illuminate\Http\Request;
use Throwable;

class TabelHewanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = TabelHewan::hewan()->get();
        return response()->json(
        
            $data
        
        );
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
            'id_pemilik_hewan' => 'required',
            'id_jenis_hewan'   => 'required',
            'nama_hewan'       => 'required',
            'tgl_lahir'        => 'required',
            'umur'       => 'required'
        ]);

        
    
        try{
            TabelHewan::create($simpan);
            return response()->json([
                'result' => 'berhasil'
            ]);
        }catch(Throwable $th){
            return response()->json([
                'result' => $th->getMessage()
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\TabelHewan  $tabelHewan
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $user = TabelHewan::where('id_hewan', $request->id)->first();
       
        return response()->json(
        
            $user
        
        );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TabelHewan  $tabelHewan
     * @return \Illuminate\Http\Response
     */
    public function edit(TabelHewan $tabelHewan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TabelHewan  $tabelHewan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TabelHewan $tabelHewan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TabelHewan  $tabelHewan
     * @return \Illuminate\Http\Response
     */
    public function destroy(TabelHewan $tabelHewan)
    {
        //
    }
}
