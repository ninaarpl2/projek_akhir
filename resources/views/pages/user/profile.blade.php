@extends('layouts.app')
@section('content')
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Card</title>
    <style>
        .card {
            width: 300px;
            padding: 20px;
            background: #f4f4f4;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
            font-family: Arial, sans-serif;
        }

        .profile-img {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            object-fit: cover;
            margin-bottom: 15px;
        }

        .name {
            font-size: 1.2em;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .bio {
            font-size: 0.9em;
            color: #666;
        }
    </style>
</head>




<div class="col-lg-20 d-flex align-items-stretch">
    <div class="card w-100">
      <div class="card-body 8">
        <div><a href="/tambahkaryawan" class="/btn btn-primary">Tambah karyawan</a></div>
        <h5 class="card-title fw-semibold mb-4">Profile</h5>
        <div class="table-responsive">

            <div class="card">
                  <ul>
                    <li><strong>Nama: </strong>{{Auth::user()->nama}}  </li>
                    <li><strong>Nis: </strong>{{Auth::user()->nis}}  </li>
                    <li><strong>Email: </strong>{{Auth::user()->email}}  </li>
                    <li><strong>role: </strong>{{Auth::user()->role}}  </li>



                  </ul>
            </div>

        </div>
      </div>
    </div>
  </div>
  <div>
    <table class="table">
        <thead>
            <tr>
                <th>no</th>
                <th>Nama karyawan</th>
                <th>foto absen</th>
                <th>tanggal absensi</th>
                <th>jam masuk</th>
                <th>opsi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $key => $user)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $user->nama }}</td>
                    <td>{{ $user->email}}</td>
                    <td>{{ $user->nis }}</td>
                    <td>{{ $user->role }}</td>
                    <td>
                       <a href="/editkaryawan" class="btn btn-info">edit</a>
                       <a href="" class="btn btn-danger">hapus</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
  </div>


@endsection
