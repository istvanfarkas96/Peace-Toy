@extends('layouts.app')

@section('content')

    <div class="showcase">
        <div class="showcase-content d-flex justify-content-center align-items-center text-center flex-column" id="timeline">
            <h1>{{__('Video courses without limits')}}</h1>
            @guest
                <a href="{{ route('register', ['language' => App::getlocale()]) }}" class="btn-lg btn-success">{{__('Get started')}}</a>
            @endguest
        </div>
    </div>
    @include("_form")

@endsection
