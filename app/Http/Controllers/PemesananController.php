<?php

namespace App\Http\Controllers;
use Session;
use App\produk;
use App\pemesanan;
use Illuminate\Http\Request;

class PemesananController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      
        $data['pemesanans'] = pemesanan::all();
        // $data= pemesanan::groupBy('nomor')->get();
        return view('pemesanan.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        $nota = time(). str_random(10);   
        if(Session::has('nota')){
            $nomor1 = Session::get('nota');
            $nomor = $nomor1[0];
            $data2 = pemesanan::where('nomor',$nomor)->get();
        }
        else{
            $nomor = $nota;
            $data2 = pemesanan::where('nomor',$nomor)->get();
        }

        $produks = produk::all();
    
        $alamat = 'jakarta';
        $kepada = 'orang';
        $data = [$nota,$alamat,$kepada];
        return view('pemesanan.create', compact('data','produks','data2'));
        // Session::forget('nota');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
     
        $produks = produk::all();
      if(Session::has('nota')){
          $nomor1 = Session::get('nota');
          $nomor = $nomor1[0];
      }
      else{
          $nomor = $request->nomor;
          Session::push('nota',$nomor);
      }
      $alamat = 'jakarta';
      $kepada = 'orang';
      $data = [$nomor,$alamat,$kepada];
     

        $data3 = [
            'nomor'=>$nomor,
            'alamat'=>$request->alamat,
            'produk'=>$request->nama,
            'jumlah'=>$request->jumlah,
            'harga'=>$request->harga
        ];

            $save = pemesanan::create($data3);

            $data2 = pemesanan::where('nomor',$nomor)->get();
            if($save){
                return view('pemesanan.create',compact('data2','data','produks'));
            }
    // return $request;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\pemesanan  $pemesanan
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        pemesanan::destroy($id);
        return redirect()->back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\pemesanan  $pemesanan
     * @return \Illuminate\Http\Response
     */
    public function edit(pemesanan $pemesanan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\pemesanan  $pemesanan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, pemesanan $pemesanan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\pemesanan  $pemesanan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       
        
    }
}
