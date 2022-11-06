<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;
use App\Models\Wilayah;

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
        return view('admin.home');
    }

    public function request()
    {
        // livewire
        return view('admin.request');
    }

    public function produk()
    {
        //livewire
        return view('admin.produk');
    }

    public function editProduk($id)
    {
        $produk = Produk::find($id);
        $wilayah = Wilayah::all();
        return view('admin.editProduk', compact('produk', 'wilayah'));
    }

    public function updateProduk(Request $request, $id)
    {
        $produk = Produk::find($id);
        $produk->nama = $request->nama;
        $produk->harga = $request->harga;
        $produk->deskripsi = $request->deskripsi;
        $produk->wilayah_id = $request->wilayah_id;
        $produk->save();
        return redirect()->route('produk');
    }
}
