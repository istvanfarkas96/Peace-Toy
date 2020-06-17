<div class="color-green row review col-md-6 pl-5 m-5">
    <div class="row col-md-9 pt-2 border-bottom">
        <div class="pt-2 pr-3">
            @include ('video._readOnly-rating', ['rating' => $review->rating, 'width' => 21])
        </div>
        <h4 class="row p-2">{{ $review->title }}</h4>
    </div>
    <div class="p-1 col-md-3 color-green text-sm">
        {{ $review->user->name }}
        -
        <time class="">{{ $review->created_at->diffForHumans() }}</time>
    </div>
    <div class="pt-4">
        <p>{{ $review->comment }}</p>
    </div>
    <div class="col-md-12">
        <a href="{{route('review.report', ['review' => $review, 'user' => Auth::user()])}}"><i class="fa fa-exclamation-circle float-right mb-2"
                                         style="color:red">&nbsp;{{ __('Report') }}</i></a>
    </div>
</div>
