<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;

class MenuController extends Controller
{
    public function index()
    {
        return view('menu');
    }

    public function menu()
    {
        $dataMenu = Menu::all();
        return response()->json($dataMenu);
    }

    public function add_menu()
    {
        return view('add_menu');
    }

    public function create_menu(Request $request)
    {
        Menu::create($request->all());

        return response()->json([
            'status' => 'success'
        ]);
    }
}