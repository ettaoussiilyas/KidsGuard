@extends('layouts.admin_layout')

@section('title', 'Categories Management')

@section('content')
<div class="min-h-screen bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="flex flex-col sm:flex-row sm:justify-between sm:items-center mb-6">
            <h1 class="text-2xl font-bold text-gray-900 mb-3 sm:mb-0">Categories Management</h1>
            <a href="{{ route('admin.categories.create') }}" class="inline-flex items-center justify-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                <svg class="-ml-1 mr-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd" />
                </svg>
                Add Category
            </a>
        </div>

        @if(session('success'))
            <div class="mb-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
        @endif

        @if(session('error'))
            <div class="mb-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                <span class="block sm:inline">{{ session('error') }}</span>
            </div>
        @endif

        <div class="bg-white shadow overflow-hidden sm:rounded-md">
            <ul class="divide-y divide-gray-200">
                @forelse($categories as $category)
                    <li>
                        <div class="px-4 py-4 sm:px-6 flex flex-col sm:flex-row sm:items-center sm:justify-between">
                            <div class="flex items-center mb-3 sm:mb-0">
                                @if($category->icon)
                                    <div class="flex-shrink-0 h-10 w-10 mr-4">
                                        <img class="h-10 w-10 rounded-full object-cover" src="{{ asset($category->icon) }}" alt="{{ $category->name }}">
                                    </div>
                                @else
                                    <div class="flex-shrink-0 h-10 w-10 mr-4 bg-gray-200 rounded-full flex items-center justify-center">
                                        <svg class="h-6 w-6 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7" />
                                        </svg>
                                    </div>
                                @endif
                                <div>
                                    <div class="flex items-center">
                                        <h3 class="text-lg font-medium text-gray-900">{{ $category->name }}</h3>
                                        @if($category->is_special_needs)
                                            <span class="ml-2 px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-purple-100 text-purple-800">
                                                Special Needs
                                            </span>
                                        @endif
                                        @if(!$category->is_active)
                                            <span class="ml-2 px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                                Inactive
                                            </span>
                                        @endif
                                    </div>
                                    <div class="mt-1 text-sm text-gray-500">
                                        {{ $category->description ?? 'No description' }}
                                    </div>
                                    <div class="mt-1 text-xs text-gray-400">
                                        Order: {{ $category->display_order }} | Slug: {{ $category->slug }}
                                    </div>
                                </div>
                            </div>
                            <div class="flex flex-col space-y-2 sm:flex-row sm:space-y-0 sm:space-x-2 mt-2 sm:mt-0">
                                <a href="{{ route('admin.categories.edit', $category->id) }}" class="inline-flex justify-center items-center px-3 py-1 border border-transparent rounded-md text-sm font-medium text-indigo-600 bg-indigo-100 hover:bg-indigo-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                    Edit
                                </a>
                                <a href="{{ route('admin.categories.edit_values', $category->id) }}" class="inline-flex justify-center items-center px-3 py-1 border border-transparent rounded-md text-sm font-medium text-green-600 bg-green-100 hover:bg-green-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                                    Learning Values
                                </a>
                                <form action="{{ route('admin.categories.destroy', $category->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this category?');" class="inline-block w-full sm:w-auto">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="inline-flex justify-center items-center w-full px-3 py-1 border border-transparent rounded-md text-sm font-medium text-red-600 bg-red-100 hover:bg-red-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                                        Delete
                                    </button>
                                </form>
                            </div>
                        </div>
                    </li>
                @empty
                    <li class="px-4 py-4 sm:px-6 text-center text-gray-500">
                        No categories found. <a href="{{ route('admin.categories.create') }}" class="text-indigo-600 hover:text-indigo-900">Create one</a>.
                    </li>
                @endforelse
            </ul>
            <div class="px-4 py-3 bg-gray-50 border-t border-gray-200 sm:px-6">
                {{ $categories->links() }}
            </div>
        </div>
    </div>
</div>
@endsection