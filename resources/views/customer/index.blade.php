@extends('layouts.app')

@section('content')
<div class="container">
    <a class="btn btn-primary" href="/customer/create">Tambah Siswa</a>
    <table class="table table-hover">
        <tr>
            <th>ID</th>
            <th>Nama Siswa</th>
            <th>Nomor Telepon Siswa</th>
            <th>Alamat Siswa</th>
            <th>NISN</th>
            <th>EDIT</th>
        </tr>
        @foreach($customer as $c)
        <tr>
            <td>{{$c->id}}</td>
            <td>{{$c->name}}</td>
            <td>{{$c->tel_number}}</td>
            <td>{{$c->address}}</td>
            <td>{{$c->collateral}}</td>
            <td>
                <div class="btn-group" role="group" aria-label="Basic example">
                    <a class="btn btn-warning" href="/customer/{{$c->id}}/edit">Edit</a>
                    <form action="/customer/{{$c->id}}/delete" method="POST">
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