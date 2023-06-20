<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $products = Product::with('category')->get(['id', 'name', 'price', 'slug']);
        return view('frontend.homepage', compact('products'));
    }

    public function get_products()
    {

        $products = Product::with('category')->get(['id', 'name', 'price', 'slug']);

        return response()->json([
            'status' => 200,
            'products' => $products,
        ]);
    }
}
