@extends('layouts.dashboard.app')
@section('content')
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 my-3">
        <h1 class="h4">Master Produk</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <button class="btn btn-md btn-outline-info">Tambah Produk</button>
        </div>
    </div>
    
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Code</th>
                <th scope="col">Name</th>
                <th scope="col">Category</th>
                <th scope="col">Image</th>
                <th scope="col">Purchase Price</th>
                <th scope="col">Sale Price</th>
                <th scope="col">Stock</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $key => $product)
            <tr>
                <th scope="row">{{ $key + $products->firstItem() }}</th>
                <td>{{ $product->code }}</td>
                <td>{{ $product->name }}</td>
                <td>{{ $product->category }}</td>
                <td><img src="{{ asset($product->image) }}" alt="product" class="rounded" width="100px"></td>
                <td>Rp. {{ number_format($product->purchase_price,0,'.','.') }}</td>
                <td>Rp. {{ number_format($product->sale_price,0,'.','.') }}</td>
                <td>{{ $product->stock }}</td>
                <td style="width: 15%;">
                    <a href="#" class="btn btn-sm btn-outline-success mb-1"><span data-feather="eye"></span></a>
                    <a href="#" class="btn btn-sm btn-outline-secondary mb-1"><span data-feather="edit"></span></a>
                    <a href="#" class="btn btn-sm btn-outline-danger mb-1"><span data-feather="trash-2"></span></a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="my-4 d-flex justify-content-end">
        {{ $products->links() }}
    </div>
</main>
@endsection