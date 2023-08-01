@extends('layouts.dashboard.app')
@section('content')
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
        <div
            class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Dashboard</h1>
            <div class="btn-toolbar mb-2 mb-md-0">
                
            </div>
        </div>
        <div class="row">
            <div class="col-md-8">
                <canvas class="my-4 w-100" id="chartOrderDaily" width="900" height="380"></canvas>
            </div>
            <div class="col-md-4">
                <canvas class="my-4 w-100" id="chartProductCategory" width="900" height="380"></canvas>
            </div>
        </div>

        <h3 class="mt-5">Daftar 10 Penjualan Terakhir</h3>
        <div class="table-responsive mb-4">
            <table class="table table-striped table-sm">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Customer</th>
                        <th>Alamat</th>
                        <th>Tanggal Penjualan</th>
                        <th>Total Penjualan</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($lastOrders as $key => $order)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $order->customer_name }}</td>
                        <td>{{ $order->customer_address }}</td>
                        <td>{{ $order->created_at->format('d F Y') }}</td>
                        <td>Rp. {{ number_format($order->total,0,'.','.') }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </main>
@endsection
@section('extraJs')
<script src="https://cdn.jsdelivr.net/npm/chart.js@4.3.2/dist/chart.umd.min.js"></script>
<script>
    let dataSetBar = {{ Js::from($datasets) }}
    let dates = {{ Js::from($dates) }}
    let dataBar = {
        labels: dates,
        datasets: dataSetBar
    }

    let labelCategoryPie = {{ Js::from($labelPie) }}
    let dataSetPie = {{ Js::from($datasetsPie) }}

    let elChartBar = document.getElementById("chartOrderDaily");
    let myChartBar = new Chart(elChartBar, {
        type: 'bar',
        data: dataBar,
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'top',
                },
                title: {
                    display: true,
                    text: 'Grafik Penjualan Dalam Satu Bulan'
                }
            }
        },
    });

    let dataPie = {
        labels: labelCategoryPie,
        datasets: [{
            label: 'Jumlah Barang Terjual',
            data: dataSetPie,
            hoverOffset: 4
        }]
    };
    let elChartPie = document.getElementById("chartProductCategory");
    let myChartPie = new Chart(elChartPie, {
        type: 'pie',
        data: dataPie,
        options: {
            plugins: {
                title: {
                    display: true,
                    text: 'Penjualan Berdasarkan Kategori',
                }
            }
        }
    });
</script>
@endsection