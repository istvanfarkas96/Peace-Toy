<?php


namespace App\Http\Controllers;


use App\Http\Requests\CreateReviewRequest;
use App\Mail\ReportNotification;
use App\Review;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

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

    public function report(User $user, Review $review) {
        $admins = User::where('admin', true)->get();

        $emails = $admins->map(function($admin) {
            return $admin->email;
        });
        Mail::to($emails)->send(new ReportNotification($review, $user));

        return redirect()->back()->with('success', 'Review reported, admins notified');

    }
}