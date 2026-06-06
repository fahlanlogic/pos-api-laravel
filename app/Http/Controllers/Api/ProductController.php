<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class ProductController extends Controller
{
    // Read all
    public function index()
    {
        $products = Product::all();

        return response()->json([
            'status' => 'success',
            'data' => $products,
        ], 200);
    }

    // Get by ID
    public function show(Product $product) // Route Model Binding otomatis
    {
        return response()->json([
            'status' => 'success',
            'data' => $product,
        ], 200);
    }

    // Create
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'price' => 'required|numeric',
            'size' => ['required', 'string', Rule::in(['regular', 'large'])],
            'stock' => 'required|integer',
            'image' => 'nullable|image|mimes:jpg,png,jpeg,webp|max:2048',
        ]);

        $data = $request->all();

        // cek request ada image atau gak
        if ($request->hasFile('image')) {
            // simpan image ke storage/app/public/products/
            $path = $request->file('image')->store('products', 'public');

            // simpan url image ke database
            $data['image_url'] = Storage::url($path);
        }

        $products = Product::create($data);

        Log::info('Product created', ['product' => $products]);

        return response()->json([
            'status' => 'success',
            'message' => 'Success create product',
            'data' => $products,
        ], 201);
    }

    // Update
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'price' => 'required|numeric',
            'size' => ['required', 'string', Rule::in(['regular', 'large'])],
            'stock' => 'required|integer',
        ]);

        $oldProduct = $product->toArray(); // di TS return-nya sama dengan type Product

        $product->update($request->all());

        Log::info('Product updated', [
            'id' => $product->id,
            'old_product' => $oldProduct,
            'new_product' => $product,
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Success updated product',
            'data' => $product,
        ], 200);
    }

    // Delete
    public function destroy(Product $product)
    {
        $oldProduct = $product->toArray(); // di TS return-nya sama dengan type Product

        $product->delete();

        Log::warning('Product deleted', [
            'id' => $oldProduct['id'],
            'product' => $oldProduct,
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Success deleted product',
        ]);
    }
}
