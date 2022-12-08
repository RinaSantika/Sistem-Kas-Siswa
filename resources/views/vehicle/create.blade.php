@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Tambah Kelas</h1>
    <form action="/vehicle/store" method="POST">
        @csrf
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Nama Jurusan</label>
            <input type="text" name="vehicle_type" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Singkatan</label>
            <input type="text" name="license_number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Kelas</label>
            <input type="integer" name="year_created" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <input type="submit" name="submit" class="btn btn-info" value="Save">
    </form>
</div>
@endsection