<?php


namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Video;

class VideoController extends Controller
{

    public function index()
    {
        $videos = Video::paginate(30);

        return view('admin.video.index', ['videos' => $videos]);
    }

    public function destroy(Video $video)
    {
        try {
            $video->delete();
        } catch (\Exception $exception) {
            return redirect()->back()->with('error', $exception->getMessage());
        }
        return redirect()->back()->with('success', 'Video deleted successfully');
    }
}