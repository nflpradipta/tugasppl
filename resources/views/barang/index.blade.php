
@extends('layout.layout')  

@section('content')
<div class="my-3 p-3 bg-body rounded shadow-sm">   
    <h1> LIST DATA BARANG </h1>
    <br>
    <div class="pb-3">
      <a href='{{ url('barang/create') }}' class="btn btn-primary">+ Tambah Barang</a>
    </div>

    <table class="table table-striped">
        <thead>
            <tr>
                <th class="col-md-1">No</th>
                <th class="col-md-3">ID</th>
                <th class="col-md-4">Nama Barang</th>
                <th class="col-md-2">Total Barang</th>
                <th class="col-md-4">Kondisi Barang</th>
                <th class="col-md-2">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = $data->firstItem()?>
            @foreach ($data as $item)
            <tr>
                <td>{{ $i }}</td>
                <td>{{ $item->barang_id }}</td>
                <td>{{ $item->barang_nama }}</td>
                <td>{{ $item->barang_total }}</td>
                <td>{{ $item->barang_kondisi }}</td>
                <td>
                    <a href='{{ url('barang/'.$item->barang_id.'/edit') }}' class="btn btn-warning btn-sm">Edit</a>
                    <form onsubmit="return confirm('Apakah anda ingin menghapus barang?')"action="{{ url('barang/'.$item->barang_id) }}"
                        method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" name="submit" class="btn btn-danger btn-sm">Delete</button>
                    </form>
                </td>
            </tr>
            <?php $i++ ?>
            @endforeach
        </tbody>
    </table>
   
</div>
@endsection

    