<?php

namespace App\Http\Controllers\Kid;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\YouTubeService;
use Illuminate\Support\Facades\Cache;

class LearningController extends Controller
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
        $category = $request->input('category', 'math'); // Default to math
        
        $learningVideos = $this->youtubeService->getLearningPlaylistVideos($pageToken, 12, $search, $category);
        
        return view('kid.learning.index', [
            'learningVideos' => $learningVideos['items'],
            'nextPageToken' => $learningVideos['nextPageToken'],
            'prevPageToken' => $learningVideos['prevPageToken'],
            'pageInfo' => $learningVideos['pageInfo'],
            'search' => $search,
            'category' => $category,
        ]);
    }

    public function show($videoId)
    {
        $video = $this->youtubeService->getVideoDetails($videoId);
        
        if (!$video) {
            return redirect()->route('kid.learning.index')
                ->with('error', 'Learning video not found');
        }
        
        return view('kid.learning.show', [
            'video' => $video
        ]);
    }
}