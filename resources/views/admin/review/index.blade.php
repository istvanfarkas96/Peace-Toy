@extends('layouts.admin')

@section('title')
    Reviews
@endsection

@section('content')

    <div class="card card-accent-success">
        <div class="card-body">
            <table class="table table-striped table-hover">
                <thead>
                <tr>
                    <th style="width: 10%">&nbsp;</th>
                    <th>{{ __('User') }}</th>
                    <th>{{ __('Title') }}</th>
                    <th>{{ __('Comment') }}</th>
                    <th>{{ __('Rating') }}</th>
                    <th>{{ __('Created at') }}</th>
                    <th style="width: 10%">&nbsp;</th>
                </tr>
                </thead>

                <tbody>
                @foreach($reviews as $review)
                    <tr>
                        <td></td>
                        <td>{{ $review->user->name }}</td>
                        <td>{{ $review->title }}</td>
                        <td>{{ $review->comment }}</td>
                        <td>{{ $review->rating }}</td>
                        <td>{{ $review->created_at }}</td>
                        <td>
                            {!! Form::open(['route' => ['review.destroy', $review], 'method' => 'delete']) !!}
                            <button class="btn btn-xs btn-outline-primary btn-show-on-tr-hover float-right">{{ __('Delete') }}</button>
                            {!! Form::close() !!}
                        </td>
                    </tr>
                @endforeach
                </tbody>

            </table>
        </div>
    </div>

@endsection