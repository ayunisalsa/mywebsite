<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Produk;

class VerifProduk extends Component
{
    public function verif($id)
    {
        $produk = Produk::find($id);
        $produk->verified = true;
        $produk->save();
    }

    public function delete($id)
    {
        $produk = Produk::find($id);
        $produk->delete();
    }

    public function render()
    {
        $produk = Produk::with('wilayah')->where('verified', false)->get();
        return view('livewire.verif-produk', compact('produk'));
    }
}
