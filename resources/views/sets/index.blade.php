@extends('base.body')
@section('content')
    <div class="container mx-auto">
        <a href="/" class="absolute top-0 left-0 m-4">
            <button class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                Back
            </button>
        </a>
        <div class="flex flex-col justify-center items-center py-5">
            @if(isset($card['image']) && $card['image'])
                <a href="/sets/{{$set}}/{{$card['number'] + 1}}">
                    <img class="min-h-screen" src="{{ $card['image'] }}" alt="{{ $card['name'] }}">
                </a>
            @else
                <div class="flex flex-col justify-center items-center">
                    <div class="text-4xl text-center mb-8">
                        {{ $card['name'] }}
                    </div>

                    <div class="text-2xl text-center mb-8">
                        {{ $card['text'] }}
                    </div>

                    <div class="text-2xl text-center mb-8">
                        {{ $card['number'] }}
                    </div>
                </div>
            @endif

            <div class="flex flex-row justify-center items-center">
                <a href="/sets/{{$set}}/{{$card['number'] - 1}}">
                    <button class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded mt-3">
                        Previous
                    </button>
                </a>

                @if(!$card['image'])
                    <a href="/sets/{{$set}}/{{$card['number'] + 1}}">
                        <button class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded mt-3 ml-3">
                            Next
                        </button>
                    </a>
                @endif
            </div>
        </div>
    </div>
@endsection
