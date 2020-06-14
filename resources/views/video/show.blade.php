@extends('layouts.app')

@section('content')
        <div class="container-fluid p-0 pb-4">

            <video controls>
                <source id="mp4" src="{{$video->getFirstMedia()->getUrl()}}" type="video/mp4">
            </video>
    </div>
@endsection