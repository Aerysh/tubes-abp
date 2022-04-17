@extends('template.admin')

@section('title', 'Edit Kategori')

@section('content')
    <div class="container">
        <div class="row my-3 d-flex justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Edit Kategori</h5>
                        <form action="{{route('admin.kategori.update', $kategori->id)}}" method="POST">
                            @method('PUT')
                            {{ csrf_field() }}
                            <div class="mb-3">
                                <label for="name">Nama</label>
                                <input type="text" id="name" name="name" class="form-control" placeholder="Nama Kategori"
                                    required value="{{$kategori->name}}">
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

