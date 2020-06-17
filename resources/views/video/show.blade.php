@extends('layouts.app')

@section('content')
    {!! Form::open(['route' => ['review.store', $video->id], 'method' => 'POST', 'autocomplete' => 'off']) !!}
    <div id="app" class="container-fluid vw-100 p-0 pb-4 bg-secondary">
        <div class="row">
            <div class="col-md-8 text-center pt-4 color-green">
                <h2>{{ $video->title }}</h2>
            </div>
            <div class="col-md-8 d-flex justify-content-center pt-4">
                <video controls width=900" style="border-radius: 11px">
                    <source id="mp4" src="{{ $video->getFirstMedia()->getUrl() }}" type="video/mp4">
                </video>
            </div>
            @include('video.review._review-form')
            <div class="text-center col-md-12">
                <h3 class="ml-5 text-center pt-4" style="color:#1d1d50"><i class="fa fa-eye" aria-hidden="true"></i>Views:{{ $video->views }}</h3>

                <h3 class="pt-4" style="color:#712222">{{ __('Average rating') }} {{ $rating }}</h3>
                @include ('video._readOnly-rating', ['rating' => $rating, 'width' => 40])
            </div>

            <div class="col font-weight-bold pt-5">
                <h2 class="color-green text-center">{{ __('Comments and Reviews') }}</h2>
                @if($reviews->count() != 0)
                    @foreach($reviews as $review)
                        @include('video.review._review')
                    @endforeach
                @else
                    <h5 class="text-center p-5">No reviews yet</h5>
                @endif
            </div>
        </div>
    </div>
    {!! Form::close() !!}
@endsection