@extends('template.admin')

@section('title', 'Tambah Tempat Wisata')

@section('content')
    <div class="container">
        <div class="row d-flex justify-content-center my-3">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Tambah Tempat Wisata</h5>
                        <form action="{{ route('admin.tempatWisata.store') }}" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="mb-3">
                                <label for="name">Nama</label>
                                <input type="text" name="name" id="name" class="form-control"
                                    placeholder="Nama Tempat Wisata" required>
                            </div>
                            <div class="mb-3">
                                <label for="description">Deskripsi</label>
                                <textarea name="description" id="description" class="form-control" placeholder="Deskripsi Tempat Wisata"
                                    required></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="address">Alamat</label>
                                <input type="text" name="address" id="address" class="form-control"
                                    placeholder="Alamat Tempat Wisata" required>
                            </div>
                            <div class="mb-3">
                                <label for="categories">Kategori</label>
                                <select name="categories" id="address" class="form-select" aria-label="Default Select"
                                    required>
                                    <option disabled selected value>Pilih Kategori</option>
                                    @foreach ($kategoris as $k)
                                        <option value="{{ $k->name }}">{{ $k->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="images">Foto</label>
                                <input type="file" name="images" id="images" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-success">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
