@extends('backend.app')
@section('title', 'Data Pesan')
@section('content')
<!-- Blank Start -->
<div class="container-fluid pt-4 px-4">
<div class="col-12">
                        <div class="bg-secondary rounded h-100 p-4">
                            <h6 class="mb-4">Data Pesan</h6>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">No</th>
                                            <th scope="col">Pesan</th>
                                            <th scope="col">Nama</th>
                                            <th scope="col">email</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      @foreach($pesan as $pes)
                                        <tr>
                                            <th scope="row">{{$pesan->firstItem() + $loop->index}}</th>
                                            <td>{{ $pes->pesan }}</td>
                                            <td>{{ $pes->name }}</td>
                                            <td>{{ $pes->email }}</td>
                                            <td>
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