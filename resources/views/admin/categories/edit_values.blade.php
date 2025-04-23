@extends('layouts.admin_layout')

@section('title', 'Edit Category Learning Values')

@section('content')
<div class="min-h-screen bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <!-- Header with back button -->
        <div class="mb-8 flex items-center">
            <a href="{{ route('admin.categories.index') }}" class="mr-4 text-blue-600 hover:text-blue-800">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
            </a>
            <h1 class="text-3xl font-bold text-gray-900">Edit Learning Values: {{ $category->name }}</h1>
        </div>

        @if(session('success'))
            <div class="mb-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
        @endif

        <!-- Edit Form -->
        <div class="bg-white shadow overflow-hidden sm:rounded-lg">
            <form action="{{ route('admin.categories.update_values', $category->id) }}" method="POST">
                @csrf
                @method('PUT')
                
                <div class="px-4 py-5 sm:p-6">
                    <div class="mb-6">
                        <h2 class="text-lg font-medium text-gray-900">Select Learning Values</h2>
                        <p class="mt-1 text-sm text-gray-500">Choose the learning values that belong to this category.</p>
                    </div>
                    
                    <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 md:grid-cols-3">
                        @foreach($allLearningValues as $value)
                            <div class="relative flex items-start">
                                <div class="flex items-center h-5">
                                    <input id="value-{{ $value->id }}" 
                                           name="learning_values[]" 
                                           type="checkbox" 
                                           value="{{ $value->id }}" 
                                           {{ in_array($value->id, $selectedValues) ? 'checked' : '' }}
                                           class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
                                </div>
                                <div class="ml-3 text-sm">
                                    <label for="value-{{ $value->id }}" class="font-medium text-gray-700 flex items-center">
                                        @if($value->icon)
                                            <img src="{{ asset($value->icon) }}" alt="{{ $value->name }}" class="h-6 w-6 mr-2">
                                        @endif
                                        {{ $value->name }}
                                    </label>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                    <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                        Save Learning Values
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection