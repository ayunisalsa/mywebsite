@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Edit Produk</h1>
@stop

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg" style="max-width: 1000px;">
                <div class="card mt-3">
                    <div class="card-body">

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{ route('updateProduk', $produk->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label">Nama Produk</label>
                                <input name="nama" value="{{ $produk->nama }}" type="text" class="form-control"
                                    required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Deskripsi Produk</label>
                                <textarea name="deskripsi" class="form-control">{{ $produk->deskripsi }}</textarea>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Asal Produk</label>
                                <select name="wilayah_id" class="form-select">
                                    <option selected disabled>-</option>
                                    @foreach ($wilayah as $item)
                                        <option value="{{ $item->id }}"
                                            {{ $produk->wilayah_id == $item->id ? 'selected' : '' }}>{{ $item->nama }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3 d-none" id="divasal">
                                <label class="form-label">Input Asal Produk</label>
                                <input name="wilayahinput" id="inputasal" type="text" class="form-control">
                            </div>
                            <div class="mb-3">
                                @if (Str::startsWith($produk->gambar, 'http'))
                                    <img src="{{ $produk->gambar }}" loading="lazy" class="img-fluid" style="max-height: 400px;">
                                @elseif (Str::length($produk->gambar) > 40)
                                    <img src="{{ asset('storage/gambar') }}/{{ $produk->gambar }}" loading="lazy"
                                        class="img-fluid" style="max-height: 400px;">
                                @else
                                    <img src="{{ asset('gambar') }}/{{ $produk->gambar }}" loading="lazy"
                                        class="img-fluid" style="max-height: 400px;">
                                @endif
                            </div>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>
        console.log('Hi!');
    </script>
@stop
