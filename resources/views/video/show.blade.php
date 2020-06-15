@extends('layouts.app')

@section('content')
    {!! Form::open(['route' => ['review.store', $video->id], 'method' => 'POST', 'autocomplete' => 'off']) !!}
    <div class="container-fluid p-0 pb-4 bg-secondary">
        <div class="row">
            <div class="col-md-8 text-center pt-4">
                <h2>{{ $video->title }}</h2>
            </div>
            <div class="col-md-8 d-flex justify-content-center pt-4">
                <video controls width=900" style="border-radius: 11px">
                    <source id="mp4" src="{{ $video->getFirstMedia()->getUrl() }}" type="video/mp4">
                </video>
            </div>
            <div class="col-md-4 text-center color-green p-2">
                <h4 class="col-md-10 font-italic">{{ __('Rate') }}:</h4>
                <div class="col-md-10 p-3 mb-2 d-flex justify-content-center">
                    <Rating current-rating="{{ $video->rating }}" v-slot="{rating}">
                        {{ Form::hidden('rating', null, ['v-model' => 'rating']) }}
                    </Rating>
                </div>
                @error('rating')
                <div class="mt-2">
                    <input type="text" hidden class="form-control is-invalid">
                    <div class="invalid-feedback">{{ $message }}</div>
                </div>
                @enderror
                <div class="form-group">
                    <h4 class="col-md-10 font-italic pt-4 mt-4">{{ __('Title') }}:
                        {{ Form::text('title', null, [
                                       'class' => 'form-control' . ($errors->has('title') ? ' is-invalid' : ''),
                                       'placeholder' => __('Title'),
                                       'required'
                                   ] ) }}

                        @if ($errors->has('title'))
                            <div class="invalid-feedback justify-content-center d-flex">{{ $errors->first('title') }}</div>
                    @endif
                </div>
                <div class="form-group">
                    <h4 class="col-md-10 font-italic pt-4 mt-4">{{ __('Leave a feedback') }}:
                        {{ Form::textarea('comment', null, [
                                       'class' => 'form-control' . ($errors->has('comment') ? ' is-invalid' : ''),
                                       'placeholder' => __('Write your comment here'),
                                       'required'
                                   ] ) }}

                        @if ($errors->has('comment'))
                            <div class="invalid-feedback justify-content-center d-flex">{{ $errors->first('review') }}</div>
                    @endif
                </div>
                <div class="form-group">
                    {{ Form::submit(__('Submit'),[ 'class' => 'btn btn-success']) }}
                </div>
            </div>
            <div class="text-center col-md-12">
                <h3 class="pt-4" style="color:#712222">{{ __('Average rating') }} {{ $rating }}</h3>
                @include ('video._readOnly-rating', ['rating' => $rating, 'width' => 40])
            </div>

            <div class="col font-weight-bold pt-5">
                <h2 class="color-green text-center">{{ __('Comments and Reviews') }}</h2>
                @foreach($reviews as $review)
                    @include('video._review')
                @endforeach
            </div>
        </div>
    </div>
    {!! Form::close() !!}
@endsection