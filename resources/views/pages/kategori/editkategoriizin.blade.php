@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Daftar Kategori</h2>
    <a href="/editkategoriizin" class="btn btn-primary mb-3">Edit Kategori</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Kategori</th>
                <th>Deskripsi</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($kategoris as $kategori)
                <tr>
                    <td>{{ $kategori->id }}</td>
                    <td>{{ $kategori->nama_kategori }}</td>
                    <td>{{ $kategori->deskripsi }}</td>
                    <td>
                        <a href="" class="btn btn-warning btn-sm">Edit</a>
                        <form action="" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <a onclick="return confirm('Yakin ingin menghapus?')" href="/destroyKategori/{{ $kategori->id }}" class="btn btn-danger btn-sm">Hapus</a>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
