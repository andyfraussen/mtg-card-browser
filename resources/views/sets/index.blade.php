@extends('base.body')
@section('content')
    <div class="container mx-auto">
        <div class="flex flex-row py-5">
            <a href="/sets/{{$set}}/{{$card['number'] + 1}}">
                <img class="min-h-screen" src="{{ $card['image'] }}" alt="{{ $card['name'] }}">
            </a>
        </div>
    </div>
@endsection
