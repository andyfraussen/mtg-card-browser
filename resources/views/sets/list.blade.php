@extends('base.body')
@section('content')
    @foreach($cards as $card)
        @if(isset($card['name']))
            <p>{{$card['name']}}</p>
        @endif
    @endforeach
@endsection
