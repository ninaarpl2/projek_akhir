@extends('layouts.app')
@section('content')

<div class="col-lg-20 d-flex align-items-stretch">
    <div class="card w-100">
      <div class="card-body">
        <div><a href="/tambahkaryawan" class="btn btn-success">Tambah Karyawan</a></div>

        <h5 class="card-title fw-semibold mb-4">Data Karyawan</h5>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>NIS</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Jabatan</th>
                        <th>Jenis Kelamin</th>
                        <th>Alamat</th>
                        <th>Keterangan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users  as $index => $user)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $user->nis }}</td>
                            <td>{{ $user->nama }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->jabatan }}</td>
                            <td>{{ $user->jenis_kelamin }}</td>
                            <td>{{ $user->alamat }}</td>
                            <td>{{ $user->role }}</td>
                            <td>

                                <small>
                                    <a href="/karyawan/edit/{{$user->id}}" class="btn btn-warning">Edit</a>
                                    <a href="/detail" class="btn btn-primary">Detail</a>
                                    <a onClick="return confirm('ANDA YAKIN MAU MENGHAPUS?????')" href="/destroy/{{$user->id}}" class="btn btn-danger">Hapus</a>
                                </small>
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
