@extends('layouts.app')
@section('content')

<h5 class="card-title fw-semibold mb-4">Forms</h5>
              <div class="card">
                <div class="card-body">
                  <form action="/izin/update/{{ $dataIzin->id }}" method="POST">
                    @csrf
                    <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">petugas id</label>
                      <input name="petugas_id" value="{{ $dataIzin->petugas_id }}" type="text" class="form-control" id="exampleInputnama1" aria-describedby="petugasHelp">

                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">kategori izin</label>
                        <input name="kategori_izin" value="{{ $dataIzin->kategori_izin }}" type="text" class="form-control" id="exampleInputnis1" aria-describedby="kategori_izinHelp">

                      </div>
                      <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">tanggal izin</label>
                        <input name="tanggal_izin" value="{{ $dataIzin->tangga_izin }}" type="date" class="form-control" id="exampleInputEmail1" aria-describedby="tanggal_izinHelp">

                      </div>
                      <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">tanggal_masuk</label>
                        <input name="tanggal_masuk" value="{{ $dataIzin->tanggal_masuk }}" type="date" class="form-control" id="exampleInputanggal_masuk" aria-describedby="tanggal_masukHelp">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Alasan izin</label>
                        <input name="alasan_izin" value="{{ $dataIzin->alasanizin }}" type="text" class="form-control" id="exampleInputalalasan_izin" aria-describedby="alasan_izinHelp">

                      </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </div>
            </form>
@endsection
