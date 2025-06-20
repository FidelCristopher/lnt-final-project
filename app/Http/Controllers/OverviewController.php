<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product; 

class OverviewController extends Controller
{
    public function index()
    {
        $products = Product::all();

        return view('admin.overview', compact('products'));
    }
}
