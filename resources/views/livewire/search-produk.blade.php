<div>
    <nav class="navbar bg-light">
        <div class="container-fluid">
            <a class="navbar-brand">Galery Oleh-Oleh Khas Daerah</a>
            <div class="d-flex" role="search">
                <input wire:model="search" class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <a class="btn btn-primary" href="{{ route('create') }}" role="button">Tambah</a>
            </div>
        </div>
    </nav>

    <section class="section mt-3">
        <div class="container">
            <div class="row">
                @foreach ($produks as $item)
                    <div class="col-2">
                        <div class="card mt-3">
                            @if (Str::startsWith($item->gambar, 'http'))
                                <img src="{{ $item->gambar }}" loading="lazy" class="card-img-top"
                                    style="max-height: 128px;">
                            @elseif (Str::length($item->gambar) > 40)
                                <img src="{{ asset('storage/gambar') }}/{{ $item->gambar }}" loading="lazy"
                                    class="card-img-top" style="max-height: 128px;">
                            @else
                                <img src="{{ asset('gambar') }}/{{ $item->gambar }}" loading="lazy" class="card-img-top"
                                    style="max-height: 128px;">
                            @endif
                            <div class="card-body">
                                <h5 class="card-title">{{ $item->nama }}</h5>
                                <p class="card-text">{{ $item->wilayah->nama }}</p>
                                <a href="#" class="btn btn-primary">Detail</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
</div>
