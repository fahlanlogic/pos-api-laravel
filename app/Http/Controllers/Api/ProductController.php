<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();

        return response()->json([
            'status' => 'success',
            'message' => 'Success get products',
            'data' => $products,
        ], 200);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'price' => 'required|numeric',
            'size' => 'required|string|max:100',
            'stok' => 'required|integer',
        ]);

        $products = Product::create($request->all());

        return response()->json([
            'status' => 'success',
            'message' => 'Success create product',
            'data' => $products,
        ], 201);
    }
}
