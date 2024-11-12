@extends('layouts.app')
@section('content')

<div class="container">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title fw-semibold mb-2">Edit Data Izin</h5>

            <form action="/updateizin/{{$izin->id}}" method="POST">
                @csrf

                <div class="form-group mb-3">
                    <label for="user_id">Nama Karyawan</label>
                    <select name="user_id" id="user_id" class="form-control" required>
                        @foreach($users as $user)
                            <option value="{{ $user->id }}" {{ $user->id == $izin->user_id ? 'selected' : '' }}>
                                {{ $user->nama }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group mb-3">
                    <label for="petugas_id">Petugas</label>
                    <select name="petugas_id" id="petugas_id" class="form-control" required>
                        @foreach($petugas as $admin)
                            <option value="{{ $admin->id }}" {{ $admin->id == $izin->petugas_id ? 'selected' : '' }}>
                                {{ $admin->nama }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group mb-3">
                    <label for="kategoriizin_id">Kategori Absen</label>
                    <select name="kategoriizin_id" id="kategoriizin_id" class="form-control" required>
                        <option value="sakit" {{ $izin->kategoriizin_id == 'sakit' ? 'selected' : '' }}>Sakit</option>
                        <option value="izin" {{ $izin->kategoriizin_id == 'izin' ? 'selected' : '' }}>Izin</option>
                    </select>
                </div>

                <div class="form-group mb-3">
                    <label for="tanggal_izin">Tanggal Izin</label>
                    <input type="date" name="tanggal_izin" id="tanggal_izin" class="form-control" value="{{ $izins->tanggal_izin }}" required>
                </div>

                <div class="form-group mb-3">
                    <label for="tanggal_masuk">Tanggal Masuk</label>
                    <input type="date" name="tanggal_masuk" id="tanggal_masuk" class="form-control" value="{{ $izins->tanggal_masuk }}" required>
                </div>

                <div class="form-group mb-3">
                    <label for="alasan_izin">Alasan Izin</label>
                    <textarea name="alasan_izin" id="alasan_izin" class="form-control" rows="3" required>{{ $izins->alasan_izin }}</textarea>
                </div>

                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
            </form>
        </div>
    </div>
</div>

@endsection
