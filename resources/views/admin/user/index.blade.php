@extends('layouts.admin')

@section('title')
    Users
@endsection

@section('content')

    <div class="card card-accent-success">
        <div class="font-weight-bold card-header">
            {{ __('Users') }}
            <a href="{{route('user.create')}}" class="float-right btn btn-primary"><i class="fa fa-plus"></i> Create User</a>
        </div>

        <div class="card-body">
            <table class="table table-striped table-hover">
                <thead>
                <tr>
                    <th style="width: 10%">&nbsp;</th>
                    <th>{{ __('Name') }}</th>
                    <th>{{ __('Email') }}</th>
                    <th>{{ __('Register date') }}</th>
                    <th style="width: 10%">&nbsp;</th>
                    <th style="width: 10%">&nbsp;</th>
                </tr>
                </thead>

                <tbody>
                @foreach($users as $user)
                    <tr>
                        <td></td>
                        <td>{{ $user->name }}</td>
                        <td>{{$user->email}}</td>
                        <td>{{ $user->created_at }}</td>
                        <td>
                            <a href="{{ route('user.edit', $user) }}"
                               class="btn btn-xs btn-outline-primary btn-show-on-tr-hover float-right">{{ __('Edit') }}</a>
                        </td>
                        <td>
                            {!! Form::open(['route' => ['user.destroy', $user], 'method' => 'delete']) !!}
                            <button class="btn btn-xs btn-outline-primary btn-show-on-tr-hover float-right">{{ __('Delete') }}</button>
                            {!! Form::close() !!}
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        {{ $users->appends(['sort' => 'users'])->render() }}
    </div>

@endsection