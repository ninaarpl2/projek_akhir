@extends('layouts.app')
@section('content')

<h5 class="card-title fw-semibold mb-4">Forms</h5>
              <div class="card">
                <div class="card-body">
                  <form action="/karyawan/update/{{ $dataKaryawan->id }}" method="POST">
                    @csrf
                    <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">nama</label>
                      <input name="nama" value="{{ $dataKaryawan->nama }}" type="text" class="form-control" id="exampleInputnama1" aria-describedby="namaHelp">

                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">nis</label>
                        <input name="nis" value="{{ $dataKaryawan->nis }}" type="text" class="form-control" id="exampleInputnis1" aria-describedby="nisHelp">

                      </div>
                      <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">email</label>
                        <input name="email" value="{{ $dataKaryawan->email }}" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">

                      </div>
                      <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">jabatan</label>
                        <input name="jabatan" value="{{ $dataKaryawan->jabatan }}" type="text" class="form-control" id="exampleInputjabatan1" aria-describedby="jabatanHelp">

                      </div>
                      <div class="mb-3">
                        <label for="exampleInputGender1" class="form-label">Jenis Kelamin</label>
                        <select name="jenis_kelamin" class="form-control" id="exampleInputGender1">
                            <option value="pria" {{ $dataKaryawan->jenis_kelamin == 'pria' ? 'selected' : '' }}>Laki-laki</option>
                            <option value="wanita" {{ $dataKaryawan->jenis_kelamin == 'wanita' ? 'selected' : '' }}>Perempuan</option>
                        </select>
                    </div>

                      <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Alamat</label>
                        <input name="alamat" value="{{ $dataKaryawan->alamat }}" type="text" class="form-control" id="exampleInputalamat1" aria-describedby="alamatHelp">

                      </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </div>
            </form>
@endsection
