@extends('layouts.app')
@section('content')

<div class="col-lg-12 d-flex align-items-stretch">
    <div class="card w-100">
        <div><a href="/tambahizin">Tambah izin</a></div>
      <div class="card-body p-4">
        <h5 class="card-title fw-semibold mb-4">Data Karyawan</h5>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>no</th>
                        <th>nama karyawan</th>
                        <th>nama petugas</th>
                        <th>kategori</th>
                        <th>tanggal izin</th>
                        <th>tanggal masuk</th>
                        <th>alasan izin</th>
                        <th>status</th>
                        @if (Auth::user()->role == 'admin')
                        <th>opsi</th>
                        @endif
                    </tr>
                </thead>
                <tbody>
                    @foreach ($izins as $key => $izin)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $izin->user->nama}}</td>
                            <td>{{ optional($izin->izinpetugas)->nama}}</td>
                            <td>{{ $izin->kategori->nama_kategori}}</td>
                            <td>{{ $izin->tanggal_izin }}</td>
                            <td>{{ $izin->tanggal_masuk }}</td>
                            <td>{{ $izin->alasan_izin }}</td>
                            <td>{{ $izin->status}}</td>
                            @if (Auth::user()->role == 'admin')
                            <td>
                                <a href="" class="btn btn-info">ketrerangan</a>
                                <a href="/izin/edit/{{$izin->id}}" class="btn btn-warning">Edit</a>
                                <a href="" class="btn btn-danger">hapus</a>
                            </td>
                            @endif
                        </tr>
                    @endforeach
                </tbody>
               </table>
        </div>
      </div>
    </div>
  </div>
@endsection
