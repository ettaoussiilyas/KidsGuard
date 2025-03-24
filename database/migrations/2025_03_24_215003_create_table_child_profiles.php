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
        Schema::create('child_profiles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('parent_id')->constrained('users')->onDelete('cascade');
            $table->string('name');
            $table->integer('age');
            $table->string('avatar')->nullable();
            $table->enum('gender', ['girl', 'boy']);
            $table->boolean('has_adhd')->default(false);
            $table->boolean('has_autism')->default(false);
            $table->text('special_needs')->nullable();
            $table->text('interests')->nullable();
            $table->string('hobbies')->nullable();
            $table->string('skills')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('child_profiles');
    }
};
