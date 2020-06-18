<div class="flex">
    @for ($i=0; $i<$rating; $i++)
        <img class="mr-1" src="/images/star-filled.svg" width="{{$width}}"/>
    @endfor
    @for ($j=0; $j<5-ceil($rating); $j++)
        <img class="mr-1" src="/images/star-empty.svg" width="{{$width}}"/>
    @endfor
</div>