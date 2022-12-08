@extends('layouts.app')

@section('content')

<div class="container">
    <h1>Edit Data</h1>
    <form action="/bill/{{$bill->id}}" method="GET">
        @csrf
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Siswa Id</label>
            <input type="integer" name="customer_id" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$bill->customer_id}}">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Kelas Id</label>
            <input type="integer" name="vehicle_id" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$bill->vehicle_id}}">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Pembayaran</label>
            <input type="integer" name="amount" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$bill->amount}}">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Tagihan</label>
            <input type="text" name="price" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$bill->price}}">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Jumlah</label>
            <input type="text" name="helmet" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$bill->helmet}}">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Tanggal mulai bayar</label>
            <input type="text" name="starting_date" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$bill->starting_date}}">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Tanggal akhir bayar</label>
            <input type="text" name="end_date" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$bill->end_date}}">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Keterangan</label>
            <input type="text" name="extend_date" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$bill->extend_date}}">
        </div>
        <input type="submit" name="submit" class="btn btn-warning" value="Update">
    </form>
</div>
@endsection