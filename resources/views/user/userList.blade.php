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
        <table id="example2" class="table table-bordered table-hover dataTable dtr-inline collapsed" role="grid" aria-describedby="example2_info">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Tempat Lahir</th>
                    <th>Tanggal Lahir</th>
                    <th>Gender</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($list as $data)
                <tr>
                    <td>{{ $data->name }}</td>
                    <td>{{ $data->email }}</td>
                    <td>{{ $data->birthplace }}</td>
                    <td>{{ date("d, F Y",strtotime($data->birthdate)) }}</td>
                    <td>{{ $data->gender }}</td>
                    <td><a href="#" class="edit_user"data-id_user="{{$data->id}}"  data-name="{{$data->name}}" data-email="{{$data->email}}" data-birthplace="{{$data->birthplace}}" data-birthdate="{{date("Y-m-d",strtotime($data->birthdate))}}" data-gender="{{$data->gender}}" data-toggle="modal" data-target="#modal-default">Edit</a> | <a href="{{ route('userDelete', ['id' => $data->id]) }}">Delete</a></td>
                </tr>        
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endauth
@endsection