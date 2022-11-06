<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;

    protected $fillable = [
        'wilayah_id',
        'nama',
        'slug',
        'gambar',
        'harga',
        'deskripsi',
    ];

    public function wilayah()
    {
        return $this->belongsTo(Wilayah::class);
    }
}
