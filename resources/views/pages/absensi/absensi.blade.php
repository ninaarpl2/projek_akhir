 @extends('layouts.app')
@section('content')

<div class="col-lg-12 d-flex align-items-stretch">
    <div class="card w-100">
      <div class="card-body p-4">
            <div><a href="/tambahabsensi" class="btn btn-primary">Tambah jam masuk</a></div>
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
                            <td>{{ $absen->user->nama }}</td>
                            <td>{{ $absen->tanggal_absensi }}</td>
                            <td>{{ $absen->jam_masuk }}</td>
                            <td>{{ $absen->jam_keluar}}</td>
                            <td>{{ $absen->jam_lembur}}</td>


                            <td>
                                <a href="/jamkeluar/{{$absen->id}}" class="btn btn-info">keluar sekarang</a>
                                <a href="/jamlembur/{{$absen->id}}" class="btn btn-info text-white">jam lembur</a>
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
