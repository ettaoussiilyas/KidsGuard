@extends('layouts.parent_layout')

@section('title', 'Child Profiles')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <div class="flex flex-col md:flex-row justify-between items-center mb-8">
        <h1 class="text-3xl font-bold text-gray-900 mb-4 md:mb-0">Child Profiles</h1>
        <a href="{{ route('parent.child-profiles.create') }}" class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-colors duration-200">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd" />
            </svg>
            Add New Child Profile
        </a>
    </div>

    @if(session('success'))
        <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6 rounded" role="alert">
            <p>{{ session('success') }}</p>
        </div>
    @endif

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @if(count($childProfiles) > 0)
            @foreach($childProfiles as $profile)
                <div class="bg-white overflow-hidden shadow-sm rounded-lg transition-all duration-200 hover:shadow-md">
                    <div class="bg-indigo-600 px-4 py-3">
                        <h2 class="text-lg font-semibold text-white">{{ $profile->name }} <span class="text-indigo-100 text-sm">({{ $profile->age ?? 'Age not set' }})</span></h2>
                    </div>
                    <div class="p-6 flex flex-col items-center">
                        <img src="{{ $profile->avatarUrl }}" alt="{{ $profile->name }}" class="w-24 h-24 rounded-full object-cover border-4 border-white shadow-md mb-4">
                        
                        <div class="flex flex-wrap justify-center gap-2 mb-4">
                            @if($profile->has_adhd)
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">ADHD</span>
                            @endif
                            @if($profile->has_autism)
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-purple-100 text-purple-800">Autism</span>
                            @endif
                        </div>
                        
                        @if($profile->special_needs)
                            <div class="w-full mb-3">
                                <h3 class="text-sm font-medium text-gray-500 mb-1">Special Needs</h3>
                                <p class="text-gray-700">{{ $profile->special_needs }}</p>
                            </div>
                        @endif
                        
                        @if($profile->interests)
                            <div class="w-full mb-4">
                                <h3 class="text-sm font-medium text-gray-500 mb-1">Interests</h3>
                                <p class="text-gray-700">{{ $profile->interests }}</p>
                            </div>
                        @endif
                        
                        <div class="flex space-x-3 mt-2">
                            <a href="{{ route('parent.child-profiles.edit', $profile) }}" class="inline-flex items-center px-3 py-1.5 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1.5 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                </svg>
                                Edit
                            </a>
                            <form action="{{ route('parent.child-profiles.destroy', $profile) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('Are you sure you want to delete this profile?')" class="inline-flex items-center px-3 py-1.5 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-red-700 bg-white hover:bg-red-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1.5 text-red-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                    </svg>
                                    Delete
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        @else
            <div class="col-span-3">
                <div class="bg-blue-50 border-l-4 border-blue-500 text-blue-700 p-6 rounded-md flex flex-col items-center">
                    <p class="text-lg mb-4">You haven't added any child profiles yet.</p>
                    <a href="{{ route('parent.child-profiles.create') }}" class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-colors duration-200">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd" />
                        </svg>
                        Add Your First Child
                    </a>
                </div>
            </div>
        @endif
    </div>
</div>
@endsection