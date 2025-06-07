<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://fonts.googleapis.com/css2?family=Inter&display=swap" rel="stylesheet">
    <meta charset="UTF-8">
    <title>Add New Product</title>
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
</head>
<body>
  <div class="sidebar">
    <h2>SalesSync</h2>
    <nav>
      <a href="{{ route('overview') }}">Overview</a>
      <a href="#" class="active">Product</a>
      <a href="#">Sales</a>
      <a href="#">Payment</a>
      <a href="#">Returns</a>
    </nav>
  </div>
  <div class="main">
    <h1>Add New Product</h1>

    <div class="section">
      <h3>General Information</h3>
      <div class="form-group">
        <label>Product Name</label>
        <input type="text" placeholder="e.g. Rainbow Donuts" />
      </div>
      <div class="form-group">
        <label>Description</label>
        <textarea rows="3">Buttery donuts with a top of some sprinkles...</textarea>
      </div>
      <div class="form-group">
        <label>Variant</label>
        <div class="size-options">
          <button>XS</button><button>S</button><button>M</button><button>L</button><button>XL</button><button>XXL</button>
        </div>
      </div>
    </div>

    <div class="section">
      <h3>Pricing and Stock</h3>
      <div class="form-group">
        <label>Base Pricing</label>
        <input type="text" value="$47.55" />
      </div>
      <div class="form-group">
        <label>Stock</label>
        <input type="number" value="77" />
      </div>
      <div class="form-group">
        <label>Discount</label>
        <input type="text" value="10%" />
      </div>
      <div class="form-group">
        <label>Discount Type</label>
        <select>
          <option>Chinese New Year Discount</option>
        </select>
      </div>
    </div>

    <div class="section image-upload">
      <h3>Upload Image</h3>
      <input type="file" />
      <div style="margin-top:1rem;">
        <img src="https://via.placeholder.com/100x120" />
        <img src="https://via.placeholder.com/100x120" />
        <img src="https://via.placeholder.com/100x120" />
      </div>
    </div>

    <div class="section">
      <h3>Category</h3>
      <div class="form-group">
        <label>Product Category</label>
        <select>
          <option>Jacket</option>
        </select>
      </div>
      <button class="btn btn-secondary">Add Category</button>
    </div>

    <div class="actions">
      <button class="btn btn-secondary">Save Draft</button>
      <button class="btn btn-primary">Add Product</button>
    </div>
  </div>
</body>
</html>
