@extends('layouts.admin')

@section('title')
    Edit user
@endsection

@section('content')
    <div class="card card-accent-success">
        <div class="font-weight-bold card-header">
            {{ __('Edit user') }}
        </div>
    </div>
    {!! Form::open(['route' => ['user.update', $user], 'method' => 'PUT', 'autocomplete' => 'off']) !!}
    <div class="card-body">
        <div class="form-group">
            <div class="form-group row d-flex justify-content-center text-center">
                <div class="col-md-6 pt-5">
                    {{ Form::text('name', $user->name, [
                        'class' => 'form-control form-control-lg text-center' . ($errors->has('name') ? ' is-invalid' : ''),
                        'placeholder' => __('User Name'),
                        'required'
                    ])
                }}
                    @if ($errors->has('name'))
                        <div class="invalid-tooltip">{{ $errors->first('name') }}</div>
                    @endif
                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="form-group row d-flex justify-content-center text-center">
                <div class="col-md-6 pt-5">
                    {{ Form::email('email', $user->email, [
                        'class' => 'form-control form-control-lg text-center' . ($errors->has('email') ? ' is-invalid' : ''),
                        'placeholder' => __('Email Address'),
                        'required'
                    ])
                }}
                    @if ($errors->has('email'))
                        <div class="invalid-tooltip">{{ $errors->first('email') }}</div>
                    @endif
                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="form-group row d-flex justify-content-center text-center">
                <div class="col-md-6 pt-5">
                    {{ Form::password('password', [
                        'class' => 'form-control form-control-lg text-center' . ($errors->has('password') ? ' is-invalid' : ''),
                        'placeholder' => __('Password'),
                        'required'
                    ])
                }}
                    @if ($errors->has('password'))
                        <div class="invalid-tooltip">{{ $errors->first('password') }}</div>
                    @endif
                </div>
            </div>
        </div>

    </div>
    <div class="text-center">
        <button class="btn btn-success">{{ __('Save') }}</button>
        <a href="#" onclick="history.back();" class="btn btn-link text-muted">{{ __('Cancel') }}</a>
    </div>
    {!! Form::close() !!}
@endsection