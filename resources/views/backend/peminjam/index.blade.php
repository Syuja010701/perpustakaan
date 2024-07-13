@extends('backend.app')
@section('title', 'Data Peminjam')
@section('content')

<div class="container-fluid pt-4 px-4">
    <div class="bg-secondary rounded h-100 p-4">
        <h6 class="mb-1">Data Peminjam</h6>
        <div class="table-responsive">
            <table class="table table-bordered">
                <style>
                    .star-yellow {
                        color: gold;
                    }
                </style>
                <thead>
        </div>
        @if(Session::has('message'))
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h5>
                <i class="icon fas fa-check"></i> Sukses!
            </h5>
            {{ Session('message')}}
        </div>
        @endif
        @if(Session::has('error'))
        <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h5>
                <i class="icon fas fa-check"></i> Sukses!
            </h5>
            {{ Session('error')}}
        </div>
        @endif

        <div class="mt-4 mb-3">
            @can('peminjam-create')
            <a href="{{route('backend-create-peminjam')}}" class="btn btn-primary">Tambah Peminjam</a>
            @endcan
        </div>
        <tr>
            <th scope="col">No</th>
            <th scope="col">Name</th>
            <th scope="col">Alamat</th>
            <th scope="col">Buat pada</th>
            <th scope="col">Perbarui pada</th>
            <th scope="col">Aksi</th>

        </tr>
        </thead>
        <tbody>
            {{-- Calculate the row number --}}
            @php
            $rowNumber = ($peminjam->currentPage() - 1) * $peminjam->perPage() + 1;
            @endphp

            @forelse($peminjam as $user)
            <tr>
                <th scope="row">{{ $rowNumber++ }}</th>
                <td>{{$user->nama}}</td>
                <td>{{$user->alamat}}</td>
                <td>{{$jenis->created_at ?? \Carbon\Carbon::now() }}</td>
                <td>{{$jenis->updated_at ?? \Carbon\Carbon::now() }}</td>


                <td>
                    @can('peminjam-edit')
                    <a href="{{ route('backend-edit-peminjam', $user->id) }}" class="btn btn-sm btn-warning">Edit</a>
                    @endcan
                    <a href="{{ route('backend-delete-peminjam', $user->id) }}" onclick="return confirm('Are you sure?')" class="btn btn-sm btn-danger">Delete</a>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="7" class="text-center">
                    Tidak Ada Data Peminjam
                </td>
            </tr>
            @endforelse

        </tbody>
        </table>
        <div class="float-right">
            {{ $peminjam->links() }}
        </div>
    </div>
</div>
</div>
@endsection