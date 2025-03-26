<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class LearningValueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Get category IDs
        $cartoons = DB::table('content_categories')->where('slug', 'cartoons')->first()->id;
        $games = DB::table('content_categories')->where('slug', 'games')->first()->id;
        $stories = DB::table('content_categories')->where('slug', 'stories')->first()->id;
        $learning = DB::table('content_categories')->where('slug', 'learning')->first()->id;
        $adhd = DB::table('content_categories')->where('slug', 'adhd')->first()->id;
        $autism = DB::table('content_categories')->where('slug', 'autism')->first()->id;

        $values = [
            // Cartoons values
            [
                'category_id' => $cartoons,
                'name' => 'Morals',
                'slug' => 'morals',
                'description' => 'Content that teaches moral values',
                'icon' => 'images/icons/values/morals.png',
                'color' => '#4F46E5', // indigo-600
                'background_color' => '#EEF2FF', // indigo-50
            ],
            [
                'category_id' => $cartoons,
                'name' => 'Parental Love',
                'slug' => 'parental-love',
                'description' => 'Content that emphasizes family bonds',
                'icon' => 'images/icons/values/parental-love.png',
                'color' => '#EC4899', // pink-500
                'background_color' => '#FCE7F3', // pink-50
            ],
            [
                'category_id' => $cartoons,
                'name' => 'Social Solidarity',
                'slug' => 'social-solidarity',
                'description' => 'Content that teaches cooperation and helping others',
                'icon' => 'images/icons/values/social-solidarity.png',
                'color' => '#F59E0B', // amber-500
                'background_color' => '#FFFBEB', // amber-50
            ],
            [
                'category_id' => $cartoons,
                'name' => 'Science',
                'slug' => 'science',
                'description' => 'Content that teaches scientific concepts',
                'icon' => 'images/icons/values/science.png',
                'color' => '#3B82F6', // blue-500
                'background_color' => '#EFF6FF', // blue-50
            ],
            [
                'category_id' => $cartoons,
                'name' => 'Concentration',
                'slug' => 'concentration',
                'description' => 'Content that helps improve focus',
                'icon' => 'images/icons/values/concentration.png',
                'color' => '#8B5CF6', // violet-500
                'background_color' => '#F5F3FF', // violet-50
            ],
            
            // Games values
            [
                'category_id' => $games,
                'name' => 'Problem Solving',
                'slug' => 'problem-solving',
                'description' => 'Games that develop problem-solving skills',
                'icon' => 'images/icons/values/problem-solving.png',
                'color' => '#10B981', // emerald-500
                'background_color' => '#ECFDF5', // emerald-50
            ],
            [
                'category_id' => $games,
                'name' => 'Hand-Eye Coordination',
                'slug' => 'hand-eye-coordination',
                'description' => 'Games that improve motor skills',
                'icon' => 'images/icons/values/hand-eye-coordination.png',
                'color' => '#06B6D4', // cyan-500
                'background_color' => '#ECFEFF', // cyan-50
            ],
            [
                'category_id' => $games,
                'name' => 'Teamwork',
                'slug' => 'teamwork',
                'description' => 'Games that encourage collaboration',
                'icon' => 'images/icons/values/teamwork.png',
                'color' => '#F59E0B', // amber-500
                'background_color' => '#FFFBEB', // amber-50
            ],
            [
                'category_id' => $games,
                'name' => 'Creativity',
                'slug' => 'creativity',
                'description' => 'Games that foster creative thinking',
                'icon' => 'images/icons/values/creativity.png',
                'color' => '#EC4899', // pink-500
                'background_color' => '#FCE7F3', // pink-50
            ],
            
            // ADHD values
            [
                'category_id' => $adhd,
                'name' => 'Focus Training',
                'slug' => 'focus-training',
                'description' => 'Content that helps improve focus for children with ADHD',
                'icon' => 'images/icons/values/focus-training.png',
                'color' => '#8B5CF6', // violet-500
                'background_color' => '#F5F3FF', // violet-50
            ],
            [
                'category_id' => $adhd,
                'name' => 'Impulse Control',
                'slug' => 'impulse-control',
                'description' => 'Content that helps with impulse control',
                'icon' => 'images/icons/values/impulse-control.png',
                'color' => '#3B82F6', // blue-500
                'background_color' => '#EFF6FF', // blue-50
            ],
            
            // Autism values
            [
                'category_id' => $autism,
                'name' => 'Social Cues',
                'slug' => 'social-cues',
                'description' => 'Content that helps understand social interactions',
                'icon' => 'images/icons/values/social-cues.png',
                'color' => '#06B6D4', // cyan-500
                'background_color' => '#ECFEFF', // cyan-50
            ],
            [
                'category_id' => $autism,
                'name' => 'Sensory Regulation',
                'slug' => 'sensory-regulation',
                'description' => 'Content that helps with sensory processing',
                'icon' => 'images/icons/values/sensory-regulation.png',
                'color' => '#10B981', // emerald-500
                'background_color' => '#ECFDF5', // emerald-50
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