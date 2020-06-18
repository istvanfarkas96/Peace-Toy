<?php


namespace App\Http\Controllers;


use App\Http\Requests\CreateReviewRequest;
use App\Mail\ReportNotification;
use App\Review;
use App\User;
use App\Video;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class ReviewController extends Controller
{
    public function store(CreateReviewRequest $request, Video $video)
    {
        $alreadyReviewedOnce = Review::where('user_id', Auth::user()->id)
            ->where('video_id', $video->id)->get();

        if($alreadyReviewedOnce){
            return redirect()->back()->with('error', 'You already reviewed this video!');
        }

        $review = Review::create([
            'user_id' => Auth::user()->id,
            'video_id' => $video->id,
            'rating' => $request->rating,
            'title' => $request->title,
            'comment' => $request->comment,
        ]);

        $review->save();

        return redirect()->back();
    }

    public function report(User $user, Review $review) {
        $admins = User::where('admin', true)->get();

        $emails = $admins->map(function($admin) {
            return $admin->email;
        });
        Mail::to($emails)->send(new ReportNotification($review, $user));

        return redirect()->back()->with('success', 'Review reported, admins notified');

    }
}