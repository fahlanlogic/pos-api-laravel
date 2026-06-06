<?php

use App\Http\Controllers\Api\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::apiResource('/products', ProductController::class);
// ->missing(function () {
//     return response()->json([
//         'status' => 'error',
//         'message' => 'Product not found'
//     ], 404);
// });
