<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;
use App\Models\Wilayah;
use Illuminate\Support\Str;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $produk = Produk::all();
        return view('beranda.index', compact('produk'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $wilayah = Wilayah::all();
        return view('beranda.create', compact('wilayah'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->wilayahinput) {
            // check if wilayah is already exist
            $wilayah = Wilayah::where('nama', $request->wilayahinput)->first();
            if ($wilayah) {
                $request->wilayah_id = $wilayah->id;
            } else {
                $wilayah = new Wilayah;
                $wilayah->nama = Str::title($request->wilayahinput);
                $wilayah->save();
                $request->wilayah_id = $wilayah->id;
            }
        }

        $request->validate([
            'nama' => 'required',
            'deskripsi' => 'required',
            // 'harga' => 'required',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:4048',
            'wilayah_id' => 'required',
        ]);

        $file = $request->file('gambar');
        $name = $file->hashName();
        $file->storeAs('public/gambar', $name);

        $produk = Produk::create([
            'nama' => $request->nama,
            'slug' => Str::slug($request->nama),
            'deskripsi' => $request->deskripsi,
            // 'harga' => $request->harga,
            'gambar' => $name,
            'wilayah_id' => $request->wilayah_id,
        ]);

        return redirect()->route('index')->with('success', 'Produk berhasil disubmit');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function show(Produk $produk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function edit(Produk $produk)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Produk $produk)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function destroy(Produk $produk)
    {
        //
    }
}
