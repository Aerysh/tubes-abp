@extends('template.admin')

@section('title', 'Kategori')

@section('content')
    <div class="container">
        <div class="row my-3">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Daftar Kategori</h5>
                        <table class="table table-hover" style="width: 100%">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nama</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($kategoris as $k)
                                    <tr>
                                        <td>{{ $loop->index+1 }}</td>
                                        <td>{{ $k->name }}</td>
                                        <td><a href="{{route('admin.kategori.edit', $k->id)}}" class="btn btn-secondary">Edit</a>
                                            {{-- delete item --}}
                                            <form action="{{route('admin.kategori.delete', $k->id)}}" method="POST"
                                                style="display: inline;">
                                                @method('DELETE')
                                                @csrf
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
            <div class="col-md-6">
                <a href="{{route('admin.kategori.create')}}" class="btn btn-primary">Tambah Kategori</a>
            </div>
        </div>
    </div>
@endsection
