@extends('layouts.app')

@section('content')

{!! Form::open(['route' => ['video.update', ['video' =>$video, 'categories' => $categories]], 'method' => 'put']) !!}
    @include('video._form')
{!! Form::close() !!}

@endsection