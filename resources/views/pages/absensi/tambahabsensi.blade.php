@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Tambah Absensi</h2>
    <form action="/store/tambahabsensi" method="POST">
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
            <label for="jam_masuk">Jam Masuk</label>
            <!-- Input untuk Jam Masuk, diatur otomatis menggunakan JavaScript -->
            <input type="time" id="jam_masuk" name="jam_masuk" class="form-control" required readonly>
            @error('jam_masuk')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <script>
    // Mengatur waktu saat ini untuk input type="time"
    document.addEventListener('DOMContentLoaded', function () {
        // Mendapatkan elemen input dengan id jam_masuk
        var jamMasukInput = document.getElementById('jam_masuk');

        // Mendapatkan waktu sekarang
        var now = new Date();

        // Format waktu ke dalam format HH:MM
        var hours = String(now.getHours()).padStart(2, '0'); // Mengatur 2 digit untuk jam
        var minutes = String(now.getMinutes()).padStart(2, '0'); // Mengatur 2 digit untuk menit

        // Menetapkan nilai ke input
        jamMasukInput.value = hours + ':' + minutes;
    });
</script>



        <button type="submit" class="btn btn-primary mt-2">Simpan</button>
    </form>
</div>
@endsection
