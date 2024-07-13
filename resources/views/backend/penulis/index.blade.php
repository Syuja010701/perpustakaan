@extends('backend.app')
@section('title', 'Data Penulis')
@section('content')
<div class="container-fluid pt-4 px-4">
    <div class="bg-secondary rounded h-100 p-4">

        <h6 class="mb-1">Data Penulis</h6>
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
        </div>
        @if(Session::has('message'))
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h5>
                <i class="icon fas fa-check"></i> Sukses!
            </h5>
            {{ Session('message') }}
        </div>
        @endif

        <div class="mt-4 mb-3">
            @can('penulis-create')
            <a href="{{ route('backend.create_penulis')}}" class="btn btn-primary">Tambah Penulis</a>
            @endcan
        </div>
        <tr>
            <th scope="col">No</th>
            <th scope="col">Nama</th>
            <th scope="col">Alamat</th>
            <th scope="col">Tanggal Lahir</th>
            <th scope="col">Telephone</th>
            <th scope="col">Aksi</th>
        </tr>
        </thead>
        <tbody>
            @forelse($penulis as $tulis)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $tulis->nama}}</td>
                <td>{{ $tulis->alamat}}</td>
                <td>{{ $tulis->tanggal_lahir}}</td>
                <td>{{ $tulis->telphone}}</td>

                <td>
                    @can('penulis-editl')
                    <a href="{{ route('backend.edit_penulis', $tulis->id)}}" class="btn btn-sm btn-warning">Edit</a>
                    @endcan
                    @can('penulis-detail')
                    <a href="{{ route('backend.show_penulis', $tulis->id)}}" class="btn btn-sm btn-info">Show</a>
                    @endcan
                    @can('penulis-delete')
                    <a href="{{ route('backend.delete_penulis', $tulis->id)}}" onclick="return confirm('Are you sure?')" class="btn btn-sm btn-danger">Delete</a>
                    @endcan
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="7" class="text-center">
                    Tidak Ada Data Penulis
                </td>
            </tr>
            @endforelse
        </tbody>
        </table>
    </div>
</div>
</div>

@endsection