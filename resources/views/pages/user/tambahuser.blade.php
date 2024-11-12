@extends('layouts.app')
@section('content')

            <h5 class="card-title fw-semibold mb-4">Tambah user </h5>
              <div class="card">
                <div class="card-body">
                  <form action="/store/karyawan" method="post">
                    @csrf
                    <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">nama</label>
                      <input name="name" type="nama" class="form-control" id="exampleInputnama1" aria-describedby="namaHelp">

                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">nis</label>
                        <input name="nis" type="nis" class="form-control"  id="exampleInputnis1" aria-describedby="nisHelp">

                      </div>
                      <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">email</label>
                        <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">

                      </div>
                      <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">jabatan</label>
                        <input name="jabatan" type="jabatan" class="form-control" id="exampleInputjabatan1" aria-describedby="jabatanHelp">

                      </div>
                      <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Jenis kelamin</label>
                        <input name="jenis_kelamin" type="jenis_kelamin" class="form-control" id="exampleInputjenis_kelamin1" aria-describedby="jenis_kelaminHelp">

                      </div>
                      <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Alamat</label>
                        <input name="alamat" type="alamat" class="form-control" id="exampleInputalamat1" aria-describedby="alamatHelp">
                      </div>
                      <div class="mb-3">
                        <label for="">Foto</label>
                        <input name="foto" type="file" class="form-control">
                      </div>
                    <button  type="submit" class="btn btn-primary">Simpan</button>
                  </form>
                </div>
              </div>
@endsection
