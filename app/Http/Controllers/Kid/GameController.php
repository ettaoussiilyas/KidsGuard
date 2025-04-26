<?php

namespace App\Http\Controllers\Kid;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use App\Models\ChildProfile;
use App\Models\ChildProfilePreference;

class GameController extends Controller
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
        
        // Load games from JSON file
        $gamesJson = File::get(base_path('data/games.json'));
        $gamesData = json_decode($gamesJson, true);
        $allGames = $gamesData['games'] ?? [];
        
        // Create arrays to store special needs games and preference-matched games
        $specialNeedsGames = [];
        $preferenceGames = [];
        
        // Filter and categorize games
        foreach ($allGames as $game) {
            // Handle both single category_id and array of category_ids
            $gameCategories = is_array($game['category_id']) 
                ? $game['category_id'] 
                : [$game['category_id']];
            
            $gameValues = (array) ($game['educational_value_id'] ?? []);
            
            // Check for special needs matches
            $isADHDContent = in_array(6, $gameCategories); // ADHD category
            $isAutismContent = in_array(7, $gameCategories); // Autism category
            
            // Check if this game matches the child's special needs
            $matchesSpecialNeeds = ($hasADHD && $isADHDContent) || ($hasAutism && $isAutismContent);
            
            // Check for preference matches
            $hasPreferenceMatch = !empty(array_intersect($gameValues, $preferences));
            
            // Add to appropriate array
            if ($matchesSpecialNeeds) {
                $specialNeedsGames[] = $game;
            } elseif ($hasPreferenceMatch) {
                $preferenceGames[] = $game;
            }
        }
        
        // Combine arrays with special needs games first
        $filteredGames = array_merge($specialNeedsGames, $preferenceGames);
        
        // If no games match, show all games
        if (empty($filteredGames)) {
            $filteredGames = $allGames;
        }
        
        // Pagination
        $currentPage = $request->input('page', 1);
        $perPage = 12; // Number of games per page
        $totalGames = count($filteredGames);
        $totalPages = ceil($totalGames / $perPage);
        
        // Ensure current page is valid
        if ($currentPage < 1) {
            $currentPage = 1;
        } elseif ($currentPage > $totalPages && $totalPages > 0) {
            $currentPage = $totalPages;
        }
        
        // Get games for current page
        $offset = ($currentPage - 1) * $perPage;
        $games = array_slice($filteredGames, $offset, $perPage);
        
        return view('kid.games.index', [
            'games' => $games,
            'childProfile' => $childProfile,
            'currentPage' => $currentPage,
            'totalPages' => $totalPages
        ]);
    }
    
    // Rest of the controller remains unchanged
    public function show($id)
    {
        // Load games from JSON file
        $gamesJson = File::get(base_path('data/games.json'));
        $gamesData = json_decode($gamesJson, true);
        $games = $gamesData['games'] ?? [];
        
        // Find the specific game
        $game = null;
        foreach ($games as $g) {
            if (isset($g['id']) && $g['id'] == $id) {
                $game = $g;
                break;
            }
        }
        
        if (!$game) {
            return redirect()->route('kid.games.index')
                ->with('error', 'Game not found');
        }
        
        return view('kid.games.show', [
            'game' => $game
        ]);
    }
}