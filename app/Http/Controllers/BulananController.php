<?php

namespace App\Http\Controllers;

use App\bulanan;
use Illuminate\Http\Request;

class BulananController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['bulanans'] = bulanan::all();
        return view('bulanan.index')->with($data);
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
     * @param  \App\bulanan  $bulanan
     * @return \Illuminate\Http\Response
     */
    public function show(bulanan $bulanan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\bulanan  $bulanan
     * @return \Illuminate\Http\Response
     */
    public function edit(bulanan $bulanan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\bulanan  $bulanan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, bulanan $bulanan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\bulanan  $bulanan
     * @return \Illuminate\Http\Response
     */
    public function destroy(bulanan $bulanan)
    {
        //
    }
}
