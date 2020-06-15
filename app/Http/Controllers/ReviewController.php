<?php


namespace App\Http\Controllers;


use App\Http\Requests\CreateReviewRequest;
use App\Review;
use App\Video;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function store(CreateReviewRequest $request, $id)
    {
        $review = Review::create([
            'user_id' => Auth::user()->id,
            'video_id' => $id,
            'rating' => $request->rating,
            'title' => $request->title,
            'comment' => $request->comment,
        ]);

        $review->save();

        return redirect()->back();
    }
}