@extends('frontend.app')
@section('content')
    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Start Page Content -->
        <!-- ============================================================== -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <h4 class="card-title "><strong>Daftar Table Pinjaman</strong></h4>
                            <a href="{{ route('frontend.download-pdf') }}" class="btn btn-outline-primary">Download</a>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered no-wrap mt-4">
                                <thead>
                                    <tr>
                                        <th class="text-center">No</th>
                                        <th class="text-center">Buku</th>
                                        <th class="text-center">Telat Pengembalian</th>
                                        <th class="text-center">Denda</th>
                                        <th class="text-center">Status</th>
                                        <th class="text-center">Tanggal Kembali</th>
                                        <th class="text-center">Dipinjam Pada</th>
                                        <th class="text-center">Dikembalikan Pada</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @forelse($detail_transaksi as $detail_trans)
                                        <tr>

                                            <td class="text-center">{{ $detail_transaksi->firstItem() + $loop->index }}</td>
                                            <td>{{ $detail_trans->judul }}</td>
                                            <td class="text-center">{{ $detail_trans->telat_pengembalian }}</td>
                                            <td class="text-center">
                                                {{ $detail_trans->denda < 0 ? '0' : $detail_trans->denda }}</td>
                                            <td class="text-center">
                                                {{ $detail_trans->status === 1 ? 'Dikembalikan' : 'Dipinjam' }}</td>
                                            <td class="text-center">{{ $detail_trans->tanggal_kembali }}</td>
                                            <td class="text-center">{{ $detail_trans->created_at }}</td>
                                            <td class="text-center">
                                                {{ $detail_trans->status === 1 ? $detail_trans->updated_at : '' }}</td>
                                        </tr>
                                    @empty
                                    @endforelse
                                </tbody>
                            </table>
                            {{ $detail_transaksi->links() }}

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
