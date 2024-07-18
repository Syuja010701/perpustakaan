@extends('backend.app')
@section('title', 'Dashboard')
@section('style')
    <style>
        .botton-dashboard {
            background-color: bg-secondary;
            width: 100% !important;
            padding: 8px;
            border-radius: 2px;
            text-align: center;
        }

        .botton-dashboard:hover {
            background-color: #FFF;
        }
    </style>
@endsection

@section('content')
    <!-- Blank Start -->
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-sm-6 col-xl-3">
                <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                    <div class="row">
                        <div class="ms-3 col-md-12">
                            <div class="row">
                                <div class="col-md-8">
                                    <i class="fa fa-user fa-3x text-primary"></i>
                                    <p class="mb-3 mt-3" style="font-weight: bold;">User Penulis</p>
                                </div>
                                <div class="col-md-4 mt-3">
                                    <h6 class="mb-4" style="font-size: 40px !important;">{{ $counttotaluserpenulis }}</h6>
                                </div>
                            </div>
                        </div>
                        <div class="botton-dashboard">
                            <a href="{{ route('backend.penulis') }}" class="small-box-footer">More info <i
                                    class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-6 col-xl-3">
                <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                    <div class="row">
                        <div class="ms-3 col-md-12">
                            <div class="row">
                                <div class="col-md-8">
                                    <i class="fa fa-users fa-3x text-primary"></i>
                                    <p class="mb-3 mt-3" style="font-weight: bold;">User Peminjam</p>
                                </div>
                                <div class="col-md-4 mt-3">
                                    <h6 class="mb-4" style="font-size: 40px !important;">{{ $counttotaluserpeminjam }}
                                    </h6>
                                </div>
                            </div>
                        </div>
                        <div class="botton-dashboard">
                            <a href="{{ route('backend-index-Peminjam') }}" class="small-box-footer">More info <i
                                    class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-6 col-xl-3">
                <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                    <div class="row">
                        <div class="ms-3 col-md-12">
                            <div class="row">
                                <div class="col-md-8">
                                    <i class="fa fa-book fa-3x text-primary"></i>
                                    <p class="mb-3 mt-3" style="font-weight: bold;">Total Buku</p>
                                </div>
                                <div class="col-md-4 mt-3">
                                    <h6 class="mb-4" style="font-size: 40px !important;">{{ $counttotalbuku }}</h6>
                                </div>
                            </div>
                        </div>
                        <div class="botton-dashboard">
                            <a href="{{ route('backend.buku') }}" class="small-box-footer">More info <i
                                    class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-6 col-xl-3">
                <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                    <div class="row">
                        <div class="ms-3 col-md-12">
                            <div class="row">
                                <div class="col-md-8">
                                    <i class="fa fa-book-open fa-3x text-primary"></i>
                                    <p class="mb-3 mt-3" style="font-weight: bold;">Kategori</p>
                                </div>
                                <div class="col-md-4 mt-3">
                                    <h6 class="mb-4" style="font-size: 40px !important;">{{ $counttotalkategori }}</h6>
                                </div>
                            </div>
                        </div>
                        <div class="botton-dashboard">
                            <a href="{{ route('backend.kategori') }}" class="small-box-footer">More info <i
                                    class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>


    <div class="container-fluid pt-4 px-4 row">
        <div class="col-sm-6">
            <div class="bg-secondary rounded h-100 p-4">
                <h6 class="mb-4">Total Peminjaman Perbulan Tahun 2024</h6>
                <canvas id="worldwide-sales"></canvas>
            </div>
        </div>

        <div class="col-sm-6">
            <div class="bg-secondary rounded h-100 p-4">
                <h6 class="mb-4">Total Peminjaman Perhari Minggu Ini</h6>
                <canvas id="total_peminjaman"></canvas>
            </div>
        </div>
    </div>

@endsection
@section('scripts')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            totalPeminjamanPerBulan();
            totalPeminjamanPerHariMingguIni();
        });

        function totalPeminjamanPerBulan() {
            $.ajax({
                type: 'GET',
                url: window.location.origin + '/char',
                dataType: 'json',
                success: function(response) {
                    console.log('Chart Data Bulanan:', response.bulanan);

                    var months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus',
                        'September', 'Oktober', 'November', 'Desember'
                    ];

                    var data = Array.from({
                        length: 12
                    }, () => 0);

                    response.bulanan.forEach(item => {
                        data[item.bulan - 1] = item.total;
                    });

                    var myChart2 = new Chart($("#worldwide-sales"), {
                        type: "line",
                        data: {
                            labels: months,
                            datasets: [{
                                label: "Total Transaksi",
                                data: data,
                                backgroundColor: "rgba(235, 22, 22, .7)",
                                fill: true
                            }]
                        },
                        options: {
                            responsive: true
                        }
                    });
                },
                error: function(xhr, status, error) {
                    console.error('Ajax Error:', status, error);
                }
            });
        }

        function totalPeminjamanPerHariMingguIni() {
            $.ajax({
                type: 'GET',
                url: window.location.origin + '/char',
                dataType: 'json',
                success: function(response) {
                    console.log('Chart Data Mingguan:', response.mingguan);

                    var days = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'];

                    var data = Array.from({
                        length: 7
                    }, () => 0);

                    response.mingguan.forEach(item => {
                        data[item.hari - 1] = item.total;
                    });

                    var myChart3 = new Chart($("#total_peminjaman"), {
                        type: "line",
                        data: {
                            labels: days,
                            datasets: [{
                                label: "Total Transaksi ",
                                data: data,
                                backgroundColor: "rgba(235, 22, 22, .7)",
                                fill: true
                            }]
                        },
                        options: {
                            responsive: true
                        }
                    });
                },
                error: function(xhr, status, error) {
                    console.error('Ajax Error:', status, error);
                }
            });
        }
    </script>

@endsection
