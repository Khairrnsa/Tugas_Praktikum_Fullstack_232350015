<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; // Import query builder
use App\Models\Product;

class ProdukController extends Controller
{
    public function index()
    {
       return view("product");
    }

    public function product()
    {
        $dataProduk = Product::all();
        return response()->json($dataProduk);
    }

    public function add_product()
    {
       return view("add");
    }

    public function create_product(Request $request)
    {
        Product::create($request->all());

        $response = [
            "status" => "success"
        ];

        return response()->json($response);
    }
}
