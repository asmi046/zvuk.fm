<?php

namespace App\Http\Controllers;

use App\Models\Product;

use Illuminate\Http\Request;

class EasyPageController extends Controller
{
    public function policy() {
        return view('policy');
    }

    public function thencs() {
        return view('thencs');
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

    public function online_zakaz() {
        return view('online-zakaz');
    }



    public function efir() {
        return view('efir');
    }

    public function ozv_rolik() {
        return view('ozv-rolik');
    }



    public function pay() {
        return view('pay');
    }

}
