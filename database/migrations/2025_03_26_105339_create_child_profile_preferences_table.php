<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('child_profile_preferences', function (Blueprint $table) {
            $table->id();
            $table->foreignId('child_profile_id')->constrained()->onDelete('cascade');
            $table->foreignId('learning_value_id')->constrained('learning_values')->onDelete('cascade');
            $table->timestamps();
            
            // Prevent duplicate preferences
            $table->unique(['child_profile_id', 'learning_value_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('child_profile_preferences');
    }
};