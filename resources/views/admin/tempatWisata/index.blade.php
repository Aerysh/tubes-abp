@extends('template.admin')

@section('title', 'Daftar Tempat Wisata')

@section('content')
    <div class="container">
        <div class="row my-3">
            <div class="col-md-12">
                @if (session('status'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('status') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                        </button>
                    </div>
                @endif
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <h5 class="card-title">Daftar Tempat Wisata</h5>
                            </div>
                            <div class="col-md-6 d-flex justify-content-end">
                                <a href="{{ route('admin.tempatWisata.create') }}" class="btn btn-primary">Tambah Tempat
                                    Wisata</a>
                            </div>
                        </div>
                        <table class="table table-responsive table-hover" id="listTempatWisata">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nama</th>
                                    <th>Deskripsi</th>
                                    <th>Alamat</th>
                                    <th>Kategori</th>
                                    <th>Foto</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($tempatWisatas as $tw)
                                    <tr>
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td>{{ $tw->name }}</td>
                                        <td>{{ $tw->description }}</td>
                                        <td>{{ $tw->address }}</td>
                                        <td>{{ $tw->categories }}</td>
                                        <td>
                                            @foreach ($tw->images as $image)
                                                <img src="{{ asset('images/'.$image->image) }}"
                                                    class="img-fluid" width="150">

                                            @endforeach
                                        </td>
                                        <td><a href="{{ route('admin.tempatWisata.edit', $tw->id) }}"
                                                class="btn btn-secondary">Edit</a>
                                            {{-- delete --}}
                                            <form action="{{ route('admin.tempatWisata.delete', $tw->id) }}"
                                                method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Hapus</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
