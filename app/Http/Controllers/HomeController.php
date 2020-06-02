<?php

namespace App\Http\Controllers;


use App\Category;
use App\Http\Requests\UploadVideoRequest;
use App\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $videos = Video::all();

        return view('home', ['videos' => $videos]);
    }

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

        $video->save();

        return redirect(route('home', App::getLocale()))->with('success', 'The video was uploaded successfully');
    }

    public function upload()
    {
        $categories = Category::all();

        return view('video/upload', ['categories' => $categories]);
    }
}
