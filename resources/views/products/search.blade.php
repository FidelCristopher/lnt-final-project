@extends('layouts.app')

@section('content')
<div class="container-fluid py-4">
    <h3>Search Results</h3>

    @if($products->count())
        <div class="product-grid row g-4">
            @foreach($products as $product)
                <div class="col-6 col-sm-4 col-md-3 col-lg-2-4">
                    <div class="product-item position-relative">
                        <span class="badge bg-success position-absolute m-3">-30%</span>

                        <a href="#" class="btn-wishlist position-absolute top-0 end-0 m-3">
                            <svg width="24" height="24"><use xlink:href="#heart"></use></svg>
                        </a>

                        <figure>
                            <a href="{{ route('products.show', $product->id) }}" title="{{ $product->name }}">
                                <img src="{{ asset('storage/' . $product->image) }}"
                                     style="width: 100%; height: 200px; object-fit: cover;"
                                     alt="{{ $product->name }}">
                            </a>
                        </figure>

                        <h5 class="product-title mt-2">{{ $product->name }}</h5>
                        <p class="product-price">Rp {{ number_format($product->price) }}</p>

                        <div class="d-flex justify-content-center align-items-center my-2">
                            <button type="button" class="btn btn-outline-secondary btn-sm" onclick="decrement(this)">−</button>
                            <input type="number" class="form-control text-center mx-2" name="quantity"
                                   value="1" min="1" style="width: 60px;">
                            <button type="button" class="btn btn-outline-secondary btn-sm" onclick="increment(this)">+</button>
                        </div>

                        <form action="{{ route('cart.add', $product->id) }}" method="POST">
                            @csrf
                            <input type="hidden" name="quantity" value="1">
                            <button type="submit" class="btn btn-primary w-100">Add to Cart</button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <p>No products found.</p>
    @endif
</div>
@endsection
