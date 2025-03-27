<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            RolesAndPermissionsSeeder::class,
            ContentCategorySeeder::class,
            LearningValueSeeder::class,
            AdditionalLearningValueSeeder::class,
        ]);
    }
}
