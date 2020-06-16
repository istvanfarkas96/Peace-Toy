<?php


namespace App\Http\Controllers;

use App\Http\Requests\UploadVideoRequest;
use App\Review;
use App\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

class VideoController extends Controller
{

    public function store(UploadVideoRequest $request)
    {
        $user = Auth::user();
        $video = Video::create([
            'user_id' => $user->id,
            'title' => $request->title,
            'description' => $request->description,
            'category' => $request->category
        ]);

        $video->addMediaFromRequest('video')->toMediaCollection();
        if ($request->poster) {
            $poster = $video->addMediaFromRequest('poster')->toMediaCollection();
            $video->poster_id = $poster->id;
        }
        $video->save();

        return redirect(route('home', App::getLocale()))->with('success', 'The video was uploaded successfully');
    }

    public function show($lang, $id)
    {
        $video = Video::where('id', $id)->first();
        $reviews = Review::where('video_id', $video->id)->get();

        $rating = $reviews->avg('rating');
        $video->rating = $rating;
        $video->save();

        $video->views++;
        $video->save();

        return view('video/show', ['video' => $video, 'reviews' => $reviews, 'rating' => round($rating, 2)]);
    }

    public function search($lang, Request $request)
    {
        $videos = Video::where('title', 'like', '%' . $request->search . '%')->get();

        return view('home', ['videos' => $videos]);
    }

}