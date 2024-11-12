@extends('layouts.app')
@section('content')



<div class="card">
    <ul>
        <li><strong>Nama: </strong>{{Auth::user()->nama}}  </li>
        <li><strong>Nama: </strong>{{Auth::user()->email}}  </li>
        <li><strong>Nama: </strong>{{Auth::user()->jabatan}}  </li>
        <li><strong>Nama: </strong>{{Auth::user()->jenis}}  </li>



    </ul>
</div>

@endsection
