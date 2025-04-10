@extends('layouts.kid_layout')

@section('title', $video['snippet']['title'] ?? 'Story Details')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="mb-6">
        <a href="{{ route('kid.stories.index') }}" class="inline-flex items-center text-indigo-600 hover:text-indigo-800">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
            </svg>
            Back to Stories
        </a>
    </div>

    <div class="bg-white rounded-xl shadow-lg overflow-hidden mb-8">
        <div class="relative aspect-video">
            <iframe 
                class="absolute top-0 left-0 w-full h-full"
                src="https://www.youtube.com/embed/{{ $video['id'] }}?autoplay=1&rel=0" 
                frameborder="0" 
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                allowfullscreen>
            </iframe>
        </div>
        
        <div class="p-6">
            <h1 class="text-2xl font-bold text-gray-800 mb-3">{{ $video['snippet']['title'] ?? 'Untitled Story' }}</h1>
            
            <div class="flex items-center mb-4">
                <span class="text-sm text-gray-500">
                    {{ \Carbon\Carbon::parse($video['snippet']['publishedAt'] ?? now())->format('F d, Y') }}
                </span>
                <span class="mx-2 text-gray-300">•</span>
                <button class="favorite-button text-gray-400 hover:text-yellow-500 flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z" />
                    </svg>
                    Add to Favorites
                </button>
            </div>
            
            <div class="border-t border-gray-200 pt-4">
                <p class="text-gray-700 whitespace-pre-line">{{ $video['snippet']['description'] ?? 'No description available' }}</p>
            </div>
        </div>
    </div>
    
    @if(count($relatedVideos) > 0)
    <div class="mb-12">
        <h2 class="text-2xl font-bold text-indigo-600 mb-6">More Stories You Might Like</h2>
        
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($relatedVideos as $relatedVideo)
            <a href="{{ route('kid.stories.show', $relatedVideo['id']) }}" class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition-all duration-300 hover:-translate-y-1 group">
                <div class="relative aspect-video">
                    <img src="{{ $relatedVideo['snippet']['thumbnails']['high']['url'] ?? asset('images/story-thumbnails/default-thumbnail.jpg') }}" 
                         alt="{{ $relatedVideo['snippet']['title'] ?? 'Related Story' }}" 
                         class="w-full h-full object-cover">
                    <div class="absolute inset-0 bg-black/20 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                        <div class="bg-white/80 rounded-full p-3 transform scale-90 group-hover:scale-100 transition-transform duration-300">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-indigo-600" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM9.555 7.168A1 1 0 008 8v4a1 1 0 001.555.832l3-2a1 1 0 000-1.664l-3-2z" clip-rule="evenodd" />
                            </svg>
                        </div>
                    </div>
                </div>
                <div class="p-4">
                    <h3 class="font-semibold text-gray-800 mb-1 line-clamp-2">{{ $relatedVideo['snippet']['title'] ?? 'Untitled Story' }}</h3>
                    <p class="text-sm text-gray-500">{{ \Carbon\Carbon::parse($relatedVideo['snippet']['publishedAt'] ?? now())->format('M d, Y') }}</p>
                </div>
            </a>
            @endforeach
        </div>
    </div>
    @endif
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Favorite button functionality
        const favoriteButton = document.querySelector('.favorite-button');
        favoriteButton.addEventListener('click', function() {
            this.classList.toggle('text-gray-400');
            this.classList.toggle('text-yellow-500');
            // In a real implementation, this would save the favorite status
        });
    });
</script>
@endsection