<div id="app" class="col-md-4 text-center color-green p-2">
    <h4 class="col-md-10 font-italic">{{ __('Rate') }}:</h4>
    <div class="col-md-10 p-3 mb-2 d-flex justify-content-center">
        <Rating v-slot="{rating}">
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
                <div class="invalid-feedback justify-content-center d-flex">{{ $errors->first('comment') }}</div>
        @endif
    </div>
    <div class="form-group">
        {{ Form::submit(__('Submit'),[ 'class' => 'btn btn-success']) }}
    </div>
</div>