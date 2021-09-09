<?php

namespace App\Http\Controllers;

use App\Models\CompareFilePDF;
use Illuminate\Http\Request;

class CompareFilePDFController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('compare-pdf.index');
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
     * @param  \App\Models\CompareFilePDF  $compareFilePDF
     * @return \Illuminate\Http\Response
     */
    public function show(CompareFilePDF $compareFilePDF)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CompareFilePDF  $compareFilePDF
     * @return \Illuminate\Http\Response
     */
    public function edit(CompareFilePDF $compareFilePDF)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CompareFilePDF  $compareFilePDF
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CompareFilePDF $compareFilePDF)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CompareFilePDF  $compareFilePDF
     * @return \Illuminate\Http\Response
     */
    public function destroy(CompareFilePDF $compareFilePDF)
    {
        //
    }
}
