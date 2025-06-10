@extends('layouts.app') {{-- atau layout kamu sendiri --}}

@section('content')
<div class="container py-4">
  <h3>Search Results</h3>
  @if($products->count())
    <div class="row row-cols-1 row-cols-md-4 g-4">
      @foreach($products as $product)
        <div class="col">
          <div class="card h-100">
            <img src="{{ asset('storage/' . $product->image) }}" class="card-img-top" style="height: 200px; object-fit: cover;">
            <div class="card-body">
              <h5 class="card-title">{{ $product->name }}</h5>
              <p class="card-text">Rp {{ number_format($product->price) }}</p>
            </div>
          </div>
        </div>
      @endforeach
    </div>
  @else
    <p>No products found.</p>
  @endif
</div>
@endsection
