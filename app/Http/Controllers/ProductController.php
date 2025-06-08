<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    // Tampilkan semua produk di halaman product
    public function index()
    {
        $products = Product::all();
        return view('admin.product', compact('products'));
    }

    // Simpan produk baru
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:30',
            'description' => 'required',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'category' => 'required|in:cake,chocolate,candy',
            'image' => 'required|image|max:2048',
        ]);

        $imagePath = $request->file('image')->store('products', 'public');

        Product::create([
            'id' => Str::uuid(),
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'stock' => $request->stock,
            'image' => $imagePath,
            'category' => $request->category,
        ]);

        // Redirect ke route admin/overview setelah berhasil tambah product
        return redirect()->route('overview')->with('success', 'Product added successfully!');
    }

    // Tambahkan method update, destroy, edit jika diperlukan
}
