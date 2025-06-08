<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;  // jangan lupa import model Product

class OverviewController extends Controller
{
    public function index()
    {
        // Ambil semua produk
        $products = Product::all();

        // Kirim produk ke view
        return view('admin.overview', compact('products'));
    }
}
