@extends('base.body')
@section('content')
    @foreach($sets as $set)
        <h1 class="text-3xl font-bold underline">
            {{ $set['name'] }}
        </h1>
    @endforeach
@endsection
