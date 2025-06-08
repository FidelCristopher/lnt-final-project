<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Product</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
</head>
<body>
    <div class="sidebar">
        <h2>SalesSync</h2>
        <nav>
            <a href="{{ route('overview') }}">Overview</a>
            <a href="{{ route('products.index') }}" class="active">Product</a>
            <a href="#">Sales</a>
            <a href="#">Payment</a>
            <a href="#">Returns</a>
        </nav>
    </div>

    <div class="main">
        <h1>Add New Product</h1>

        <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data" class="section">
            @csrf

            <div class="form-group">
                <label>Product Name</label>
                <input type="text" name="name" placeholder="e.g. Rainbow Donuts" required>
            </div>

            <div class="form-group">
                <label>Description</label>
                <textarea name="description" rows="3" placeholder="Product description..." required></textarea>
            </div>

            <div class="form-group">
                <label>Price (IDR)</label>
                <input type="number" name="price" placeholder="e.g. 50000" required>
            </div>

            <div class="form-group">
                <label>Stock</label>
                <input type="number" name="stock" placeholder="e.g. 20" required>
            </div>

            <div class="form-group">
                <label>Upload Image</label>
                <input type="file" name="image" accept="image/*" required>
            </div>

            <div class="form-group">
                <label>Category</label>
                <select name="category" required>
                    <option value="">-- Select Category --</option>
                    <option value="cake">Cake</option>
                    <option value="chocolate">Chocolate</option>
                    <option value="candy">Candy</option>
                </select>
            </div>

            <div class="actions">
                <button type="submit" class="btn btn-primary">Add Product</button>
            </div>
        </form>

        @if(isset($products) && count($products))
        <div class="section">
            <h2>Product List</h2>
            @foreach($products as $product)
                <div class="form-group" style="margin-bottom: 2rem;">
                    <strong>{{ $product->name }}</strong><br>
                    <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" width="100"><br>
                    {{ $product->description }}<br>
                    Category: {{ $product->category ?? 'N/A' }}<br>
                    Price: Rp {{ number_format($product->price) }}<br>
                    Stock: {{ $product->stock }}
                </div>
            @endforeach
        </div>
        @endif
    </div>
</body>
</html>
