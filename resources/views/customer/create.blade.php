@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Data Siswa</h1>
    <form action="/customer/store" method="POST">
        @csrf
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Nama Siswa</label>
            <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Nomor Telepon Siswa</label>
            <input type="text" name="tel_number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Alamat Siswa</label>
            <input type="text" name="address" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">NISN</label>
            <input type="text" name="collateral" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <input type="submit" name="submit" class="btn btn-info" value="Save">
    </form>
</div>
@endsection