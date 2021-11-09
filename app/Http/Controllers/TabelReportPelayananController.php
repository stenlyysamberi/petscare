<?php

namespace App\Http\Controllers;

use App\TabelReportPelayanan;
use Illuminate\Http\Request;

class TabelReportPelayananController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
        return view('report',[
           
            'title' => 'Report Pelayanan',
            'news'  => TabelReportPelayanan::all()
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\TabelReportPelayanan  $tabelReportPelayanan
     * @return \Illuminate\Http\Response
     */
    public function show(TabelReportPelayanan $tabelReportPelayanan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TabelReportPelayanan  $tabelReportPelayanan
     * @return \Illuminate\Http\Response
     */
    public function edit(TabelReportPelayanan $tabelReportPelayanan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TabelReportPelayanan  $tabelReportPelayanan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TabelReportPelayanan $tabelReportPelayanan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TabelReportPelayanan  $tabelReportPelayanan
     * @return \Illuminate\Http\Response
     */
    public function destroy(TabelReportPelayanan $tabelReportPelayanan)
    {
        //
    }
}
