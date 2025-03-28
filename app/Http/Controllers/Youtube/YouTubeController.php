<?php

namespace App\Http\Controllers\Youtube;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\YouTubeService;

class YouTubeController extends Controller
{
    protected $youtubeService;

    public function __construct(YouTubeService $youtubeService)
    {
        $this->youtubeService = $youtubeService;
    }

    public function showParentGames(Request $request)
    {
        $search = $request->input('search');
        $pageToken = $request->input('page_token');
        
        if ($search) {
            $result = $this->youtubeService->searchVideos($search, $pageToken);
        } else {
            $result = $this->youtubeService->getPlaylistVideos($pageToken);
        }
        
        $videos = $result['items'];
        $nextPageToken = $result['nextPageToken'];
        $prevPageToken = $result['prevPageToken'];
        $pageInfo = $result['pageInfo'];
        
        // Get playlist ID for embedding
        $playlistId = config('services.youtube.playlist_id');
        // dd($videos);
        return view('parent.parent_games.index', compact(
            'videos', 
            'nextPageToken', 
            'prevPageToken', 
            'pageInfo', 
            'search',
            'playlistId'
        ));
    }
}
