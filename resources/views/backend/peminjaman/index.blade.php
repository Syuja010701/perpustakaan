@extends('backend.app')
@section('title', 'Data Peminjaman')
@section('content')
    <div class="container-fluid pt-4 px-4">
        <div class="bg-secondary rounded h-100 p-4">
            <h6 class="mb-1">Data Peminjaman</h6>
            <a href="{{ route('backend-peminjam-download-pdf') }}" class="btn btn-sm btn-success">Download
                PDF</a>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
            </div>
            @if (Session::has('message'))
                <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h5>
                        <i class="icon fas fa-check"></i> Sukses!
                    </h5>
                    {{ Session('message') }}
                </div>
            @endif

            @if (Session::has('error'))
                <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h5>
                        <i class="icon fas fa-check"></i> Error!
                    </h5>
                    {{ Session('error') }}
                </div>
            @endif

            <div class="mt-4 mb-3">

            </div>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Tanggal Pengembalian</th>
                <th scope="col">Nama</th>
                <th scope="col">Buku Yang Dipinjam</th>
                <th scope="col">Aksi</th>
            </tr>
            </thead>
            <tbody>
                @forelse($peminjaman as $pinjam)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $pinjam->tanggal_kembali }}</td>
                        <td>{{ $pinjam->nama }}</td>
                        <td>{{ $pinjam->total }}</td>
                        <td>
                            @if ($pinjam->status == 0)
                                <a href="{{ route('backend-pengembalian-peminjaman', $pinjam->id) }}"
                                    onclick="return confirm('Are you sure?')" class="btn btn-sm btn-success">Cek</a>
                            @endif
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
        </div>
        <div class="float-right">
            {{ $peminjaman->links() }}
        </div>
    </div>
    </div>

@endsection
