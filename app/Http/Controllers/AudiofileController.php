<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Audiofile;


class AudiofileController extends Controller
{
    public function index() {
        $roliki = Audiofile::all();

        $roliki_type = [];
        foreach ($roliki as $item)
            $roliki_type[$item['type']][] = $item;
        // dd($roliki_type);
        return view('roliki', ['roliki' => $roliki_type]);
    }
}
