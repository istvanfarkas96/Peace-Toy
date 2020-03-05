@extends('layouts.app')

@section('content')

    <div class="showcase">
        <div class="showcase-content d-flex justify-content-center align-items-center text-center flex-column">
            <h1>{{__('Video courses without limits')}}</h1>
            @guest
                <a href="{{ route('register') }}" class="btn-lg btn-success">{{__('Get started')}}</a>
            @else
                mitudomen
            @endguest
        </div>
    </div>

@endsection
