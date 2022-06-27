@extends('app')
@section('content')
@auth
<div class="row">
    <div class="col-md-12">
        @if(session('success'))
        <p class="alert alert-success">{{ session('success') }}</p>
        @endif
        @if($errors->any())
        @foreach($errors->all() as $err)
        <p class="alert alert-danger">{{ $err }}</p>
        @endforeach
        @endif
        <button class="btn btn-primary" data-toggle="modal" data-target="#modal-add"> <i class="nav-icon fas fa-plus"></i> Tambah Produk</button>
        <table id="example2" class="table table-bordered table-hover dataTable dtr-inline collapsed" role="grid" aria-describedby="example2_info">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Deskripsi</th>
                    <th>Harga Beli</th>
                    <th>Harga Jual</th>
                    <th>Gambar</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($list as $data)
                <tr>
                    <td>{{ $data->name }}</td>
                    <td>{{ $data->description }}</td>
                    <td>{{ number_format($data->basePrice,2) }}</td>
                    <td>{{ number_format($data->sellingPrice,2) }}</td>
                    <td><img src="{{ asset('foto_produk/'.$data->images) }}" height="130px" width="130px"></td>
                    <td><a href="#" class="edit_product" data-id_product="{{$data->id}}"  data-name="{{$data->name}}" data-description="{{$data->description}}" data-basePrice="{{$data->basePrice}}" data-sellingPrice="{{$data->sellingPrice}}"  data-toggle="modal" data-target="#modal-edit">Edit</a> | <a href="{{ route('productDelete', ['id' => $data->id]) }}">Delete</a></td>
                </tr>        
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endauth
@endsection