<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = Customer::all();
        return response()->json([
            'success' => true,
            'message' => 'Clientes encontrados',
            'data' => $customers
        ]);
    }

    public function show($id)
    {
        $customer = Customer::find($id);
        if (!$customer) {
            return response()->json([
                'success' => false,
                'message' => 'Cliente no encontrado',
                'data' => $customer
            ]);
        }

        return response()->json([
            'success' => true,
            'message' => 'Cliente encontrado',
            'data' => $customer
        ]);
    }
}
