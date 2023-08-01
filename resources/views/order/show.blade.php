@extends('layouts.dashboard.app')
@section('content')
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 my-3">
        <h1 class="h4">Detail Penjualan</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            
        </div>
    </div>
    <div class="col-md-6">
        <div class="row mt-3">
            <div class="col-sm-4">Nama Pelanggan</div>
            <div class="col-sm-8">: {{ $order->customer_name }}</div>
        </div>
        <div class="row mt-3">
            <div class="col-sm-4">Alamat</div>
            <div class="col-sm-8">: {{ $order->customer_address }}</div>
        </div>
        <div class="row mt-3">
            <div class="col-sm-4">Tangal Penjualan</div>
            <div class="col-sm-8">: {{ $order->created_at->format('d F Y') }}</div>
        </div>
        <div class="row mt-3">
            <div class="col-sm-4">Jumlah Produk</div>
            <div class="col-sm-8">: {{ $order->orderDetails->count() }}</div>
        </div>
        <div class="row mt-3">
            <div class="col-sm-4">Total Penjualan</div>
            <div class="col-sm-8">: Rp. {{ number_format($order->total,0,'.','.') }}</div>
        </div>
        <div class="row mt-5">
            <h6>Detail Produk Terjual</h6>
            <div>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Code</th>
                            <th scope="col">Nama Produk</th>
                            <th scope="col">Kategori</th>
                            <th scope="col">Gambar</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Total Harga</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($order->orderDetails as $key => $orderDetail)
                        <tr>
                            <th scope="row">{{ $key + 1 }}</th>
                            <td>{{ $orderDetail->product_code }}</td>
                            <td>{{ $orderDetail->product_name }}</td>
                            <td>{{ $orderDetail->product->category }}</td>
                            <td><img src="{{ asset($orderDetail->product->image) }}" alt="product" class="rounded" width="100px"></td>
                            <td>{{ $orderDetail->quantity }}</td>
                            <td>Rp. {{ number_format($orderDetail->total_price,0,'.','.') }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
</main>
@endsection