@extends('base.body')
@section('content')
    <div class="container mx-auto">
        @foreach($sets as $set)
            <div class="flex flex-row">
                <div class="basis-1/3">
                    {{{ $set['date'] }}}
                </div>
                <div class="basis-1/3">
                    <a href="/sets/{{{$set['code']}}}">{{{ $set['name'] }}}</a>
                </div>
                <div class="basis-1/3">
                    {{{ $set['type'] }}}
                </div>
            </div>
        @endforeach
    </div>
@endsection
