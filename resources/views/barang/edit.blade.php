@extends('layout.layout') 

@section('content')
@if($errors->any())
<div class="pt-3">
    <div class = "alert alert-danger">
        <ul>
            @foreach ($errors->all() as $item)
                <li>{{ $item }}</li>
            @endforeach
        </ul>
@endif
<form action='{{ url('barang/'.$data->barang_id) }}' method='post'>
@csrf
@method('PUT')
    <div class="my-3 p-3 bg-body rounded shadow-sm">
        <a href='{{ url('barang') }}' class="btn btn-secondary">Kembali</a>
        <div class="mb-3 row">
            <label for="barang_id" class="col-sm-2 col-form-label">ID</label>
            <div class="col-sm-10">
                {{ $data->barang_id }}
            </div>
        </div>
        <div class="mb-3 row">
            <label for="barang_nama" class="col-sm-2 col-form-label">Nama Barang</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='barang_nama' value="{{ $data->barang_nama }}" id="barang_nama">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="barang_total" class="col-sm-2 col-form-label">Total Barang</label>
            <div class="col-sm-10">
                <input type="number" class="form-control" name='barang_total' value="{{ $data->barang_total }}" id="barang_total">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="barang_kondisi" class="col-sm-2 col-form-label">Kondisi Barang</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='barang_kondisi' value="{{ $data->barang_kondisi }}"id="barang_kondisi">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="jurusan" class="col-sm-2 col-form-label"></label>
            <div class="col-sm-10"><button type="submit" class="btn btn-primary" name="submit">SIMPAN</button></div>
        </div>
      
    </div>
</form>
@endsection
