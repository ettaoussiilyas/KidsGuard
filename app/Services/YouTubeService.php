<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;

class YouTubeService
{
    public function getPlaylistVideos($pageToken = null, $maxResults = 12)
    {
        $apiKey = config('services.youtube.api_key');
        $playlistId = config('services.youtube.playlist_id');

        $url = "https://www.googleapis.com/youtube/v3/playlistItems?part=snippet,contentDetails&playlistId=$playlistId&maxResults=$maxResults&key=$apiKey";
        
        if ($pageToken) {
            $url .= "&pageToken=$pageToken";
        }
        
        $cacheKey = "youtube_playlist_{$playlistId}_{$pageToken}_{$maxResults}";
        
        return Cache::remember($cacheKey, 60 * 5, function () use ($url) {
            $response = Http::get($url);
            
            if ($response->successful()) {
                $data = $response->json();
                return [
                    'items' => $data['items'],
                    'nextPageToken' => $data['nextPageToken'] ?? null,
                    'prevPageToken' => $data['prevPageToken'] ?? null,
                    'pageInfo' => $data['pageInfo'] ?? null,
                ];
            }
            
            return [
                'items' => [],
                'nextPageToken' => null,
                'prevPageToken' => null,
                'pageInfo' => null,
            ];
        });
    }
    
    public function searchVideos($query, $pageToken = null, $maxResults = 12)
    {
        $apiKey = config('services.youtube.api_key');
        $playlistId = config('services.youtube.playlist_id');
        
        // If query is empty, return regular playlist videos
        if (empty($query)) {
            return $this->getPlaylistVideos($pageToken, $maxResults);
        }
        
        // First get all videos from the playlist
        $allVideos = $this->getAllPlaylistVideos();
        
        // Filter videos by search query
        $filteredVideos = collect($allVideos)->filter(function ($video) use ($query) {
            $title = $video['snippet']['title'] ?? '';
            $description = $video['snippet']['description'] ?? '';
            
            return stripos($title, $query) !== false || 
                   stripos($description, $query) !== false;
        })->values()->all();
        
        // Manual pagination
        $total = count($filteredVideos);
        $offset = 0;
        
        if ($pageToken && is_numeric($pageToken)) {
            $offset = (int)$pageToken * $maxResults;
        }
        
        $items = array_slice($filteredVideos, $offset, $maxResults);
        $nextPageToken = ($offset + $maxResults < $total) ? (int)($pageToken ?? 0) + 1 : null;
        $prevPageToken = ($offset > 0) ? (int)($pageToken ?? 1) - 1 : null;
        
        return [
            'items' => $items,
            'nextPageToken' => $nextPageToken,
            'prevPageToken' => $prevPageToken,
            'pageInfo' => [
                'totalResults' => $total,
                'resultsPerPage' => $maxResults,
            ],
        ];
    }
    
    // This For Parent Games
    private function getAllPlaylistVideos()
    {
        $apiKey = config('services.youtube.api_key');
        $playlistId = config('services.youtube.playlist_id');
        
        $cacheKey = "youtube_all_playlist_{$playlistId}";
        
        return Cache::remember($cacheKey, 60 * 30, function () use ($apiKey, $playlistId) {
            $url = "https://www.googleapis.com/youtube/v3/playlistItems?part=snippet,contentDetails&playlistId=$playlistId&maxResults=50&key=$apiKey";
            $allVideos = [];
            $nextPageToken = null;
            
            do {
                $pageUrl = $nextPageToken ? "$url&pageToken=$nextPageToken" : $url;
                $response = Http::get($pageUrl);
                
                if (!$response->successful()) {
                    break;
                }
                
                $data = $response->json();
                $allVideos = array_merge($allVideos, $data['items']);
                $nextPageToken = $data['nextPageToken'] ?? null;
                
            } while ($nextPageToken);
            
            return $allVideos;
        });
    }
    
