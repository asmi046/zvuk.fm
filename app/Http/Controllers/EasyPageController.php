<?php

namespace App\Http\Controllers;

use App\Models\Product;

use Illuminate\Http\Request;

class EasyPageController extends Controller
{
    public function policy() {
        return view('policy');
    }

    public function cantacts() {
        return view('contacts');
    }

    public function chrono() {
        return view('chrono');
    }
}
