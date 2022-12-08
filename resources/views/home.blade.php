@extends('layouts.app')

@section('content')
<div class="container">
<form action="search" method="get">
    @csrf
    <div class="mb-3">

        <label for="name" class="form-label">Search Name</label>

        <input type="text" class="form-control" id="name" name="name">
    </div>

    <div class="text-center">
        <input type="submit" class="btn btn-primary" value="Cari" />

    </div>
</form>
    <div>
        <div>
        <table class="table table-hover">
        <tr>
            <th>Nama Siswa</th>
            <th>Nomor Telepon Siswa</th>
            <th>NISN</th>
            <th>Nama Jurusan</th>
            <th>Singkatan</th>
            <th>Pembayaran</th>
            <th>Tagihan</th>
            <th>Jumlah</th>
            <th>Tanggal Mulai Bayar</th>
            <th>Tanggal Akhir Bayar</th>
        </tr>
        @foreach($data as $d)
        <tr>
            <td>{{$d->name}}</td>
            <td>{{$d->tel_number}}</td>
            <td>{{$d->collateral}}</td>
            <td>{{$d->vehicle_type}}</td>
            <td>{{$d->license_number}}</td>
            <td>{{$d->amount}}</td>
            <td>{{$d->price}}</td>
            <td>{{$d->helmet}}</td>
            <td>{{$d->starting_date}}</td>
            <td>{{$d->end_date}}</td>
        </tr>
        @endforeach
    </table>
        </div>
    </div>
</div>
@endsection
