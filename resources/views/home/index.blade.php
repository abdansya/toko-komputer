@extends('layouts.home.app')
@section('content')
<!-- Header-->
<header class="bg-dark py-5">
    <div class="container px-4 px-lg-5 my-5">
        <div class="text-center text-white">
            <h1 class="display-4 fw-bolder">Toko Komputer Ngalam</h1>
            <p class="lead fw-normal text-white-50 mb-0">Sedia Komputer Gaming Murah Meriah Hore</p>
        </div>
    </div>
</header>
<!-- Section-->
<section class="py-5">
    <div class="container px-4 px-lg-5 mt-5">
        <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4">
            @forelse ($products as $product)
                <div class="col-md-3 mb-5">
                    <div class="card h-100">
                        <!-- Product image-->
                        <img class="card-img-top" src="{{ url($product->image) }}" alt="..." />
                        <!-- Product details-->
                        <div class="card-body p-4">
                            <div class="text-center">
                                <!-- Product name-->
                                <h5 class="fw-bolder">{{ $product->name }}</h5>
                                <!-- Product price-->
                                <div>Rp. {{ number_format($product->sale_price,0,'.','.') }}</div>
                            </div>
                        </div>
                        <!-- Product actions-->
                        <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                            <div class="text-center"><a class="btn btn-outline-info mt-auto" href="#">Pesan Sekarang</a></div>
                        </div>
                    </div>
                </div>
            @empty
                
            @endforelse
        </div>
    </div>
</section>
<!-- Footer-->
<footer class="py-5 bg-dark">
    <div class="container"><p class="m-0 text-center text-white">Copyright &copy; Abdan Syakuro 2023</p></div>
</footer>

@endsection