<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('category_learning_value', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->constrained('content_categories')->onDelete('cascade');
            $table->foreignId('learning_value_id')->constrained('learning_values')->onDelete('cascade');
            $table->timestamps();
            
            // Add unique constraint to prevent duplicates
            $table->unique(['category_id', 'learning_value_id']);
        });
        
        // Migrate existing data from learning_values.category_id to the pivot table
        if (Schema::hasColumn('learning_values', 'category_id')) {
            $learningValues = DB::table('learning_values')
                ->whereNotNull('category_id')
                ->select('id', 'category_id')
                ->get();
                
            foreach ($learningValues as $value) {
                DB::table('category_learning_value')->insert([
                    'category_id' => $value->category_id,
                    'learning_value_id' => $value->id,
                    'created_at' => now(),
                    'updated_at' => now()
                ]);
            }
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('category_learning_value');
    }
};