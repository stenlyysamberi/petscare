<?php

namespace App\Http\Controllers;

use App\TabelReportHewanSakit;
use Illuminate\Http\Request;

class TabelReportHewanSakitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('sakit',[
           
            'title' => 'Report Konsultasi',
            'news'  => TabelReportHewanSakit::all()
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
     * @param  \App\TabelReportHewanSakit  $tabelReportHewanSakit
     * @return \Illuminate\Http\Response
     */
    public function show(TabelReportHewanSakit $tabelReportHewanSakit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TabelReportHewanSakit  $tabelReportHewanSakit
     * @return \Illuminate\Http\Response
     */
    public function edit(TabelReportHewanSakit $tabelReportHewanSakit)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TabelReportHewanSakit  $tabelReportHewanSakit
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TabelReportHewanSakit $tabelReportHewanSakit)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TabelReportHewanSakit  $tabelReportHewanSakit
     * @return \Illuminate\Http\Response
     */
    public function destroy(TabelReportHewanSakit $tabelReportHewanSakit)
    {
        //
    }
}
