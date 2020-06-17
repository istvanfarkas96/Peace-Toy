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
        $videos = Video::paginate(30);

        return view('home', ['videos' => $videos]);
    }

    public function upload()
    {
        $categories = Category::all();

        return view('video/upload', ['categories' => $categories, 'video' => new Video()]);
    }
}
