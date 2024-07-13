@extends('backend.app')
@section('title', 'Konfigurasi')
@section('content')
    <!-- Blank Start -->
    <div class="container-fluid pt-4 px-4">
        <div class="col-12">
            <div class="bg-secondary rounded h-100 p-4">
                <h6 class="mb-4">Konfigurasi</h6>
                @if ($konfigurasi->isEmpty())
                    @can('konfigurasi-create')
                        <a href="{{ route('backend.tambah.konfigurasi') }}" class="btn btn-sm btn-block btn-success">Tambah
                            Konfigurasi</a>
                    @endcan
                @endif

                <div class="table-responsive">
                    <table class="table no-wrap">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Email</th>
                                <th scope="col">Nomor Telphone</th>
                                <th scope="col">Alamat</th>
                                <th scope="col">Maps</th>
                                <th scope="col">Logo Perpus</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($konfigurasi as $kon)
                                <tr>
                                    <th scope="row">{{ $konfigurasi->firstItem() + $loop->index }}</th>
                                    <td>{{ $kon->email }}</td>
                                    <td>{{ $kon->no_telepon }}</td>
                                    <td>{{ $kon->alamat }}</td>
                                    <td>{{ $kon->maps }}</td>
                                    <td>{{ $kon->logo_perpus }}</td>
                                    <td>
                                        @can('konfigurasi-edit')
                                            <a href=" {{ route('edit_konfigurasi', $kon->id) }}"
                                                class="btn btn-sm btn-primary">Edit</a>
                                        @endcan
                                        @can('konfigurasi-delete')
                                            <a href=" {{ route('delete_konfigurasi', $kon->id) }}"
                                                onclick="return confirm('Are you sure?')"
                                                class="btn btn-sm btn-danger">Hapus</a>
                                        @endcan
                                    </td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- Blank End -->
@endsection
