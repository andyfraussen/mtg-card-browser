<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class PageController extends Controller
{
    public function index()
    {
        $sets = Cache::get('mtgSets');

        return view('index', ['sets' => $sets]);
    }

}
