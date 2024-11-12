@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Tambah Izin</h1>

    <form action="/store/tambahizin" method="POST">
        @csrf

        <div class="form-group">
            <label for="status">status</label>
            <select name="status" id="status" class="form-control" required>
                @foreach($izins as $kategori)
                    <option value="{{ $kategori->id }}">{{ $kategori->nama_kategori }}</option>
                @endforeach
            </select>
        </div>



        <div class="form-group">
            <label for="petugas_id">Petugas</label>
            <input type="text" value="{{Auth::user()->nama}}" name="petugas_id" id="petugas_id" class="form-control" required>
        </div>





        <button type="submit" class="btn btn-primary mt-3">Simpan</button>
    </form>
</div>
@endsection
