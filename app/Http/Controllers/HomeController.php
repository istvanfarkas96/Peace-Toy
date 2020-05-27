<?php

namespace App\Http\Controllers;


use App\Video;
use Illuminate\Http\Request;
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

    public function store(Request $request)
    {
        $user = Auth::user();

        if ($request->hasFile('video')) {
            $video = Video::create([
                'user_id' =>$user->id,
            ]);
            $video->addMediaFromRequest('video')->toMediaCollection();
            $video->save();
        }
    }
}
