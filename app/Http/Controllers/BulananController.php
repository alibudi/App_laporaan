<?php

namespace App\Http\Controllers;
use App\saldo2;
use App\bulanan;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
class BulananController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $data['saldo'] = saldo2::all();
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
        return view('bulanan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $total = saldo2::find(1);

        if($request->has('nota')){
            $uploadFile = $request->file('nota');
            $foto = $uploadFile->getClientORiginalName();
            $uploadFile->move(base_path('public/images/bulanan'),$foto);
        }
        $data = [
            'nama'=>$request->nama,
            'nilai'=>$request->nilai,
            'keterangan'=>$request->keterangan,
            'tgl'=>$request->tgl,
            'nota'=>$foto ];
        $save = harian::create($data);

        $datasaldo = [
            'saldo'=>$total['saldo']-$request->nilai
        ];

        if($save)
        {
            // saldo::create($datasaldo);
            saldo2::find(1)->update($datasaldo);
            Alert::success('Tambah Berhasil', 'Sukses Tambah Data');
            return redirect()->route('bulanan.index');
        }
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
    public function destroy($id)
    {
        $bulanans = bulanan::findOrFail($id);
        if ($bulanans->delete()) {
            Alert::success('Hapus Sukses', 'Sukses Hapus Data');
            return redirect()->route('bulanan.index');
        }

        Alert::success('Gagal Hapus', 'Gagal Hapus Data');
        return redirect()->route('bulanan.index');
    }
}
