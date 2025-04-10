<?php

namespace App\Http\Controllers\Kid;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\YouTubeService;

class StoriesController extends Controller
{
    protected $youtubeService;

    public function __construct(YouTubeService $youtubeService)
    {
        $this->youtubeService = $youtubeService;
    }

    public function index(Request $request)
    {
        $search = $request->input('search');
        $pageToken = $request->input('page_token');
        
        if ($search) {
            $result = $this->youtubeService->getStoriesPlaylistVideos($pageToken, 9, $search);
        } else {
            $result = $this->youtubeService->getStoriesPlaylistVideos($pageToken);
        }
        
        $videos = $result['items'];
        $nextPageToken = $result['nextPageToken'];
        $prevPageToken = $result['prevPageToken'];
        $pageInfo = $result['pageInfo'];
        
        return view('kid.stories.index', compact(
            'videos', 
            'nextPageToken', 
            'prevPageToken', 
            'pageInfo', 
            'search'
        ));
    }

    public function show($videoId)
    {
        // Get video details by ID
        $video = $this->youtubeService->getVideoDetails($videoId);
        
        if (!$video) {
            return redirect()->route('kid.stories.index')
                ->with('error', 'Story not found');
        }
        
        // Get related videos - we'll need to add this method to YouTubeService
        $relatedVideos = $this->youtubeService->getRelatedVideos($videoId, 6);
        
        return view('kid.stories.show', compact('video', 'relatedVideos'));
    }
}