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

    public function hove_work() {
        return view('hove-work');
    }

    public function advantages() {
        return view('advantages');
    }

    public function pogoda() {
        return view('pogoda');
    }

    public function privet() {
        return view('privet');
    }

    public function roliki() {
        return view('roliki');
    }

    public function diktors() {
        return view('diktors');
    }

    public function pay() {
        return view('pay');
    }
}
