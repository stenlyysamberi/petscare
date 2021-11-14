<?php

namespace App\Http\Controllers;

use App\DataPenyakit;
use App\TabelBasisAturan;
use App\TabelGejala;
use App\TabelJenisHewan;
use App\TabelListGejala;
use App\TabelPenyakit;
use Illuminate\Http\Request;

class TabelBasisAturanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //return TabelBasisAturan::basis_aturan()->get();
        return view('basis_aturan',[
            'title' => 'Basis Aturan',
            'menu1' => 'Content',
            'menu2' => 'Basis Aturan',
            'menu3' => 'Created',
            'gejala' => TabelListGejala::all(),
            'penyakit' => DataPenyakit::all(),
            'hewan'  => TabelJenisHewan::all(),
            'basis_a'  => TabelBasisAturan::basis_aturan()->get()
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
        
            'id_gejala'     => 'required',
            'id_penyakit'   => 'required',
            'bobot'         => 'required',
            'id_hewan'      => 'required'
        ]);

        

        TabelBasisAturan::create($simpan);
 
     $request->session()->flash('jenis', 'News Created successfully!');
 
     return redirect('/basis_a');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\TabelBasisAturan  $tabelBasisAturan
     * @return \Illuminate\Http\Response
     */
    public function show(TabelBasisAturan $tabelBasisAturan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TabelBasisAturan  $tabelBasisAturan
     * @return \Illuminate\Http\Response
     */
    public function edit(TabelBasisAturan $tabelBasisAturan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TabelBasisAturan  $tabelBasisAturan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TabelBasisAturan $tabelBasisAturan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TabelBasisAturan  $tabelBasisAturan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_basis_atauran)
    {
       
       TabelBasisAturan::find($id_basis_atauran)->delete();
       return redirect('/basis_a')->with('jenis','news has been deleted!');
    }
}
