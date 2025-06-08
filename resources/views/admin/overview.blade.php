{{-- resources/views/overview.blade.php --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://fonts.googleapis.com/css2?family=Inter&display=swap" rel="stylesheet">
    <meta charset="UTF-8">
    <title>Overview Product</title>
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
</head>
<body>
    <div class="sidebar">
        <h2>SalesSync</h2>
        <nav>
            <a href="#" class="active">Overview</a>
            <a href="{{route('product')}}">Product</a>
            <a href="#">Sales</a>
            <a href="#">Payment</a>
            <a href="#">Returns</a>
        </nav>
    </div>

    <div class="main">
        <h1>Overview Page</h1>
        @if(session('success'))
        <div style="color: green;">
            {{ session('success') }}
        </div>
        @endif

        <h2>Product List</h2>
        @if($products->count())
            <div class="product-grid">
                @foreach($products as $product)
                    <div class="product-card">
                        <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="product-image">
                        <h3>{{ $product->name }}</h3>
                        <p>Rp {{ number_format($product->price) }}</p>
                    </div>
                @endforeach
            </div>
        @else
            <p>No products found.</p>
        @endif
</body>
</html>
