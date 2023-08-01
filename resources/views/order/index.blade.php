@extends('layouts.dashboard.app')
@section('content')
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 my-3">
        <h1 class="h4">Data Penjualan</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            
        </div>
    </div>
    
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nama Pelanggan</th>
                <th scope="col">Alamat</th>
                <th scope="col">Tanggal Penjualan</th>
                <th scope="col">Jumlah Produk</th>
                <th scope="col">Total</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($orders as $key => $order)
            <tr>
                <th scope="row">{{ $key + $orders->firstItem() }}</th>
                <td>{{ $order->customer_name }}</td>
                <td>{{ $order->customer_address }}</td>
                <td>{{ $order->created_at->format('d-m-Y H:i:s') }}</td>
                <td>{{ $order->orderDetails->count() }}</td>
                <td>Rp. {{ number_format($order->total,0,'.','.') }}</td>
                <td>
                    <a href="{{ url('orders/'.$order->id) }}" class="btn btn-sm btn-outline-secondary mb-1">Detail</span></a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="my-4 d-flex justify-content-end">
        {{ $orders->links() }}
    </div>
</main>
@endsection