    // This For Music Playlist
    public function getMusicPlaylistVideos($pageToken = null, $maxResults = 9, $query = null)
    {
        $apiKey = config('services.youtube.api_key');
        $playlistId = config('services.youtube.music_playlist_id');
        
        // If query is empty, return regular playlist videos
        if (empty($query)) {
            return $this->getMusicPlaylist($playlistId, $pageToken, $maxResults);
        }
        
        // First get all videos from the playlist
        $allVideos = $this->getAllVideosFromPlaylist($playlistId);
        
        // Filter videos by search query
        $filteredVideos = collect($allVideos)->filter(function ($video) use ($query) {
            $title = $video['snippet']['title'] ?? '';
            $description = $video['snippet']['description'] ?? '';
            
            return stripos($title, $query) !== false || 
                   stripos($description, $query) !== false;
        })->values()->all();
        
        // Manual pagination
        $total = count($filteredVideos);
        $offset = 0;
        
        if ($pageToken && is_numeric($pageToken)) {
            $offset = (int)$pageToken * $maxResults;
        }
        
        $items = array_slice($filteredVideos, $offset, $maxResults);
        $nextPageToken = ($offset + $maxResults < $total) ? (int)($pageToken ?? 0) + 1 : null;
        $prevPageToken = ($offset > 0) ? (int)($pageToken ?? 1) - 1 : null;
        
        return [
            'items' => $items,
            'nextPageToken' => $nextPageToken,
            'prevPageToken' => $prevPageToken,
            'pageInfo' => [
                'totalResults' => $total,
                'resultsPerPage' => $maxResults,
            ],
        ];
    }
    
    private function getMusicPlaylist($playlistId, $pageToken = null, $maxResults = 9)
    {
        $apiKey = config('services.youtube.api_key');

        $url = "https://www.googleapis.com/youtube/v3/playlistItems?part=snippet,contentDetails&playlistId=$playlistId&maxResults=$maxResults&key=$apiKey";
        
        if ($pageToken) {
            $url .= "&pageToken=$pageToken";
        }
        
        $cacheKey = "youtube_music_playlist_{$playlistId}_{$pageToken}_{$maxResults}";
        
        return Cache::remember($cacheKey, 60 * 5, function () use ($url) {
            $response = Http::get($url);
            
            if ($response->successful()) {
                $data = $response->json();
                return [
                    'items' => $data['items'],
                    'nextPageToken' => $data['nextPageToken'] ?? null,
                    'prevPageToken' => $data['prevPageToken'] ?? null,
                    'pageInfo' => $data['pageInfo'] ?? null,
                ];
            }
            
            return [
                'items' => [],
                'nextPageToken' => null,
                'prevPageToken' => null,
                'pageInfo' => null,
            ];
        });
    }
    
    private function getAllVideosFromPlaylist($playlistId)
    {
        $apiKey = config('services.youtube.api_key');
        
        $cacheKey = "youtube_all_music_playlist_{$playlistId}";
        
        return Cache::remember($cacheKey, 60 * 30, function () use ($apiKey, $playlistId) {
            $url = "https://www.googleapis.com/youtube/v3/playlistItems?part=snippet,contentDetails&playlistId=$playlistId&maxResults=50&key=$apiKey";
            $allVideos = [];
            $nextPageToken = null;
            
            do {
                $pageUrl = $nextPageToken ? "$url&pageToken=$nextPageToken" : $url;
                $response = Http::get($pageUrl);
                
                if (!$response->successful()) {
                    break;
                }
                
                $data = $response->json();
                $allVideos = array_merge($allVideos, $data['items']);
                $nextPageToken = $data['nextPageToken'] ?? null;
                
            } while ($nextPageToken);
            
            return $allVideos;
        });
    }
    
    public function getVideoDetails($videoId)
    {
        $apiKey = config('services.youtube.api_key');
        $url = "https://www.googleapis.com/youtube/v3/videos?part=snippet,contentDetails,statistics&id=$videoId&key=$apiKey";
        
        $cacheKey = "youtube_video_details_{$videoId}";
        
        return Cache::remember($cacheKey, 60 * 10, function () use ($url) {
            $response = Http::get($url);
            
            if ($response->successful()) {
                $data = $response->json();
                return $data['items'][0] ?? null;
            }
            
            return null;
        });
    }
}
