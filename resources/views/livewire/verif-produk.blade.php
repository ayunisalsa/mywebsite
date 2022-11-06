<div>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Gambar</th>
                    <th scope="col">Asal</th>
                    <th scope="col">Deskripsi</th>
                    {{-- <th scope="col">Harga</th> --}}
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($produk as $item)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $item->nama }}</td>
                        <td>
                            @if (Str::startsWith($item->gambar, 'http'))
                                <img src="{{ $item->gambar }}" loading="lazy" class="card-img-top rounded"
                                    style="max-height: 128px;">
                            @elseif (Str::length($item->gambar) > 40)
                                <img src="{{ asset('storage/gambar') }}/{{ $item->gambar }}" loading="lazy"
                                    class="card-img-top rounded" style="max-height: 128px;">
                            @else
                                <img src="{{ asset('gambar') }}/{{ $item->gambar }}" loading="lazy"
                                    class="card-img-top rounded" style="max-height: 128px;">
                            @endif
                        </td>
                        <td>{{ $item->wilayah->nama }}</td>
                        <td>{{ $item->deskripsi }}</td>
                        {{-- <td>{{ $item->harga }}</td> --}}
                        <td>
                            <button class="btn btn-primary" wire:click="verif({{ $item->id }})">
                                Verifikasi
                            </button>
                            <button class="btn btn-danger" wire:click="delete({{ $item->id }})">
                                Hapus
                            </button>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center">Tidak ada request</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
