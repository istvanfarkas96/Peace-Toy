@extends('layouts.app')

@section('content')

    {!! Form::open(['route' => 'video.store', 'method' => 'POST', 'files' =>'true']) !!}
        @include('video._form')
    {!! Form::close() !!}
@endsection