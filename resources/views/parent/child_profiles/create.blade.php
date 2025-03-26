@extends('layouts.parent_layout')

@section('title', 'Add Child Profile')

@section('content')
<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-4 sm:py-8">
    <div class="bg-white shadow-md rounded-lg overflow-hidden" id="profile-card">
        <div class="bg-indigo-600 px-4 sm:px-6 py-3 sm:py-4" id="profile-header">
            <h1 class="text-lg sm:text-xl font-bold text-white">Add New Child Profile</h1>
        </div>
        <div class="p-4 sm:p-6">
            <form action="{{ route('parent.child-profiles.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 sm:gap-6">
                    <div class="mb-4 sm:mb-0">
                        <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Child's Name</label>
                        <input type="text" class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 @error('name') border-red-500 @enderror" 
                            id="name" name="name" value="{{ old('name') }}" >
                        @error('name')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div class="mb-4 sm:mb-0">
                        <label for="gender" class="block text-sm font-medium text-gray-700 mb-1">Gender</label>
                        <select name="gender" id="gender" class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 @error('gender') border-red-500 @enderror" onchange="updateProfileColor()">
                            <option value="">Select gender</option>
                            <option value="boy" {{ old('gender') == 'boy' ? 'selected' : '' }}>Boy</option>
                            <option value="girl" {{ old('gender') == 'girl' ? 'selected' : '' }}>Girl</option>
                        </select>
                        @error('gender')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                
                <div class="mt-4 sm:mt-6 mb-4 sm:mb-6">
                    <label for="age" class="block text-sm font-medium text-gray-700 mb-1">Age</label>
                    <input type="number" class="w-full sm:w-1/3 rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 @error('age') border-red-500 @enderror" 
                        id="age" name="age" value="{{ old('age') }}">
                    @error('age')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                
                <div class="mb-4 sm:mb-6">
                    <label for="avatar" class="block text-sm font-medium text-gray-700 mb-1">Profile Picture</label>
                    <input type="file" class="w-full text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100 @error('avatar') border-red-500 @enderror" 
                        id="avatar" name="avatar">
                    <p class="mt-1 text-sm text-gray-500">Optional. Max size: 1MB</p>
                    @error('avatar')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 sm:gap-6 mb-4 sm:mb-6">
                    <div class="space-y-3">
                        <h3 class="text-sm font-medium text-gray-700">Special Needs</h3>
                        <div class="flex items-start">
                            <div class="flex items-center h-5">
                                <input type="checkbox" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded" 
                                    id="has_adhd" name="has_adhd" value="1" {{ old('has_adhd') ? 'checked' : '' }}>
                            </div>
                            <div class="ml-3 text-sm">
                                <label for="has_adhd" class="font-medium text-gray-700">Has ADHD</label>
                            </div>
                        </div>
                        
                        <div class="flex items-start">
                            <div class="flex items-center h-5">
                                <input type="checkbox" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded" 
                                    id="has_autism" name="has_autism" value="1" {{ old('has_autism') ? 'checked' : '' }}>
                            </div>
                            <div class="ml-3 text-sm">
                                <label for="has_autism" class="font-medium text-gray-700">Has Autism</label>
                            </div>
                        </div>
                    </div>
                    
                    <div>
                        <label for="special_needs" class="block text-sm font-medium text-gray-700 mb-1">Other Special Needs</label>
                        <textarea class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 @error('special_needs') border-red-500 @enderror" 
                            id="special_needs" name="special_needs" rows="3">{{ old('special_needs') }}</textarea>
                        @error('special_needs')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                
                <div class="mb-6">
                    <label for="interests" class="block text-sm font-medium text-gray-700 mb-1">Interests</label>
                    <textarea class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 @error('interests') border-red-500 @enderror" 
                        id="interests" name="interests" rows="3">{{ old('interests') }}</textarea>
                    <p class="mt-1 text-sm text-gray-500">What does your child like? (e.g., dinosaurs, space, princesses)</p>
                    @error('interests')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                
                <div class="flex flex-col sm:flex-row justify-end space-y-3 sm:space-y-0 sm:space-x-3">
                    <a href="{{ route('parent.child-profiles.index') }}" class="w-full sm:w-auto inline-flex justify-center items-center px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Cancel
                    </a>
                    <button type="submit" class="w-full sm:w-auto inline-flex justify-center items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" id="submit-button">
                        Create Profile
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    // Function to update the profile card color based on gender selection
    function updateProfileColor() {
        const genderSelect = document.getElementById('gender');
        const profileHeader = document.getElementById('profile-header');
        const profileCard = document.getElementById('profile-card');
        const submitButton = document.getElementById('submit-button');
        const fileInput = document.querySelector('input[type="file"]');
        
        if (genderSelect.value === 'girl') {
            // Pink theme for girls
            profileHeader.className = 'bg-pink-500 px-4 sm:px-6 py-3 sm:py-4';
            profileCard.className = 'bg-white shadow-md rounded-lg overflow-hidden bg-pink-50';
            submitButton.className = 'w-full sm:w-auto inline-flex justify-center items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-pink-500 hover:bg-pink-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-pink-500';
            fileInput.className = 'w-full text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-pink-50 file:text-pink-700 hover:file:bg-pink-100';
        } else if (genderSelect.value === 'boy') {
            // Blue theme for boys
            profileHeader.className = 'bg-indigo-600 px-4 sm:px-6 py-3 sm:py-4';
            profileCard.className = 'bg-white shadow-md rounded-lg overflow-hidden';
            submitButton.className = 'w-full sm:w-auto inline-flex justify-center items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500';
            fileInput.className = 'w-full text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100';
        } else {
            // Default theme - purple gradient
            profileHeader.className = 'bg-gradient-to-r from-indigo-500 to-pink-500 px-4 sm:px-6 py-3 sm:py-4';
            profileCard.className = 'bg-white shadow-md rounded-lg overflow-hidden';
            submitButton.className = 'w-full sm:w-auto inline-flex justify-center items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-gradient-to-r from-indigo-500 to-pink-500 hover:from-indigo-600 hover:to-pink-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500';
            fileInput.className = 'w-full text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-purple-50 file:text-purple-700 hover:file:bg-purple-100';
        }
    }
    
    // Run once on page load to handle pre-selected values
    document.addEventListener('DOMContentLoaded', function() {
        updateProfileColor();
    });
</script>
@endsection