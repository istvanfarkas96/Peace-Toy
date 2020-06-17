@extends('layouts.admin')

@section('title')
    Videos
@endsection

@section('content')

    <div class="card card-accent-success">
        <div class="font-weight-bold card-header">
            {{ __('Videos') }}
        </div>

        <div class="card-body">
            <table class="table table-striped table-hover">
                <thead>
                <tr>
                    <th style="width: 10%">&nbsp;</th>
                    <th>{{ __('Uploader') }}</th>
                    <th>{{ __('Title') }}</th>
                    <th>{{ __('Description') }}</th>
                    <th>{{ __('Rating') }}</th>
                    <th>{{ __('Views') }}</th>
                    <th>{{ __('Uploaded at') }}</th>
                    <th style="width: 10%">&nbsp;</th>
                    <th style="width: 10%">&nbsp;</th>
                </tr>
                </thead>

                <tbody>
                @foreach($videos as $video)
                    <tr>
                        <td></td>
                        <td>{{ $video->user->name }}</td>
                        <td>{{ $video->title}}</td>
                        <td>{{ $video->description }}</td>
                        <td>{{ $video->rating }}</td>
                        <td>{{ $video->views }}</td>
                        <td>{{ $video->created_at }}</td>
                        <td>
                            {!! Form::open(['route' => ['video.destroy', $video], 'method' => 'delete']) !!}
                                <button class="btn btn-xs btn-outline-primary btn-show-on-tr-hover float-right">{{ __('Delete') }}</button>
                            {!! Form::close() !!}
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        {{ $videos->appends(['sort' => 'videos'])->render() }}
    </div>

@endsection