<?php


namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Review;

class ReviewController extends Controller
{

    public function index()
    {
        $reviews = Review::paginate(30);

        return view('admin/review/index', ['reviews' => $reviews]);
    }

    public function destroy(Review $review)
    {
        try {
            $review->delete();

        } catch (\Exception $exception) {
            return redirect()->back()->with('error', $exception->getMessage());
        }

        return redirect()->back()->with('success', 'User deleted successfully');
    }
}