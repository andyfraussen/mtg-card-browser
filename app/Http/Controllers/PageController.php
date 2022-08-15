<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Cache;
use mtgsdk;

class PageController extends Controller
{
    public function index()
    {
        $sets = Cache::get('mtgSets');

        return view('index', ['sets' => $sets]);
    }

    public function setIndex($setCode)
    {
        $card = mtgsdk\Card::where([
            'set' => $setCode,
            'number' => 1
        ])->all();

        $card = array_map(function ($e){
            return [
                'name' => $e->name,
                'artist' => $e->artist,
                'image' => $e->imageUrl,
                'number' => $e->number,
            ];
        }, $card);

        return view('sets.index', [
            'set' => $setCode,
            'card' => $card[0]
        ]);
    }
    public function setCardShow($setCode, $number)
    {
        $card = mtgsdk\Card::where([
            'set' => $setCode,
            'number' => $number
        ])->all();
        if (!$card){
            return back();
        }
        $card = array_map(function ($e){
            return [
                'name' => $e->name,
                'artist' => $e->artist,
                'image' => $e->imageUrl,
                'number' => $e->number,
            ];
        }, $card);

        return view('sets.index', [
            'set' => $setCode,
            'card' => $card[0]
        ]);
    }
}
