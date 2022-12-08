@extends('layouts.app')

@section('content')
<div class="container">
<h1>Edit Data</h1>
<form action="/vehicle/{{$vehicle->id}}" method="GET">
    @csrf
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Nama Jurusan</label>
            <input type="text" name="vehicle_type" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$vehicle->vehicle_type}}">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Singkatan</label>
            <input type="text" name="license_number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$vehicle->license_number}}">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Kelas</label>
            <input type="integer" name="year_created" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$vehicle->year_created}}">
        </div>
    <input type="submit" name ="submit" class="btn btn-warning" value="Update">
</form>
</div>
@endsection