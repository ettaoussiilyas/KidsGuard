<?php

namespace App\Http\Controllers\Parent;

use App\Http\Controllers\Controller;
use App\Models\ChildProfile;
use App\Models\ContentCategory;
use App\Models\LearningValue;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChildPreferenceController extends Controller
{
    public function index()
    {
        // Get all child profiles for the current parent
        // Changed user_id to parent_id to match your database schema
        $childProfiles = ChildProfile::where('parent_id', Auth::id())->get();
        
        return view('parent.preferences.index', compact('childProfiles'));
    }
    
    public function show(ChildProfile $kid, Request $request)
    {
        // Get all categories
        $categories = ContentCategory::where('is_active', true)
            ->orderBy('display_order')
            ->with(['learningValues' => function($query) {
                $query->where('is_active', true);
            }])
            ->get();
            
        // Filter special needs categories based on child profile
        $filteredCategories = $categories->filter(function($category) use ($kid) {
            if (!$category->is_special_needs) {
                return true;
            }
            
            if ($category->slug === 'adhd' && $kid->has_adhd) {
                return true;
            }
            
            if ($category->slug === 'autism' && $kid->has_autism) {
                return true;
            }
            
            return false;
        })->values();
        
        // Get child's selected learning values
        $selectedValues = $kid->learningValues->pluck('id')->toArray();
        
        // If AJAX request, return JSON with properly formatted paths
        if ($request->ajax() || $request->query('ajax') === 'true') {
            // Format the categories for JSON response
            $formattedCategories = $filteredCategories->map(function($category) {
                // Ensure category icon has the correct full path
                $categoryIcon = $category->icon;
                if (!str_starts_with($categoryIcon, '/')) {
                    $categoryIcon = '/' . $categoryIcon;
                }
                
                // Format learning values
                $learningValues = $category->learningValues->map(function($value) {
                    // Ensure value icon has the correct full path
                    $valueIcon = $value->icon;
                    if (!str_starts_with($valueIcon, '/')) {
                        $valueIcon = '/' . $valueIcon;
                    }
                    
                    return [
                        'id' => $value->id,
                        'name' => $value->name,
                        'icon' => $valueIcon,
                        'color' => $value->color,
                        'background_color' => $value->background_color
                    ];
                });
                
                return [
                    'id' => $category->id,
                    'name' => $category->name,
                    'slug' => $category->slug,
                    'icon' => $categoryIcon,
                    'color' => $category->color,
                    'is_special_needs' => $category->is_special_needs,
                    'learning_values' => $learningValues
                ];
            });
            
            return response()->json([
                'categories' => $formattedCategories,
                'selected_values' => $selectedValues
            ]);
        }
        
        // Otherwise return view
        return view('parent.preferences.show', compact('kid', 'categories', 'selectedValues'));
    }
    
    public function update(Request $request, ChildProfile $kid)
    {
        $validatedData = $request->validate([
            'learning_values' => 'nullable|array',
            'learning_values.*' => 'exists:learning_values,id',
        ]);
        
        // Sync the learning values
        $kid->learningValues()->sync($validatedData['learning_values'] ?? []);
        
        return redirect()
            ->route('parent.preferences.show', $kid)
            ->with('success', 'Preferences updated successfully');
    }
}