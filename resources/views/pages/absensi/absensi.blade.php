@extends('layouts.app')

@section('content')

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<div class="col-lg-12 d-flex align-items-stretch">
    <div class="card w-100">
        <div class="card-body p-4">
            @if (Auth::user()->role == 'user')
                <div><a href="/tambahabsensi" class="btn btn-primary">Tambah jam masuk</a></div>
            @endif
            <h5 class="card-title fw-semibold mb-4">Data Absen</h5>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>no</th>
                            <th>Nama karyawan</th>
                            <th>tanggal absensi</th>
                            <th>jam masuk</th>
                            <th>jam keluar</th>
                            <th>jam lembur</th>
                            <th>opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($absensis as $key => $absen)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $absen->user ? $absen->user->nama : 'nama tidak ada' }}</td>
                                <td>{{ \Carbon\Carbon::parse($absen->tanggal_absensi)->format('d-m-Y') }}</td> <!-- Menampilkan tanggal dalam format yang lebih mudah dibaca -->
                                <td>{{ \Carbon\Carbon::parse($absen->jam_masuk)->format('H:i') }}</td> <!-- Format jam masuk -->
                                <td>{{ $absen->jam_keluar ? \Carbon\Carbon::parse($absen->jam_keluar)->format('H:i') : 'Belum ada' }}</td> <!-- Format jam keluar jika sudah diinput -->
                                <td>{{ $absen->jam_lembur ? \Carbon\Carbon::parse($absen->jam_lembur)->format('H:i') : 'Belum ada' }}</td> <!-- Format jam lembur jika sudah diinput -->

                                <td>
                                    @if (Auth::user()->role == 'user')
                                        @if (!$absen->jam_keluar) <!-- Jika jam_keluar belum diinput -->
                                            <a href="/jamkeluar/{{$absen->id}}" class="btn btn-info">keluar sekarang</a>
                                        @endif

                                        @if (!$absen->jam_lembur) <!-- Jika jam_lembur belum diinput -->
                                            <a href="/jamlembur/{{$absen->id}}" class="btn btn-info text-white">jam lembur</a>
                                        @endif
                                    @endif

                                    @if (Auth::user()->role == 'admin')
                                        <a href="/editabsen/{{$absen->id}}" class="btn btn-success">edit</a>
                                        <a href="/destroy/absensi/{{$absen->id}}" class="btn btn-danger">hapus</a>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection
