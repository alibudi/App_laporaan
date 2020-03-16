<?php

namespace App\Http\Controllers;

use App\anggaran;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
class AnggaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['anggarans'] = anggaran::all();
        return view('pengajuan.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pengajuan.create');
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
            'keterangan'        => 'required',
            'nominal'           => 'required',
        ]);

        $data = [
            'keterangan'         => $request->keterangan,
            'nominal'            => $request->nominal,
        ];

        $anggarans = anggaran::create($data);
        if ($anggarans) {
            Alert::success('Tambah Berhasil', 'Sukses Tambah Data');
            // return redirect()->back();
            return redirect()->route('anggaran.index');
        }

        Alert::error('Tambah Gagal', 'Sukses Tambah Data');
        return redirect()->route('anggaran.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\anggaran  $anggaran
     * @return \Illuminate\Http\Response
     */
    public function show(anggaran $anggaran)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\anggaran  $anggaran
     * @return \Illuminate\Http\Response
     */
    public function edit(anggaran $anggaran)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\anggaran  $anggaran
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, anggaran $anggaran)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\anggaran  $anggaran
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $anggarans = anggaran::findOrFail($id);
        if ($anggarans->delete()) {
            Alert::success('Hapus Sukses', 'Sukses Hapus Data');
            return redirect()->route('anggaran.index');
        }

        Alert::success('Gagal Hapus', 'Gagal Hapus Data');
        return redirect()->route('anggaran.index');
    }
}
