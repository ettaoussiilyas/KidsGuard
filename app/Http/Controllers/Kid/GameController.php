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
        
        // Load games from JSON file
        $gamesJson = File::get(base_path('data/games.json'));
        $gamesData = json_decode($gamesJson, true);
        $allGames = $gamesData['games'] ?? [];
        
        // Filter games based on preferences if needed
        // This is a placeholder - you would implement actual filtering logic
        // based on your application's requirements
        
        // Pagination
        $currentPage = $request->input('page', 1);
        $perPage = 9; // Number of games per page - small number for children
        $totalGames = count($allGames);
        $totalPages = ceil($totalGames / $perPage);
        
        // Ensure current page is valid
        if ($currentPage < 1) {
            $currentPage = 1;
        } elseif ($currentPage > $totalPages && $totalPages > 0) {
            $currentPage = $totalPages;
        }
        
        // Get games for current page
        $offset = ($currentPage - 1) * $perPage;
        $games = array_slice($allGames, $offset, $perPage);
        
        return view('kid.games.index', [
            'games' => $games,
            'childProfile' => $childProfile,
            'currentPage' => $currentPage,
            'totalPages' => $totalPages
        ]);
    }
    
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