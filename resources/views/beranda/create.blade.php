@extends('layouts.app')

@section('content')
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container px-5">
            <a class="navbar-brand" href="#!">Galery Oleh-Oleh Khas Daerah</a>
        </div>
    </nav>

    <div class="container my-5">
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

                        <form action="{{ route('store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label">Nama Produk</label>
                                <input name="nama" type="text" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Deskripsi Produk</label>
                                <textarea name="deskripsi" class="form-control"></textarea>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Asal Produk</label>
                                <select name="wilayah_id" class="form-select">
                                    <option selected disabled>-</option>
                                    @foreach ($wilayah as $item)
                                        <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                    @endforeach
                                    <option value="lainnya">Lainnya</option>
                                </select>
                            </div>
                            <div class="mb-3 d-none" id="divasal">
                                <label class="form-label">Input Asal Produk</label>
                                <input name="wilayahinput" id="inputasal" type="text" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Upload Gambar Produk</label>
                                <input id="gambar" name="gambar" class="form-control" type="file">
                                <img id="preview-gambar" class="img-fluid rounded mt-1">
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"
        integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            $('select').change(function() {
                if ($(this).val() == 'lainnya') {
                    $('#divasal').removeClass('d-none');
                    // add required
                    $('#inputasal').prop('required', true);
                } else {
                    $('#divasal').addClass('d-none');
                }
            });
            $('#gambar').change(function() {
                let reader = new FileReader();
                reader.onload = (e) => {
                    $('#preview-gambar').attr('src', e.target.result);
                }
                reader.readAsDataURL(this.files[0]);
            });
        });
    </script>
@endsection
