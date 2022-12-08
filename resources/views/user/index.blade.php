@extends('layouts.master')

@section('content')
<div class="container">
    <a class="btn btn-primary" href="/user/create">Add User</a>
    <table class="table table-hover">
        <tr>
            <th>ID</th>
            <th>NAMA</th>
            <th>EMAIL</th>
            <th>PASSWORD</th>
            <th>EDIT</th>
        </tr>
        @foreach($user as $u)
        <tr>
            <td>{{$u->id}}</td>
            <td>{{$u->name}}</td>
            <td>{{$u->email}}</td>
            <td>{{$u->password}}</td>
            <td>
                <div class="btn-group" role="group" aria-label="Basic example">
                    <a class="btn btn-warning" href="/user/{{$u->id}}/edit">Edit</a>
                    <form action="/user/{{$u->id}}/delete" method="POST">
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