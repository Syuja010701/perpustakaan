@extends('backend.app')
@section('title', 'Detail Role')
@section('content')



<div class="container-fluid pt-4 px-4">
    <div class="bg-secondary rounded h-100 p-4">
        <h3 class="mb-4">Detail Roles</h3>
        <div class="card">
            <div class="card-body bg-secondary rounded h-100 p-4">
                <table class="table">
                    <tbody>
                        <tr>
                            <th scope="row">Nama Roles</th>
                            <td>{{ $role->name}}</td>
                        </tr>

                        <tr>
                            <th scope="row">permission</th>
                            <td>
                                @if (!empty($rolePermissions))
                                @foreach ($rolePermissions as $v)
                                <li>
                                    <span> {{ $v->name}}</span>
                                </li>
                                @endforeach
                                @endif
                            </td>
                        </tr>

                    </tbody>

                </table>
            </div>
        </div>
        <div class="card-body">
            <tr>
                <td>
                    <a href="{{ route('roles.index') }}" class="btn btn-info">Kembali ke Roles</a>
                </td>
            </tr>
        </div>
    </div>
</div>

@endsection