@extends('layouts.app')
@section('content')

<div class="col-lg-12 d-flex align-items-stretch">
    <div class="card w-100">
        <div class="card-body p-4">
            <h5 class="card-title fw-semibold mb-4">Surat Izin</h5>
            <div class="text-center mb-4">
                <h2><strong>Sumber Data dan Informasi</strong></h2>
                <p>Jl. Ahmad Sugeng Waras No 59/70, Kesanggrahan</p>
            </div>
            <hr>

            <div class="p-3">
                <p><strong>Kepada Yth,</strong></p>
                <p><strong>Bagian Administrasi</strong></p>
                <p>Dengan hormat,</p>
                <p>Bersama ini saya, yang bertanda tangan di bawah ini:</p>

                <div class="p-3">
                    <p><strong>Nama:</strong> <span>{{ $izin->user->nama }}</span></p>
                    <p><strong>Jabatan:</strong> <span>{{ $izin->user->jabatan }}</span></p>
                    <p><strong>Tanggal Izin:</strong> <span>{{ $izin->tanggal_izin }}</span></p>
                    <p><strong>Tanggal Masuk:</strong> <span>{{ $izin->tanggal_masuk }}</span></p>
                    <p><strong>Status:</strong> <span>{{ ucfirst($izin->status) }}</span></p>
                    <p><strong>Petugas yang Menangani:</strong> <span>{{ $izin->petugas->nama ?? 'Belum ditentukan' }}</span></p>
                    <p><strong>Alasan Izin:</strong> <span>{{ $izin->alasan_izin }}</span></p>
                </div>


                <p>Demikian surat izin ini saya buat dengan sebenarnya. Atas perhatian dan kebijaksanaannya, saya ucapkan terima kasih.</p>
                <p>Hormat saya,</p>
                <br><br>
                <p><strong>{{ $izin->user->nama }}</strong></p>
            </div>
        </div>
    </div>
</div>

@endsection
