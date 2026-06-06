<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    public function index()
    {
        $products = [
            [
                'id' => 1,
                'item_name' => 'Palm Sugar Latte',
                'price' => 25000,
                'size' => 'regular',
                'stok' => 20,
            ],
            [
                'id' => 2,
                'item_name' => 'Butterscotch Sea Salt',
                'price' => 25000,
                'size' => 'regular',
                'stok' => 15,
            ],
            [
                'id' => 3,
                'item_name' => 'Americano',
                'price' => 20000,
                'size' => 'regular',
                'stok' => 30,
            ],
            [
                'id' => 4,
                'item_name' => 'Vanilla Latte',
                'price' => 25000,
                'size' => 'regular',
                'stok' => 10,
            ],
        ];

        return response()->json([
            'status' => 'success',
            'message' => 'Success get products',
            'data' => $products,
        ], 200);
    }
}
