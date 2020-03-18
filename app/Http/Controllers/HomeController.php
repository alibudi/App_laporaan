<?php

namespace App\Http\Controllers;
use App\Anggaran;
use App\Pemesanan;
use App\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data['po_count'] = Pemesanan::count();
        $data['anggaran_count'] = Anggaran::count();
        $data['user_count'] = User::count();
        return view('admin.index')->with($data);
    }
}
