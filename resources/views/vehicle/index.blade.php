@extends('layouts.app')

@section('content')
<div class="container">
    <a class="btn btn-primary" href="/vehicle/create">Tambah Kelas</a>
    <table class="table table-hover">
        <tr>
            <th>ID</th>
            <th>Nama Jurusan</th>
            <th>Singkatan</th>
            <th>Kelas</th>
            <th>EDIT</th>
        </tr>
        @foreach($vehicle as $v)
        <tr>
            <td>{{$v->id}}</td>
            <td>{{$v->vehicle_type}}</td>
            <td>{{$v->license_number}}</td>
            <td>{{$v->year_created}}</td>
            <td>
                <div class="btn-group" role="group" aria-label="Basic example">
                    <a class="btn btn-warning" href="/vehicle/{{$v->id}}/edit">Edit</a>
                    <form action="/vehicle/{{$v->id}}/delete" method="POST">
                        @csrf
                        <input type="submit" class="btn btn-danger" value="Delete">
                    </form>
                </div>
            </td>
        </tr>
        @endforeach
    </table>
</div>
@endsection