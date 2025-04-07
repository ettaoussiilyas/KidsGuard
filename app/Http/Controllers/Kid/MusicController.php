<?php

namespace App\Http\Controllers\Kid;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\YouTubeService;
use Illuminate\Support\Facades\Cache;

class MusicController extends Controller
{
    protected $youtubeService;

    public function __construct(YouTubeService $youtubeService)
    {
        $this->youtubeService = $youtubeService;
    }

    public function index(Request $request)
    {
        $pageToken = $request->input('page_token');
        $search = $request->input('search');
        
        $musics = $this->youtubeService->getMusicPlaylistVideos($pageToken, 9, $search);
        
        return view('kid.musics.index', [
            'musics' => $musics['items'],
            'nextPageToken' => $musics['nextPageToken'],
            'prevPageToken' => $musics['prevPageToken'],
            'pageInfo' => $musics['pageInfo'],
            'search' => $search,
        ]);
    }

    public function show($videoId)
    {
        $video = $this->youtubeService->getVideoDetails($videoId);
        
        if (!$video) {
            return redirect()->route('kid.musics.index')
                ->with('error', 'Music not found');
        }
        
        return view('kid.musics.show', [
            'video' => $video
        ]);
    }
}