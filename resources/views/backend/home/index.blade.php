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
                                <h6 class="mb-4" style="font-size: 40px !important;">{{$counttotaluserpenulis}}</h6>
                            </div>
                        </div>
                    </div>
                    <div class="botton-dashboard">
                        <a href="{{ route('backend.penulis')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
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
                                <h6 class="mb-4" style="font-size: 40px !important;">{{$counttotaluserpeminjam}}</h6>
                            </div>
                        </div>
                    </div>
                    <div class="botton-dashboard">
                        <a href="{{ route('backend-index-Peminjam')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
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
                                <h6 class="mb-4" style="font-size: 40px !important;">{{$counttotalbuku}}</h6>
                            </div>
                        </div>
                    </div>
                    <div class="botton-dashboard">
                        <a href="{{ route('backend.buku')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
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
                                <h6 class="mb-4" style="font-size: 40px !important;">{{$counttotalkategori}}</h6>
                            </div>
                        </div>
                    </div>
                    <div class="botton-dashboard">
                        <a href="{{ route('backend.kategori')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<div class="container-fluid pt-4 px-4">

    <div class="col-sm-12">
        <div class="bg-secondary rounded h-100 p-4">
            <h6 class="mb-4">Peminjaman</h6>
            <canvas id="worldwide-sales"></canvas>
        </div>
    </div>

</div>
<!-- Blank End -->
@endsection
@section('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

<script src="https://code.highcharts.com/highcharts.js"></script>
<script type="text/javascript">
   
    selectTransaksi();

    function selectTransaksi() {
        $.ajax({
            type: 'GET',
            url: window.location.origin + '/char',
            dataType: 'json',
            success: function(response) {
                console.log('Chart Data:', response);

                // Membuat array bulan dalam format nama
                var months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];

                // Inisialisasi data transaksi untuk semua bulan dalam setahun dengan nilai awal 0
                var data = Array.from({
                    length: 12
                }, () => 0);

                // Mengisi data transaksi yang sesuai
                for (var i = 0; i < response.length; i++) {
                    data[response[i].month - 1] = response[i].count;
                }

                // Create the line chart (Chart.js)
                var myChart2 = new Chart($("#worldwide-sales"), {
                    type: "line",
                    data: {
                        labels: months, // Use the months array as labels
                        datasets: [{
                            label: "Buku",
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