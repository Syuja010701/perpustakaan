@extends('backend.app')
@section('title', 'Data Role')
@section('content')
<div class="container-fluid pt-4 px-4">
    <div class="bg-secondary rounded h-100 p-4">
        <h6 class="mb-1">Data Roles</h6>
        <div class="table-responsive">
            <table class="table table-bordered">
                <style>
                    .star-yellow {
                        color: gold;
                    }
                </style>
                <thead>
        </div>
        @if(Session::has('success'))
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h5>
                <i class="icon fas fa-check"></i> Sukses!
            </h5>
            {{ Session('success')}}
        </div>
        @endif
        <div class="mt-4 mb-3">
            @can('role-create')
            <a href="{{route('roles.create')}}" class="btn btn-primary">Tambah Role</a>
            @endcan
        </div>
        <tr>
            <th scope="col">NO</th>
            <th scope="col">Nama Role</th>
            <th scope="col">Dibuat Pada</th>
            <th scope="col">Aksi</th>

        </tr>
        </thead>
        <tbody>
            @php
            $rowNumber = ($roles->currentPage() - 1) * $roles->perPage() + 1;
            @endphp

            @foreach($roles as $role)
            <tr>
                <td scope="row">{{ $rowNumber++ }}</td>
                <td>{{$role->name}}</td>
                <td>{{$role->created_at}}</td>
                <td>

                    <div class="btn-group">
                        <a href="{{ route('roles.show', $role->id) }}" class="btn btn-sm btn-info ">Show</a>
                        @can('role-edit')
                        <a href="{{ route('roles.edit', $role->id) }}" class="btn btn-sm btn-warning ">Edit</a>
                        @endcan
                        @can('role-delete')
                        <form method="POST" action="{{ route('roles.destroy', $role->id) }}" onsubmit="return confirm('Are you sure you want to delete this role?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" data-toggle="tooltip" title="Delete">Delete</button>
                        </form>
                        @endcan
                    </div>

                </td>
            </tr>
            @endforeach
        </tbody>
        </table>
        <div class="float-right">
            {{ $roles->links() }}
        </div>
    </div>
</div>
</div>
@endsection