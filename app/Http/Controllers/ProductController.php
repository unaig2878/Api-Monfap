<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return response()->json([
            'success' => true,
            'message' => 'Productos encontrados',
            'data' => $products
        ]);
    }

    public function show($id)
    {
        $product = Product::find($id);
        if (!$product) {
            return response()->json([
                'success' => false,
                'message' => 'Producto no encontrado',
                'data' => $product
            ]);
        }

        return response()->json([
            'success' => true,
            'message' => 'Producto encontrado',
            'data' => $product
        ]);
    }
}
