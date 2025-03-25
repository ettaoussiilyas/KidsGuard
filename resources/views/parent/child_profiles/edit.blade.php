@extends('layouts.parent_layout')

@section('title', 'Edit Child Profile')

@section('content')
<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <div class="bg-white shadow-md rounded-lg overflow-hidden">
        <div class="bg-indigo-600 px-6 py-4">
            <h1 class="text-xl font-bold text-white">Edit Child Profile: {{ $childProfile->name }}</h1>
        </div>
        <div class="p-6">
            <form action="{{ route('parent.child-profiles.update', $childProfile) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                
                <div class="flex justify-center mb-6">
                    <img src="{{ $childProfile->avatarUrl }}" alt="{{ $childProfile->name }}" class="w-32 h-32 rounded-full object-cover border-4 border-indigo-100 shadow-md">
                </div>
                
                <div class="mb-6">
                    <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Child's Name</label>
                    <input type="text" class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 @error('name') border-red-500 @enderror" 
                        id="name" name="name" value="{{ old('name', $childProfile->name) }}" required>
                    @error('name')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                
                <div class="mb-6">
                    <label for="gender" class="block text-sm font-medium text-gray-700 mb-1">Gender</label>
                    <select name="gender" id="gender" class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 @error('gender') border-red-500 @enderror">
                        <option value="">Select gender</option>
                        <option value="boy" {{ old('gender', $childProfile->gender) == 'boy' ? 'selected' : '' }}>Boy</option>
                        <option value="girl" {{ old('gender', $childProfile->gender) == 'girl' ? 'selected' : '' }}>Girl</option>
                    </select>
                    @error('gender')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                
                <div class="mb-6">
                    <label for="age" class="block text-sm font-medium text-gray-700 mb-1">Age</label>
                    <input type="number" class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 @error('age') border-red-500 @enderror" 
                        id="age" name="age" value="{{ old('age', $childProfile->age) }}" min="1" max="18">
                    @error('age')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                
                <div class="mb-6">
                    <label for="avatar" class="block text-sm font-medium text-gray-700 mb-1">Profile Picture</label>
                    <input type="file" class="w-full text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100 @error('avatar') border-red-500 @enderror" 
                        id="avatar" name="avatar">
                    <p class="mt-1 text-sm text-gray-500">Leave empty to keep current picture. Max size: 1MB</p>
                    @error('avatar')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                
                <div class="mb-6 space-y-3">
                    <div class="flex items-start">
                        <div class="flex items-center h-5">
                            <input type="checkbox" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded" 
                                id="has_adhd" name="has_adhd" value="1" {{ old('has_adhd', $childProfile->has_adhd) ? 'checked' : '' }}>
                        </div>
                        <div class="ml-3 text-sm">
                            <label for="has_adhd" class="font-medium text-gray-700">Has ADHD</label>
                        </div>
                    </div>
                    
                    <div class="flex items-start">
                        <div class="flex items-center h-5">
                            <input type="checkbox" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded" 
                                id="has_autism" name="has_autism" value="1" {{ old('has_autism', $childProfile->has_autism) ? 'checked' : '' }}>
                        </div>
                        <div class="ml-3 text-sm">
                            <label for="has_autism" class="font-medium text-gray-700">Has Autism</label>
                        </div>
                    </div>
                </div>
                
                <div class="mb-6">
                    <label for="special_needs" class="block text-sm font-medium text-gray-700 mb-1">Special Needs</label>
                    <textarea class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 @error('special_needs') border-red-500 @enderror" 
                        id="special_needs" name="special_needs" rows="3">{{ old('special_needs', $childProfile->special_needs) }}</textarea>
                    @error('special_needs')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                
                <div class="mb-6">
                    <label for="interests" class="block text-sm font-medium text-gray-700 mb-1">Interests</label>
                    <textarea class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 @error('interests') border-red-500 @enderror" 
                        id="interests" name="interests" rows="3">{{ old('interests', $childProfile->interests) }}</textarea>
                    <p class="mt-1 text-sm text-gray-500">What does your child like? (e.g., dinosaurs, space, princesses)</p>
                    @error('interests')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                
                <div class="flex justify-end space-x-3">
                    <a href="{{ route('parent.child-profiles.index') }}" class="inline-flex items-center px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Cancel
                    </a>
                    <button type="submit" class="inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Update Profile
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection