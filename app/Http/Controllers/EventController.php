<?php

namespace App\Http\Controllers;

use App\event;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\File;
class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['events'] = event::all();
        return view('event.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('event.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama'              => 'required',
            'tgl'               => 'required',
            'nilai'             => 'required',
            'keterangan'        => 'required',
            'nota'              => 'required|image',
        ]);

        $uploadedFile = $request->file('nota');
        $imgName = time() . str_random(22) . '.' . $uploadedFile->getClientOriginalExtension();
        $uploadedFile->move(public_path('img/event'), $imgName);

        $data = [
            'nama'              => $request->nama,
            'tgl'             => $request->tgl,
            'nilai'           => $request->nilai,
            'keterangan'          => $request->keterangan,
            'nota'              => $imgName,
        ];

        $events = event::create($data);
        if ($events) {
            Alert::success('Tambah Berhasil', 'Sukses Tambah Data');
            return redirect()->route('event.index');
        }

        Alert::error('Tambah Gagal', 'Sukses Tambah Data');
        return redirect()->route('tani.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\event  $event
     * @return \Illuminate\Http\Response
     */
    public function show(event $event)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\event  $event
     * @return \Illuminate\Http\Response
     */
    public function edit(event $event)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\event  $event
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, event $event)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
