<div>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container px-5">
            <a class="navbar-brand" href="#!">Galeri Oleh-Oleh Indonesia</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span
                    class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <div class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <div class="d-flex" role="search">
                        <input wire:model="search" class="form-control me-2" type="search" placeholder="Cari"
                            aria-label="Search">
                        <a class="btn btn-primary" href="{{ route('create') }}" role="button">Tambah</a>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <!-- Page Content-->
    <div class="container px-4 px-lg-5">
        <!-- Heading Row-->
        <div class="row gx-4 gx-lg-5 align-items-center my-5">
            <div class="col-lg-7"><img class="img-fluid rounded mb-4 mb-lg-0"
                    src="{{ asset('gambar') }}/Tempat-Wisata.jpg" /></div>
            <div class="col-lg-5">
                <h1 class="font-weight-light">Website Informasi</h1>
                <p>Website ini berisikan informasi seputar oleh-oleh khas dari suatu daerah yang ada di Indonesia,
                    didalamnya memuat gambar dan keterangannya. Dilengkapi juga dengan deskripsi dari gambar tersebut.
                    </p>
                {{-- <a class="btn btn-primary" href="#!">Call to Action!</a> --}}
            </div>
        </div>
        <!-- Call to Action-->
        <div class="card text-white bg-secondary my-5 py-4 text-center">
            <div class="card-body">
                <p class="text-white m-0">Untuk memudahkan pengunjung website, kami menyediakan fitur pencarian dengan memasukkan nama atau asal daerah, dan pengunjung website dapat menambahkan informasi seputar makanan khas dari daerah lainnya, dengan menekan tombol Tambah dipojok kanan atas.</p>
            </div>
        </div>
        <!-- Content Row-->
        <div class="row gx-4 gx-lg-5">
            @foreach ($produks as $item)
                <div class="col-md-4 mb-5">
                    <div class="card h-100">

                        @if (Str::startsWith($item->gambar, 'http'))
                            <img class="card-img-top" src="{{ $item->gambar }}" loading="lazy"
                                style="max-height: 250px;">
                        @elseif (Str::length($item->gambar) > 40)
                            <img class="card-img-top" src="{{ asset('storage/gambar') }}/{{ $item->gambar }}"
                                loading="lazy" style="max-height: 250px;">
                        @else
                            <img class="card-img-top" src="{{ asset('gambar') }}/{{ $item->gambar }}" loading="lazy"
                                style="max-height: 250px;">
                        @endif
                        <div class="card-body">
                            <h5 class="card-title">{{ $item->nama }}</h5>
                            <p class="card-text">{{ $item->wilayah->nama }}</p>
                        </div>

                        <div class="card-footer">
                            <!-- Button to Open the Modal -->
                            <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                data-bs-target="#myModal{{ $item->id }}">
                                Detail
                            </button>
                        </div>
                    </div>
                </div>

                <!-- The Modal -->
                <div class="modal fade" id="myModal{{ $item->id }}">
                    <div class="modal-dialog">
                        <div class="modal-content">

                            <!-- Modal Header -->
                            <div class="modal-header">
                                <h4 class="modal-title">{{ $item->nama }}</h4>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>

                            <!-- Modal body -->
                            <div class="modal-body">
                                Asal : {{ $item->wilayah->nama }} <br>
                                Deskripsi : <br> {{ $item->deskripsi }} <br>
                            </div>

                            <!-- Modal footer -->
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                            </div>

                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
