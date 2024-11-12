@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Tambah Izin</h1>

    <form action="/store/tambahizin" method="POST">
        @csrf

        <div class="form-group">
            <label for="kategoriizin_id">Kategori Izin</label>
            <select name="kategoriizin_id" id="kategoriizin_id" class="form-control" required>
                @foreach($kategoris as $kategori)
                    <option value="{{ $kategori->id }}">{{ $kategori->nama_kategori }}</option>
                @endforeach
            </select>
        </div>



        <div class="form-group">
            <label for="tanggal_izin">Tanggal Izin</label>
            <input type="date" name="tanggal_izin" id="tanggal_izin" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="tanggal_masuk">Tanggal Masuk</label>
            <input type="date" name="tanggal_masuk" id="tanggal_masuk" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="alasan_izin">Alasan Izin</label>
            <textarea name="alasan_izin" id="alasan_izin" class="form-control" required></textarea>
        </div>



        <button type="submit" class="btn btn-primary mt-3">Simpan</button>
    </form>
</div>
@endsection
