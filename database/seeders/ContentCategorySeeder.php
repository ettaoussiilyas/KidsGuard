<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ContentCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Cartoons',
                'slug' => 'cartoons',
                'icon' => 'images/icons/categories/cartoons.png',
                'color' => '#4F46E5', // indigo-600
                'description' => 'Animated content for children',
                'is_special_needs' => false,
                'display_order' => 1,
            ],
            [
                'name' => 'Games',
                'slug' => 'games',
                'icon' => 'images/icons/categories/games.png',
                'color' => '#10B981', // emerald-500
                'description' => 'Interactive games for learning and fun',
                'is_special_needs' => false,
                'display_order' => 2,
            ],
            [
                'name' => 'Stories',
                'slug' => 'stories',
                'icon' => 'images/icons/categories/stories.png',
                'color' => '#F59E0B', // amber-500
                'description' => 'Stories and books for children',
                'is_special_needs' => false,
                'display_order' => 3,
            ],
            [
                'name' => 'Learning',
                'slug' => 'learning',
                'icon' => 'images/icons/categories/learning.png',
                'color' => '#3B82F6', // blue-500
                'description' => 'Educational content for children',
                'is_special_needs' => false,
                'display_order' => 4,
            ],
            [
                'name' => 'Favorites',
                'slug' => 'favorites',
                'icon' => 'images/icons/categories/favorites.png',
                'color' => '#EC4899', // pink-500
                'description' => 'Child\'s favorite content',
                'is_special_needs' => false,
                'display_order' => 5,
            ],
            [
                'name' => 'ADHD',
                'slug' => 'adhd',
                'icon' => 'images/icons/categories/adhd.png',
                'color' => '#8B5CF6', // violet-500
                'description' => 'Content specifically designed for children with ADHD',
                'is_special_needs' => true,
                'display_order' => 6,
            ],
            [
                'name' => 'Autism',
                'slug' => 'autism',
                'icon' => 'images/icons/categories/autism.png',
                'color' => '#06B6D4', // cyan-500
                'description' => 'Content specifically designed for children with autism',
                'is_special_needs' => true,
                'display_order' => 7,
            ],
        ];

        foreach ($categories as $category) {
            DB::table('content_categories')->insert([
                'name' => $category['name'],
                'slug' => $category['slug'],
                'icon' => $category['icon'],
                'color' => $category['color'],
                'description' => $category['description'],
                'is_special_needs' => $category['is_special_needs'],
                'display_order' => $category['display_order'],
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}