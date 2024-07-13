@extends('backend.app')
@section('title', 'Tambah Role')
@section('content')

<div class="container-fluid pt-4 px-4">
    <div class="bg-secondary rounded h-100 p-4">
        <h3 class="mb-4">Tambah Roles</h3>
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <form method="POST" action="{{route('roles.store')}}">
            @csrf

            <div class="form-group mb-3 ">
                <label for="nama">Nama Lengkap</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="">
            </div>

            <div class="form-group mb-3">
                <label for="permission">Permission</label>
                <div class="selectgrup selectgrup-pills ">
                    @foreach ($permission as $value)
                    <div class="form-check form-check-inline ">
                        <input type="checkbox" name="permission[]" value="{{$value->id}}">
                        <label>
                            {{ $value->name}}
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
@endsection
@section('script')
<script>
    localStorage.setItem('lastSelectedTab', '#custom-tabs-one-home');
</script>
@endsection