@extends('layouts.app')

@section('content')
<div class="container">
    <a href="/bill" type="button" class="btn btn-success rounded-3">Kembali</a>
    <table class="table table-hover">
        <tr>
            <th>ID</th>
            <th>Pembayaran</th>
            <th>Tagihan</th>
            <th>Jumlah</th>
            <th>Tanggal Mulai Bayar</th>
            <th>Tanggal Akhir Bayar</th>
            <th>Keterangan</th>
            <th>EDIT</th>
        </tr>
        @foreach($bill as $b)
        <tr>
            <td>{{$b->id}}</td>
            <td>{{$b->amount}}</td>
            <td>{{$b->price}}</td>
            <td>{{$b->helmet}}</td>
            <td>{{$b->starting_date}}</td>
            <td>{{$b->end_date}}</td>
            <td>{{$b->extend_date}}</td>
            <td>
                <div class="btn-group" role="group" aria-label="Basic example">
                    <form action="/bill/restore/{{$b->id}}" method="GET">
                        @csrf
                        <input type="submit" class="btn btn-secondary" value="Restore">
                    </form>
                    <form action="/bill/{{$b->id}}/delete" method="POST">
                        @csrf
                        <input type="submit" class="btn btn-danger" value="Delete Beneran">
                    </form>
                </div>

            </td>
        </tr>
        @endforeach
    </table>
</div>
@endsection