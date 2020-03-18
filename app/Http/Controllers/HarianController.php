<?php

namespace App\Http\Controllers;

use App\Harian;
use App\saldo;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
class HarianController extends Controller
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
        $data['saldo'] = saldo::all();
        $data['harians'] = Harian::all();
        return view('harian.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('harian.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $total = saldo::find(1);

        if($request->has('nota')){
            $uploadFile = $request->file('nota');
            $foto = $uploadFile->getClientORiginalName();
            $uploadFile->move(base_path('public/images'),$foto);
        }
        $data = [
            'nama'=>$request->nama,
            'nilai'=>$request->nilai,
            'keterangan'=>$request->keterangan,
            'tgl'=>$request->tgl,
            'nota'=>$foto ];
        $save = Harian::create($data);

        $datasaldo = [
            'saldo'=>$total['saldo']-$request->nilai
        ];

        if($save)
        {
            // saldo::create($datasaldo);
            saldo::find(1)->update($datasaldo);
            Alert::success('Tambah Berhasil', 'Sukses Tambah Data');
            return redirect()->route('harian.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\harian  $harian
     * @return \Illuminate\Http\Response
     */
    public function show(harian $harian)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\harian  $harian
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Harian::find($id);
        return view('harian.edit',compact('data','id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\harian  $harian
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $total = saldo::find(1);
        $saldoSekarang = $total['saldo'];
        $nilaidulu = Harian::find($id);
        $nilaidulu_ = $nilaidulu['nilai'];
        // $foto = $nilaidulu['nota'];
        if($request->has('nota')){
            $uploadFile = $request->file('nota');
            $foto = $uploadFile->getClientORiginalName();
            $uploadFile->move(base_path('public/images'),$foto);
        }
        else{
            $foto = $nilaidulu['nota'];
        }
        $data = [
            'nama'=>$request->nama,
            'nilai'=>$request->nilai,
            'keterangan'=>$request->keterangan,
            'tgl'=>$request->tgl,
            'nota'=>$foto ];
        $save = Harian::find($id)->update($data);

       
            if($nilaidulu_<$request->nilai){
            
                $datasaldo = [
                    'saldo'=>$saldoSekarang-$request->nilai
                ];
            }
            else if($nilaidulu>$request->nilai){
              
                    $datasaldo = [
                        'saldo'=>$saldoSekarang+$request->nilai
                    ];
            }
            else{
                $datasaldo = [
                    'saldo'=>$request->nilai
                ];
            }
       

        if($save)
        {
            // saldo::create($datasaldo);
            saldo::find(1)->update($datasaldo);
            // return redirect()->back()->withSuccess('sukses tambah data');
            Alert::success('Tambah Berhasil', 'Sukses Tambah Data');
            return redirect()->route('harian.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\harian  $harian
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $harians = Harian::findOrFail($id);
        if ($harians->delete()) {
            Alert::success('Hapus Sukses', 'Sukses Hapus Data');
            return redirect()->route('harian.index');
        }

        Alert::success('Gagal Hapus', 'Gagal Hapus Data');
        return redirect()->route('harian.index');
    }
}
