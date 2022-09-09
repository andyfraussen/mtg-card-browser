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
        $cards = mtgsdk\Card::where([
            'set' => $setCode,
        ])->all();

        $card = array_map(function ($e){
            return [
                'name' => isset($e->name) ? $e->name : null,
                'artist' => isset($e->artist) ? $e->artist : null,
                'image' => isset($e->imageUrl) ? $e->imageUrl : null,
                'number' => isset($e->number) ? $e->number : null,
                'text' => isset($e->text) ? $e->text : null,
            ];
        }, $cards);

        if (!$card[0]){
            return back();
        }

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
                'name' => isset($e->name) ? $e->name : null,
                'artist' => isset($e->artist) ? $e->artist : null,
                'image' => isset($e->imageUrl) ? $e->imageUrl : null,
                'number' => isset($e->number) ? $e->number : null,
                'text' => isset($e->text) ? $e->text : null,
            ];
        }, $card);

        return view('sets.index', [
            'set' => $setCode,
            'card' => $card[0]
        ]);
    }

    public function setCardList($setCode){

        $cards = mtgsdk\Card::where([
            'set' => $setCode,
        ])->all();

        $cards = array_map(function ($e){
            if (isset($e->imageUrl))
                return [
                    'name' => $e->name,
                ];
        }, $cards);

        return view('sets.list', ['cards' => $cards]);
    }
}
