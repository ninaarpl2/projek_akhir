@extends('layouts.app')
@section('content')

<div class="col-lg-12 d-flex align-items-stretch">
    <div class="card w-100">
        <div class="card-body p-4">
            <h5 class="card-title fw-semibold mb-4">Tambah Karyawan</h5>
            <form action="/store/karyawan" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" name="nama" class="form-control" id="nama" required>
                    @error('nama')
                 <p class="text-danger">{{$message}}</p>
            @enderror
                </div>
                <div class="mb-3">
                    <label for="nis" class="form-label">NIS</label>
                    <input type="text" name="nis" class="form-control" id="nis" required>
                    @error('nis')
                 <p class="text-danger">{{$message}}</p>
            @enderror
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" id="email" required>
                    @error('email')
                 <p class="text-danger">{{$message}}</p>
            @enderror
                </div>
                <div class="mb-3">
                    <label for="jabatan" class="form-label">Jabatan</label>
                    <select name="jabatan" id="jabatan" class="form-select" required>
                        <option value="manager">manager</option>
                        <option value="karyawan">karyawan</option>
                    </select>
                    @error('jabatan')
                 <p class="text-danger">{{$message}}</p>
            @enderror
                </div>
                <div class="mb-3">
                    <label for="gender" class="form-label">Jenis Kelamin</label>
                    <select name="jenis_kelamin" class="form-select" id="gender" required>
                        <option value="pria">Laki-laki</option>
                        <option value="wanita">Perempuan</option>
                    </select>
                    @error('jenis_kelamin')
                 <p class="text-danger">{{$message}}</p>
            @enderror
                </div>
                <div class="mb-3">
                    <label for="alamat" class="form-label">Alamat</label>
                    <textarea name="alamat" class="form-control" id="alamat" rows="3" required></textarea>
                    @error('alamat')
                 <p class="text-danger">{{$message}}</p>
            @enderror
                </div>

                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="/karyawan" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>
</div>

@endsection
