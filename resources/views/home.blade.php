@extends('layouts.app')

@section('content')
    <section>
        <div class="container-fluid p-0 pb-4">
            <video autoplay muted loop>
                <source id="mp4" src="{{asset('storage/1/bg.mp4')}}" type="video/mp4">
            </video>
            <div class="header-video">
                <h1 class="text-center m-1">Browse videos</h1>
                <input class="form-control col-md-4 m-auto" type="text" placeholder="Search" aria-label="Search">
            </div>
        </div>

    </section>
    <div class="container-fluid">
        <div class="row">
            @foreach ($videos as $video)
                <div class="col-md-3">
                    <div class="card mb-4">
                        <video width="400" height="200" poster="{{$video->getFirstMedia()}}"></video>
                        <div class="card-body">
                            <p class="card-text">Random text Random textRandom textRandom textRandom textRandom
                                textRandom textRandom textRandom text</p>
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="btn-group p-3">
                                <button type="button" class="btn btn-sm btn-primary">View</button>
                                <button type="button" class="btn btn-sm btn-secondary">Edit</button>
                            </div>
                            <small class="text-muted p-3">{{$video->created_at}}</small>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <div class="container-fluid">
        <div class="text-center">
        </div>
        <div>
            {!! Form::open(['route' => 'video.store', 'method' => 'POST', 'files' =>'true']) !!}
            {{ Form::file('video') }}
            {{ Form::submit(__('Submit')) }}
        </div>
    </div>

@endsection
