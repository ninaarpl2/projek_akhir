@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Absensi</h2>
    <form action="/updateabsensi/{{ $absensi->id}}" method="POST">
        @csrf

        <div class="form-group">
            <label for="user_id">Nama Pegawai</label>
            <select name="user_id" class="form-control" required>
                @foreach($users as $user)
                    <option value="{{ $user->id }}" {{ $user->id == $absensi->user_id ? 'selected' : '' }}>
                        {{ $user->nama }}
                    </option>
                @endforeach
            </select>
            @error('user_id')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="tanggal_absensi">Tanggal Absensi</label>
            <input type="date" name="tanggal_absensi" class="form-control" value="{{ old('tanggal_absensi', $absensi->tanggal_absensi) }}" required>
            @error('tanggal_absensi')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="jam_masuk">Jam Masuk</label>
            <input type="time" name="jam_masuk" class="form-control" value="{{ old('jam_masuk', $absensi->jam_masuk) }}" required>
            @error('jam_masuk')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="jam_keluar">Jam Keluar</label>
            <input type="time" name="jam_keluar" class="form-control" value="{{ old('jam_keluar', $absensi->jam_keluar) }}" required>
            @error('jam_keluar')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="jam_lembur">Jam Lembur</label>
            <input type="time" name="jam_lembur" class="form-control" value="{{ old('jam_lembur', $absensi->jam_lembur) }}">
            @error('jam_lembur')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Update Absensi</button>
    </form>
</div>
@endsection
