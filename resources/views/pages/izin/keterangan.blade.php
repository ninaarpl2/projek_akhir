@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="p-2 mt-4 me-3">
            <h1>Cek Izin</h1>

            <form action="/store/tambahketerangan/{{ $izin->id }}" method="POST">
                @csrf

                <div class="form-group">
                    <label for="petugas_id">Petugas</label>
                    <input type="text" value="{{ Auth::user()->nama }}" name="petugas_id" id="petugas_id" class="form-control" readonly required>
                </div>

                <div class="form-group">
                    <label for="status">Status</label>
                    <select name="status" id="status" class="form-control" required>
                        <option value="pending" {{ $izin->status == 'pending' ? 'selected' : '' }}>Pending</option>
                        <option value="diterima" {{ $izin->status == 'diterima' ? 'selected' : '' }}>Diterima</option>
                        <option value="ditolak" {{ $izin->status == 'ditolak' ? 'selected' : '' }}>Ditolak</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary mt-3">Simpan</button>
            </form>
        </div>
    </div>
</div>
@endsection
