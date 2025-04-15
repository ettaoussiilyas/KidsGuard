<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContentCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * Display a listing of the categories.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $categories = ContentCategory::orderBy('display_order')->paginate(10);
        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new category.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created category in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'icon' => 'nullable|image|max:1024',
            'color' => 'nullable|string|max:20',
            'is_special_needs' => 'boolean',
            'display_order' => 'nullable|integer',
            'is_active' => 'boolean',
        ]);

        // Generate slug from name
        $validated['slug'] = Str::slug($validated['name']);
        
        // Set checkbox values
        $validated['is_special_needs'] = $request->has('is_special_needs') ? true : false;
        $validated['is_active'] = $request->has('is_active') ? true : false;
        
        // Set default display order if not provided
        if (!isset($validated['display_order'])) {
            $validated['display_order'] = ContentCategory::max('display_order') + 1;
        }
        
        // Handle icon upload - store directly in public folder
        if ($request->hasFile('icon')) {
            $iconFile = $request->file('icon');
            $filename = time() . '_' . Str::slug($validated['name']) . '.' . $iconFile->getClientOriginalExtension();
            $iconFile->move(public_path('images/icons/categories'), $filename);
            $validated['icon'] = 'images/icons/categories/' . $filename;
        }

        ContentCategory::create($validated);

        return redirect()->route('admin.categories.index')
            ->with('success', 'Category created successfully.');
    }

    /**
     * Update the specified category in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $category = ContentCategory::findOrFail($id);
        
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'icon' => 'nullable|image|max:1024',
            'color' => 'nullable|string|max:20',
            'is_special_needs' => 'boolean',
            'display_order' => 'nullable|integer',
            'is_active' => 'boolean',
        ]);

        // Update slug only if name has changed
        if ($category->name !== $validated['name']) {
            $validated['slug'] = Str::slug($validated['name']);
        }
        
        // Set checkbox values
        $validated['is_special_needs'] = $request->has('is_special_needs') ? true : false;
        $validated['is_active'] = $request->has('is_active') ? true : false;
        
        // Handle icon upload - store directly in public folder
        if ($request->hasFile('icon')) {
            // Delete old icon if exists
            if ($category->icon && file_exists(public_path($category->icon))) {
                unlink(public_path($category->icon));
            }
            
            $iconFile = $request->file('icon');
            $filename = time() . '_' . Str::slug($validated['name']) . '.' . $iconFile->getClientOriginalExtension();
            $iconFile->move(public_path('images/icons/categories'), $filename);
            $validated['icon'] = 'images/icons/categories/' . $filename;
        }

        $category->update($validated);

        return redirect()->route('admin.categories.index')
            ->with('success', 'Category updated successfully.');
    }

    /**
     * Remove the specified category from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $category = ContentCategory::findOrFail($id);
        
        // Check if category has learning values
        if ($category->learningValues()->count() > 0) {
            return redirect()->route('admin.categories.index')
                ->with('error', 'Cannot delete category with associated learning values.');
        }
        
        // Delete icon if exists
        if ($category->icon && file_exists(public_path($category->icon))) {
            unlink(public_path($category->icon));
        }
        
        $category->delete();

        return redirect()->route('admin.categories.index')
            ->with('success', 'Category deleted successfully.');
    }
}