@extends('layouts.app')
@section('content')

<div class="col-lg-12 d-flex align-items-stretch">
    <div class="card w-200">
        <div class="card-body p-2">
            <h5 class="card-title fw-semibold mb-2">Data Karyawan</h5>
            <div><a href="/tambahizin" class="btn btn-info p-2 mt-4 ">Tambah izin</a></div>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>no</th>
                        <th>nama karyawan</th>
                        <th>nama pengecek</th>
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
                            <td>{{ $izin->user->nama }}</td> <!-- Displays the name of the user who made the request -->
                            <td>{{ $izin->petugas ? $izin->petugas->nama : 'Tidak Ada' }}</td> <!-- Displays the name of the petugas -->
                            <td><a href="/detailizin/{{$izin->id}}" class="text-dark " style="text-decoration: none">{{ $izin->kategori->nama_kategori }}</a></td> <!-- Displays the category name -->
                            <td>{{ $izin->tanggal_izin }}</td>
                            <td>{{ $izin->tanggal_masuk }}</td>
                            <td>{{ $izin->alasan_izin }}</td>
                            <td>{{ $izin->status }}</td>
                            @if (Auth::user()->role == 'admin')
                            <td>
                                <a href="/keterangan/{{$izin->id}}" class="btn btn-info">status</a>
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
