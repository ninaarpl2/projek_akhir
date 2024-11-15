@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Tambah Kategori</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="/store/kategori" method="POST">
        @csrf
        <div class="mb-3">
            <label for="nama_kategori" class="form-label">Nama Kategori</label>
            <input type="text" class="form-control" id="nama_kategori" name="nama_kategori" required>
            @error('nama_kategori')
                 <p class="text-danger">{{$message}}</p>
            @enderror
        </div>

        <div class="mb-3">
            <label for="deskripsi" class="form-label">Deskripsi</label>
            <textarea class="form-control" id="deskripsi" name="deskripsi"></textarea>
            @error('deskripsi')
                 <p class="text-danger">{{$message}}</p>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
