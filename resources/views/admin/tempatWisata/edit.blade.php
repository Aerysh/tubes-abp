@extends('template.admin')

@section('title', 'Edit Tempat Wisata')

@section('content')
    <div class="container">
        <div class="row my-3 d-flex justify-content-center">
            <div class="col-md-8">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="list-unstyled">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Edit Tempat Wisata</h5>
                        <form action="{{ route('admin.tempatWisata.update', $tempatWisata->id) }}" method="POST" enctype="multipart/form-data">
                            @method('PUT')
                            {{ csrf_field() }}
                            <div class="mb-3">
                                <label for="name">Nama</label>
                                <input type="text" name="name" id="name" class="form-control"
                                    value="{{ $tempatWisata->name }}" placeholder="Nama Tempat Wisata" required>
                            </div>
                            <div class="mb-3">
                                <label for="description">Deskripsi</label>
                                <textarea name="description" id="description" class="form-control"
                                    placeholder="Deskripsi Tempat Wisata">{{ $tempatWisata->description }}</textarea>
                            </div>
                            <div class="mb-3">
                                <label for="address">Alamat</label>
                                <input type="text" name="address" id="address" class="form-control"
                                    value="{{ $tempatWisata->address }}" placeholder="Alamat Tempat Wisata" required>
                            </div>
                            <div class="mb-3">
                                <label for="categories">Kategori</label>
                                <select name="categories" id="address" class="form-select" aria-label="Default Select"
                                    required>
                                    <option selected value>Pilih Kategori</option>
                                    @foreach ($kategoris as $k)
                                        <option value="{{ $k->name }}"
                                            {{ $k->name == $tempatWisata->categories ? 'selected' : '' }}>
                                            {{ $k->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="images">Foto</label>
                                <input name="images" id="images" class="form-control" type="file">
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
