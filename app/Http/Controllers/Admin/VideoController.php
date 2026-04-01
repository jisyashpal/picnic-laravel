<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Video;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    public function index()
    {
        $videos = Video::paginate(20);
        return view('admin.videos.index', compact('videos'));
    }

    public function create()
    {
        return view('admin.videos.form');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'url' => 'required|url',
            'type' => 'nullable|string',
        ]);

        // Extract video ID from YouTube URL
        $videoId = $this->extractYouTubeVideoId($data['url']);

        if (!$videoId) {
            return back()->withErrors(['url' => 'Invalid YouTube URL. Please provide a valid YouTube video URL.'])->withInput();
        }

        $data['video_id'] = $videoId;

        Video::create($data);
        return redirect()->route('admin.videos.index')->with('success', 'Video added.');
    }

    public function edit(Video $video)
    {
        return view('admin.videos.form', compact('video'));
    }

    public function update(Request $request, Video $video)
    {
        $data = $request->validate([
            'url' => 'required|url',
            'type' => 'nullable|string',
        ]);

        // Extract video ID from YouTube URL
        $videoId = $this->extractYouTubeVideoId($data['url']);

        if (!$videoId) {
            return back()->withErrors(['url' => 'Invalid YouTube URL. Please provide a valid YouTube video URL.'])->withInput();
        }

        $data['video_id'] = $videoId;

        $video->update($data);
        return redirect()->route('admin.videos.index')->with('success', 'Video updated.');
    }

    public function destroy(Video $video)
    {
        $video->delete();
        return redirect()->route('admin.videos.index')->with('success', 'Video deleted.');
    }

    /**
     * Extract video ID from various YouTube URL formats
     */
    private function extractYouTubeVideoId($url)
    {
        // Handle youtu.be URLs
        if (preg_match('/youtu\.be\/([a-zA-Z0-9_-]{11})/', $url, $matches)) {
            return $matches[1];
        }

        // Handle YouTube Shorts URLs
        if (preg_match('/youtube\.com\/shorts\/([a-zA-Z0-9_-]{11})/', $url, $matches)) {
            return $matches[1];
        }

        // Handle youtu.be Shorts URLs (if they exist)
        if (preg_match('/youtu\.be\/shorts\/([a-zA-Z0-9_-]{11})/', $url, $matches)) {
            return $matches[1];
        }

        // Handle youtube.com URLs with various formats
        if (preg_match('/(?:youtube\.com\/(?:[^\/]+\/.+\/|(?:v|e(?:mbed)?)\/|.*[?&]v=)|youtu\.be\/)([^"&?\/\s]{11})/', $url, $matches)) {
            return $matches[1];
        }

        // Handle youtube.com URLs with watch?v=
        if (preg_match('/youtube\.com\/watch\?v=([a-zA-Z0-9_-]{11})/', $url, $matches)) {
            return $matches[1];
        }

        // Handle youtube.com URLs with embed
        if (preg_match('/youtube\.com\/embed\/([a-zA-Z0-9_-]{11})/', $url, $matches)) {
            return $matches[1];
        }

        return null;
    }
}
