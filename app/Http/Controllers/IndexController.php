<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Menu;

class IndexController extends Controller
{
    public function index() {
        $menus = Menu::orderBy('order')->get();
        return view('index', ['menu' => $menus]);
    }
}
