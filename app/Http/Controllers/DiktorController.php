<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Diktor;

class DiktorController extends Controller
{
    public function index() {
        $diktors = Diktor::all();

        return view('diktors', ['diktors' => $diktors]);
    }
}
