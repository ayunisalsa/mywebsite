<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Produk;

class SearchProduk extends Component
{
    public $search = '';
    public $numResults = 18;

    protected $listeners = [
        'load-more' => 'loadMore'
    ];

    public function loadMore()
    {
        $this->numResults += 6;
    }

    public function render()
    {
        // get all data from table produk
        $produks = Produk::with('wilayah')->where('verified', true)->take($this->numResults)->get();

        // search nama or wilayah
        if ($this->search != '') {
            $produks = Produk::where('nama', 'like', '%' . $this->search . '%')
                ->orWhereHas('wilayah', function ($query) {
                    $query->where('nama', 'like', '%' . $this->search . '%');
                })
                ->where('verified', true)
                ->get();
        }

        $this->dispatchBrowserEvent('loading-complete');
        return view('livewire.search-produk', [
            'produks' => $produks,
        ]);
    }
}
