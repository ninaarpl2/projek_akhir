@extends('layouts.app')
@section('content')

    <div class="row">
        <div class="col-lg12 mt-4">
            <h1>Users</h1>
            <div class="card">
                <div class="float-right"><a href="/tambahuser" class="btn btn-primary">tambah user</a></div>
               <div class="p-2 mt-4 me-4">
                <table class="table">
                    <thead>
                        <tr>
                            <th>no</th>
                            <th>nis</th>
                            <th>email</th>
                            <th>jabatan</th>
                            <th>jenis Kelamin</th>
                            <th>alamat</th>
                            <th>opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $key => $user)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $user->nis }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->jabatan }}</td>
                                <td>{{ $user->jenis_kelamin }}</td>
                                <td>{{ $user->alamat }}</td>
                                <td>
                                   <a href="" class="btn btn-info">edit</a>
                                   <a href="" class="btn btn-danger">hapus</a>
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
