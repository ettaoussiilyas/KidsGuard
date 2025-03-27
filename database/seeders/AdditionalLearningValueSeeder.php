<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class AdditionalLearningValueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Get category IDs for the empty categories
        $stories = DB::table('content_categories')->where('slug', 'stories')->first()->id;
        $learning = DB::table('content_categories')->where('slug', 'learning')->first()->id;
        $favorites = DB::table('content_categories')->where('slug', 'favorites')->first()->id;

        // Reuse existing icons
        $moralsIcon = DB::table('learning_values')->where('slug', 'morals')->first()->icon;
        $scienceIcon = DB::table('learning_values')->where('slug', 'science')->first()->icon;
        $concentrationIcon = DB::table('learning_values')->where('slug', 'concentration')->first()->icon;
        $socialSolidarityIcon = DB::table('learning_values')->where('slug', 'social-solidarity')->first()->icon;
        $parentalLoveIcon = DB::table('learning_values')->where('slug', 'parental-love')->first()->icon;

        $values = [
            // Stories values
            [
                'category_id' => $stories,
                'name' => 'Imagination',
                'slug' => 'imagination',
                'description' => 'Stories that stimulate imagination and creativity',
                'icon' => $concentrationIcon,
                'color' => '#F59E0B', // amber-500
                'background_color' => '#FFFBEB', // amber-50
            ],
            [
                'category_id' => $stories,
                'name' => 'Empathy',
                'slug' => 'empathy',
                'description' => 'Stories that help develop empathy and understanding of others',
                'icon' => $parentalLoveIcon,
                'color' => '#EC4899', // pink-500
                'background_color' => '#FCE7F3', // pink-50
            ],
            [
                'category_id' => $stories,
                'name' => 'Vocabulary',
                'slug' => 'vocabulary',
                'description' => 'Stories that enhance language skills and vocabulary',
                'icon' => $socialSolidarityIcon,
                'color' => '#4F46E5', // indigo-600
                'background_color' => '#EEF2FF', // indigo-50
            ],
            [
                'category_id' => $stories,
                'name' => 'Morals',
                'slug' => 'morals-stories',
                'description' => 'Stories that teach moral values and life lessons',
                'icon' => $moralsIcon,
                'color' => '#4F46E5', // indigo-600
                'background_color' => '#EEF2FF', // indigo-50
            ],
            
            // Learning values
            [
                'category_id' => $learning,
                'name' => 'Mathematics',
                'slug' => 'mathematics',
                'description' => 'Content that teaches mathematical concepts',
                'icon' => $scienceIcon,
                'color' => '#3B82F6', // blue-500
                'background_color' => '#EFF6FF', // blue-50
            ],
            [
                'category_id' => $learning,
                'name' => 'Science',
                'slug' => 'science-learning',
                'description' => 'Educational content about scientific concepts',
                'icon' => $scienceIcon,
                'color' => '#3B82F6', // blue-500
                'background_color' => '#EFF6FF', // blue-50
            ],
            [
                'category_id' => $learning,
                'name' => 'Language',
                'slug' => 'language',
                'description' => 'Content that develops language and communication skills',
                'icon' => $socialSolidarityIcon,
                'color' => '#10B981', // emerald-500
                'background_color' => '#ECFDF5', // emerald-50
            ],
            [
                'category_id' => $learning,
                'name' => 'History',
                'slug' => 'history',
                'description' => 'Educational content about historical events and figures',
                'icon' => $moralsIcon,
                'color' => '#F59E0B', // amber-500
                'background_color' => '#FFFBEB', // amber-50
            ],
            [
                'category_id' => $learning,
                'name' => 'Problem Solving',
                'slug' => 'problem-solving-learning',
                'description' => 'Content that develops critical thinking and problem-solving skills',
                'icon' => $concentrationIcon,
                'color' => '#10B981', // emerald-500
                'background_color' => '#ECFDF5', // emerald-50
            ],
            
            // Favorites values
            [
                'category_id' => $favorites,
                'name' => 'Most Watched',
                'slug' => 'most-watched',
                'description' => 'Content that the child watches most frequently',
                'icon' => $parentalLoveIcon,
                'color' => '#EC4899', // pink-500
                'background_color' => '#FCE7F3', // pink-50
            ],
            [
                'category_id' => $favorites,
                'name' => 'Recommended',
                'slug' => 'recommended',
                'description' => 'Content recommended based on child\'s preferences',
                'icon' => $concentrationIcon,
                'color' => '#8B5CF6', // violet-500
                'background_color' => '#F5F3FF', // violet-50
            ],
            [
                'category_id' => $favorites,
                'name' => 'Saved',
                'slug' => 'saved',
                'description' => 'Content saved by the child or parent for later viewing',
                'icon' => $socialSolidarityIcon,
                'color' => '#F59E0B', // amber-500
                'background_color' => '#FFFBEB', // amber-50
            ],
        ];

        foreach ($values as $value) {
            DB::table('learning_values')->insert([
                'category_id' => $value['category_id'],
                'name' => $value['name'],
                'slug' => $value['slug'],
                'description' => $value['description'],
                'icon' => $value['icon'],
                'color' => $value['color'],
                'background_color' => $value['background_color'],
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}