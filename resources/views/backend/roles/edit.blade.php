@extends('backend.app')
@section('title', 'Edit Role')
@section('content')




@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<div class="container-fluid pt-4 px-4">
    <div class="bg-secondary rounded h-100 p-4">
        <h3 class="mb-4">Detail Roles</h3>
        <div class="card">
            <div class="card-body bg-secondary rounded h-100 p-4">
                <form method="POST" action="{{route('roles.update',$role)}}">

                    @csrf
                    {{method_field('PUT')}}

                    <div class="form-group">
                        <label for="name">Nama Role</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $role->name) }}" placeholder="">
                    </div><br>

                    <div class="form-group">
                        <label for="permission">Permission</label>
                        <div class="selectgrup selectgrup-pills">
                            @foreach ($permissions as $permission)
                            <div class="form-check form-check-inline">
                                <input type="checkbox" name="permission[]" value="{{ $permission->id }}" {{ in_array($permission->id, old('permission', $rolePermissions)) ? 'checked' : '' }}>
                                <label>
                                    {{ $permission->name }}
                                </label>
                            </div>
                            @endforeach
                        </div>
                    </div>

                    
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="{{route('roles.index')}}" class="btn btn-info">kembali</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection 