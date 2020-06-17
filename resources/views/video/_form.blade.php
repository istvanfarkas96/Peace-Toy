<div class="container">
    <div class="p-4 text-center">
        <h4>{{ __('Upload your own video') }}</h4>
    </div>

    <div class="form-group">
        <label class="d-flex justify-content-center">
            {{__('Title')}}*
        </label>
        {{ Form::text('title', $video->title, [
                     'class' => 'form-control form-control-lg text-center col-md-5 m-auto' . ($errors->has('title') ? ' is-invalid' : ''),
                     'placeholder' => __('Title'),
                     'required'
                 ])
         }}
        @if ($errors->has('title'))
            <div class="invalid-feedback justify-content-center d-flex">{{ $errors->first('title') }}</div>
        @endif
    </div>

    <div class="form-group">
        <label class="d-flex justify-content-center">
            {{ __('Description') }}*
        </label>
        {{ Form::textarea('description', $video->description, [
            'class' => 'form-control col-md-5 m-auto text-center' . ($errors->has('description') ? ' is-invalid' : ''),
            'placeholder' => __('Describe your video'),
            'required'
        ] ) }}
        @if ($errors->has('description'))
            <div class="invalid-feedback justify-content-center d-flex">{{ $errors->first('description') }}</div>
        @endif
    </div>

    <div class="form-group">
        <label class="d-flex justify-content-center">
            {{__('Which category fits your video?')}}*
        </label>
        <div class="row">
            @foreach($categories as $category)
                <div class="col-md-3 m-auto text-center">
                    {{ Form::radio('category', $category->name, false, [
                        'class' => 'm-1' . ($errors->has('category') ? ' is-invalid' : ''),
                    ] ) }}
                    <label>{{$category->name}}</label>
                </div>
            @endforeach
            @if ($errors->has('category'))
                <div class="invalid-feedback justify-content-center d-flex">{{ $errors->first('category') }}</div>
            @endif
        </div>

        <div class="form-group text-center p-5 border-dark">
            <h4>{{__('Upload video')}}*</h4>
            {{ Form::file('video') }}
            @if ($errors->has('video'))
                <div class="invalid-feedback justify-content-center d-flex">{{ $errors->first('video') }}</div>
            @endif
        </div>

        <div class="form-group text-center p-5">
            <h5>{{__('Choose a poster for your video')}}</h5>
            <div class="mb-4 mt-0">{{__('*this will be displayed in the search or just a default video icon')}}</div>
            {{ Form::file('poster') }}
            @if ($errors->has('poster'))
                <div class="invalid-feedback justify-content-center d-flex">{{ $errors->first('poster') }}</div>
            @endif
        </div>

        <div class="form-group">
            {{ Form::submit(__('Submit'),[ 'class' => 'btn btn-success m-auto d-flex']) }}
        </div>

    </div>
</div>