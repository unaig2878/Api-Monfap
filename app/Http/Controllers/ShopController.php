<?php

namespace App\Http\Controllers;

use App\Models\Shop;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index()
    {
        $shops = Shop::all();
        return response()->json([
            'success' => true,
            'message' => 'tiendas encontradas',
            'data' => $shops
        ]);
    }

    public function show($id)
    {
        $shop = Shop::find($id);
        if (!$shop) {
            return response()->json([
                'success' => false,
                'message' => 'tienda no encontrada',
                'data' => $shop
            ]);
        }

        return response()->json([
            'success' => true,
            'message' => 'Tienda encontrada',
            'data' => $shop
        ]);
    }

    public function getCustomer($id)
    {

        $shop = Shop::findOrFail($id);
        if (!$shop) {
            return response()->json([
                'success' => false,
                'message' => 'tienda no encontrada',
                'data' => $shop
            ]);
        }
        $customer = $shop->customer;



        return response()->json([
            'success' => true,
            'message' => 'Customer de tienda encontrado',
            'data' => $customer
        ]);

    }

    public function getProducts($id)
    {
        $shop = Shop::findOrFail($id);
        if (!$shop) {
            return response()->json([
                'success' => false,
                'message' => 'tienda no encontrada',
                'data' => $shop
            ]);
        }
        $products = $shop->products;



        return response()->json([
            'success' => true,
            'message' => 'Producto de tienda encontrado',
            'data' => $products
        ]);
    }
}
