@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Absen Keluar</h2>
    <form action="/store/tambahjamkeluar" method="POST">
        @csrf

        <div class="form-group">
            <label for="user_id">Nama Pegawai</label>
            <input type="hidden" name="user_id" value="{{ Auth::id() }}"> <!-- Hidden ID field -->
            <input type="text" class="form-control" value="{{ Auth::user()->nama }}" readonly> <!-- Display Name -->
            @error('user_id')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="tanggal_absensi">Tanggal Absensi</label>
            <input type="date" name="tanggal_absensi" class="form-control" value="{{ old('tanggal_absensi', date('Y-m-d')) }}" required>
            @error('tanggal_absensi')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="jam_keluar">Jam Keluar</label>
            <input type="time" name="jam_keluar" class="form-control" value="{{ old('jam_keluar') }}" required>
            @error('jam_keluar')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
