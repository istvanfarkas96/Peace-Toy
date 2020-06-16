@extends('layouts.app')

@section('content')
    <section>
        <div class="container-fluid p-0 pb-4">
            <video autoplay muted loop>
                <source id="mp4" src="/bg.mp4" type="video/mp4">
            </video>
            <div class="header-video">
                <h1 class="text-center m-1">Browse videos</h1>
                {!! Form::open(['route' => ['video.search'], 'method' => 'POST']) !!}
                {{ Form::text('search', null, [
                         'class' => 'form-control col-md-4 m-auto'
                     ])
                 }}
                {!! Form::close() !!}
            </div>
        </div>

    </section>
    <div class="container-fluid">
        <div class="row">
            @foreach ($videos as $video)
                <div class="col-md-3">
                    <div class="card mb-4">
                        <div class="mt-3">
                            <img width="200" height="200" class="d-flex m-auto"
                                 src="{{ $video->poster_id ? $video->getMedia()[1]->getUrl('thumb') : '/video.png' }}">

                        </div>
                        <div class="card-body">
                            <h1 class="card-text">{{$video->title}}</h1>
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="btn-group p-3">
                                <a class="btn btn-sm btn-primary text-white"
                                   href="{{ route('video/show', ['language' => App::getLocale(), 'id' => $video->id]) }}">View</a>
                                @if ($video->user_id == Auth::user()->id)
                                    <a class="btn btn-sm btn-secondary">Edit</a>
                                @endif
                            </div>
                            <small class="text-muted p-3">{{$video->created_at}}</small>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection

