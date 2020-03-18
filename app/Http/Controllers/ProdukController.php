<?php

namespace App\Http\Controllers;

use App\produk;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
class ProdukController extends Controller
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
        $data['produks'] = produk::all();
        return view('produk.index')->with($data);
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
    //    $data['produks'] = produk::all();
    //     $data1 = [
    //             'nama'=>$request->nama,
    //             'harga'=>$request->harga,
    //             'jumlah'=>$request->jumlah
    //     ];
    //     $produk = produk::where('nama',$request->nama)->get();
    //     $dataProduk = [
    //         'nama'=>$request->nama,
    //         'harga'=>$request->harga,
    //         'jumlah'=>$produk[0]['jumlah']+$request->jumlah
    //     ];
    //     if(strlen($produk)>1)
    //     {
            
    //         produk::find($produk[0]['id'])->update($dataProduk);
    //         return view('produk.index')->with($data);
    //     }
    //     else{
    //     $save= produk::create($data1);
    //     if($save)
    //     {
    //         return view('produk.index')->with($data);
    //     }
    // }
    $request->validate([
        'nama'        => 'required',
        'harga'           => 'required',
        'jumlah'           => 'required',
    ]);

    $data = [
        'nama'         => $request->nama,
        'harga'            => $request->harga,
        'jumlah'            => $request->jumlah,
    ];

    $produks = produk::create($data);
    if ($produks) {
        Alert::success('Tambah Berhasil', 'Sukses Tambah Data');
        // return redirect()->back();
        return redirect()->route('produk.index');
    }

    Alert::error('Tambah Gagal', 'Sukses Tambah Data');
    return redirect()->route('produk.create');
    // return $produk;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function show(produk $produk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function edit(produk $produk)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, produk $produk)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $produks = produk::findOrFail($id);
        if ($produks->delete()) {
            Alert::success('Hapus Sukses', 'Sukses Hapus Data');
            return redirect()->route('produk.index');
        }

        Alert::success('Gagal Hapus', 'Gagal Hapus Data');
        return redirect()->route('produk.index');
    
    }
}
