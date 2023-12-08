<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Diktor;

class DiktorController extends Controller
{
    public function index() {
        $diktors = Diktor::orderBy('order')->get();

        return view('diktors', ['diktors' => $diktors]);
    }

    public function get_all() {
        $diktors = Diktor::all();

        return $diktors;
    }
}
