<?php

namespace App\Http\Controllers\Kid;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use App\Models\LearningValue;
use App\Models\ChildProfile;
use App\Models\ChildProfilePreference;

class VideoController extends Controller
{
    public function index(Request $request)
    {
        // Get the current child profile from session
        $childProfileId = session('current_kid_id');
        
        if (!$childProfileId) {
            return redirect()->route('switch-to-kid')
                ->with('error', 'No child profile selected');
        }
        
        $childProfile = ChildProfile::find($childProfileId);
        
        if (!$childProfile) {
            return redirect()->route('parent.child-profiles.create')
                ->with('error', 'Please create a child profile first');
        }
        
        // Get the child's preferences
        $preferences = $childProfile->preferences()->pluck('learning_value_id')->toArray();
        
        // Check if child has special needs
        $hasADHD = $childProfile->has_adhd ?? false;
        $hasAutism = $childProfile->has_autism ?? false;
        
        // Load videos from JSON file
        $videosJson = File::get(base_path('data/videos.json'));
        $videosData = json_decode($videosJson, true);
        $allVideos = $videosData['videos'] ?? [];
        
        // Filter videos based on preferences and special needs
        $filteredVideos = array_filter($allVideos, function($video) use ($preferences, $hasADHD, $hasAutism) {
            $videoValues = (array) ($video['educational_value_id'] ?? []);
            
            // Handle both single category_id and array of category_ids
            $videoCategories = is_array($video['category_id']) 
                ? $video['category_id'] 
                : [$video['category_id']];
            
            // Check for preference matches
            $hasPreferenceMatch = !empty(array_intersect($videoValues, $preferences));
            
            // Check for special needs matches
            $isADHDContent = in_array(6, $videoCategories); // ADHD category
            $isAutismContent = in_array(7, $videoCategories); // Autism category
            
            // Include if it matches preferences OR matches the child's special needs
            return $hasPreferenceMatch || 
                   ($hasADHD && $isADHDContent) || 
                   ($hasAutism && $isAutismContent);
        });
        
        // Only apply filtering if we have results, otherwise show all videos
        if (!empty($filteredVideos)) {
            $allVideos = array_values($filteredVideos);
        }
        
        // Pagination
        $currentPage = $request->input('page', 1);
        $perPage = 9; // Number of videos per page - small number for children
        $totalVideos = count($allVideos);
        $totalPages = ceil($totalVideos / $perPage);
        
        // Ensure current page is valid
        if ($currentPage < 1) {
            $currentPage = 1;
        } elseif ($currentPage > $totalPages && $totalPages > 0) {
            $currentPage = $totalPages;
        }
        
        // Get videos for current page
        $offset = ($currentPage - 1) * $perPage;
        $videos = array_slice($allVideos, $offset, $perPage);
        
        // Get all learning values for display
        $learningValues = LearningValue::pluck('name', 'id')->toArray();
        return view('kid.videos.index', [
            'videos' => $videos,
            'childProfile' => $childProfile,
            'learningValues' => $learningValues,
            'currentPage' => $currentPage,
            'totalPages' => $totalPages
        ]);
    }
    
    public function show($id)
    {
        // Load videos from JSON file
        $videosJson = File::get(base_path('data/videos.json'));
        $videosData = json_decode($videosJson, true);
        $videos = $videosData['videos'] ?? [];
        
        // Find the specific video
        $video = null;
        foreach ($videos as $v) {
            if (isset($v['id']) && $v['id'] == $id) {
                $video = $v;
                break;
            }
        }
        
        if (!$video) {
            return redirect()->route('kid.videos.index')
                ->with('error', 'Video not found');
        }
        
        return view('kid.videos.show', [
            'video' => $video
        ]);
    }
}