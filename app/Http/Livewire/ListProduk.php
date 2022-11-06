<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Produk;
use App\Models\Wilayah;

class ListProduk extends Component
{
    public function delete($id)
    {
        $produk = Produk::find($id);
        $produk->delete();
    }

    public function render()
    {
        $produk = Produk::with('wilayah')->where('verified', true)->get();
        $wilayah = Wilayah::all();
        return view('livewire.list-produk', compact('produk', 'wilayah'));
    }
}
