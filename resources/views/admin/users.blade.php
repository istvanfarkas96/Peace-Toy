@extends('layouts.admin')

@section('title')
    Users
@endsection

@section('content')

    <div class="card card-accent-success">
        <div class="font-weight-bold card-header">
            {{ __('Users') }}
        </div>

        <div class="card-body">
            <div class="row">

            </div>
        </div>
        <div>
            @foreach($users as $user)
                <ul>
                    <li>
                        {{$user->email}}
                    </li>
                </ul>
            @endforeach
        </div>
    </div>

@endsection