@extends('layouts.kid_layout')

@section('title', 'Videos')

@section('content')
<div class="container mx-auto px-4 py-8">
    
    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-8 gap-4">
        <h1 class="text-3xl font-bold text-indigo-600">My Videos</h1>
        
        <div class="flex flex-wrap gap-2">
            <button id="all-videos" class="bg-indigo-500 hover:bg-indigo-600 text-white px-4 py-2 rounded-full text-sm font-medium">
                All Videos
            </button>
            <!-- Must Be for Favorite -->
            <button id="favorites" class="bg-pink-500 hover:bg-pink-600 text-white px-4 py-2 rounded-full text-sm font-medium">
                Explore
            </button>
            <!-- Must Be for Recommanded -->
            <button id="recommended" class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded-full text-sm font-medium">
                Random
            </button>
        </div>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8" id="videos-container">
        @foreach($videos as $video)
        <div class="video-card bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition-all duration-300 hover:-translate-y-1 group">
            <div class="relative aspect-video">
                <img src="{{ $video['image'] ?? asset('images/video-thumbnails/default-thumbnail.jpg') }}" 
                     alt="{{ $video['title'] }}" 
                     class="w-full h-full object-cover">
                <div class="absolute inset-0 bg-black/20 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                    <button class="play-button transform scale-90 group-hover:scale-100 transition-transform duration-300" 
                            data-video-url="{{ $video['url'] }}"
                            data-video-title="{{ $video['title'] }}">
                        <div class="bg-white/20 backdrop-blur-sm rounded-full p-4">
                            <svg class="h-12 w-12 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z" />
                            </svg>
                        </div>
                    </button>
                </div>
                <!-- <div class="absolute bottom-2 right-2 bg-black/80 text-white text-xs px-2 py-1 rounded">
                    {{-- Duration would be fetched from video details API --}}
                    00:00
                </div> -->
            </div>
            <div class="p-4">
                <h3 class="font-semibold text-gray-800 mb-1 line-clamp-2 text-lg">{{ $video['title'] }}</h3>
                <p class="text-sm text-gray-600 mb-3 line-clamp-2">{{ $video['description'] }}</p>
                
                <!-- <div class="flex flex-wrap gap-2 mb-3">
                    @if(isset($video['educational_value_id']))
                        @php
                            $valueId = is_array($video['educational_value_id']) ? $video['educational_value_id'][0] : $video['educational_value_id'];
                        @endphp
                        <span class="px-2 py-1 bg-indigo-100 text-indigo-800 text-xs rounded-full">
                            {{ $learningValues[$valueId] ?? 'Value ' . $valueId }}
                        </span>
                    @endif
                </div> -->
                
                <!-- <div class="flex justify-between items-center">
                    <span class="text-xs text-gray-500">Age: {{ $video['age_range_id'] ?? '3-8' }}</span>
                </div> -->
            </div>
        </div>
        @endforeach
    </div>

    <!-- Child-friendly Pagination -->
    <div class="mt-10 flex justify-center">
        <div class="flex items-center space-x-4">
            @if($currentPage > 1)
            <a href="{{ route('kid.videos.index', ['page' => $currentPage - 1]) }}" class="pagination-button prev-button">
                <div class="bg-indigo-500 hover:bg-indigo-600 text-white rounded-full w-12 h-12 flex items-center justify-center shadow-md transform transition hover:scale-110">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                    </svg>
                </div>
            </a>
            @else
            <div class="bg-gray-300 text-gray-500 rounded-full w-12 h-12 flex items-center justify-center opacity-50">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                </svg>
            </div>
            @endif

            @if($currentPage < $totalPages)
            <a href="{{ route('kid.videos.index', ['page' => $currentPage + 1]) }}" class="pagination-button next-button">
                <div class="bg-indigo-500 hover:bg-indigo-600 text-white rounded-full w-12 h-12 flex items-center justify-center shadow-md transform transition hover:scale-110">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </div>
            </a>
            @else
            <div class="bg-gray-300 text-gray-500 rounded-full w-12 h-12 flex items-center justify-center opacity-50">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
            </div>
            @endif
        </div>
    </div>

    <!-- Quick Access Section -->
    @include('partials.navigations.quick_navigateur')

    <!-- Video Player Modal - Enhanced version -->
    <div id="video-modal" class="fixed inset-0 z-50 hidden bg-black/90 flex items-center justify-center p-4 transition-opacity duration-300 opacity-0">
        <div class="w-full max-w-4xl relative mx-4">
            <button id="close-modal" class="absolute -top-10 right-0 text-white hover:text-gray-300 transition-colors duration-200 z-50">
                <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
            
            <!-- Video container with fixed aspect ratio -->
            <div class="relative w-full" style="padding-bottom: 56.25%">
                <iframe id="video-iframe" 
                        class="absolute top-0 left-0 w-full h-full rounded-lg z-10"
                        src=""
                        frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen></iframe>
            </div>
            
            <div class="bg-gray-900 p-6 rounded-b-xl">
                <div class="flex items-start justify-between">
                    <div>
                        <h3 id="modal-title" class="text-xl font-bold text-white"></h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Video player functionality
        const videoCards = document.querySelectorAll('.video-card');
        const videoModal = document.getElementById('video-modal');
        const videoIframe = document.getElementById('video-iframe');
        const modalTitle = document.getElementById('modal-title');
        const closeModal = document.getElementById('close-modal');
        
        videoCards.forEach(card => {
            const playButton = card.querySelector('.play-button');
            playButton.addEventListener('click', function() {
                const videoTitle = this.getAttribute('data-video-title');
                const videoUrl = this.getAttribute('data-video-url');
                
                modalTitle.textContent = videoTitle;
                videoIframe.src = videoUrl;
                
                videoModal.classList.remove('hidden');
                // Fix for modal display - ensure it's visible
                setTimeout(() => {
                    videoModal.classList.add('opacity-100');
                    videoModal.style.display = 'flex';
                }, 10);
                document.body.style.overflow = 'hidden';
            });
        });
        
        closeModal.addEventListener('click', function() {
            videoModal.classList.remove('opacity-100');
            setTimeout(() => {
                videoModal.classList.add('hidden');
                videoIframe.src = '';
                // Ensure modal is completely removed from the DOM flow
                videoModal.style.display = 'none';
                // Make sure body overflow is reset
                document.body.style.overflow = '';
            }, 300);
        });
        
        // Close modal when clicking outside or pressing escape
        videoModal.addEventListener('click', function(e) {
            if(e.target === videoModal) closeModal.click();
        });
        
        document.addEventListener('keydown', function(e) {
            if(e.key === 'Escape') closeModal.click();
        });
        
        // Filter buttons functionality
        const allVideosBtn = document.getElementById('all-videos');
        const favoritesBtn = document.getElementById('favorites');
        const recommendedBtn = document.getElementById('recommended');
        
        allVideosBtn.addEventListener('click', function() {
            videoCards.forEach(card => card.style.display = 'block');
        });
        
        favoritesBtn.addEventListener('click', function() {
            // In a real implementation, this would filter based on favorites
            // For now, just show a subset as an example
            videoCards.forEach((card, index) => {
                card.style.display = index % 3 === 0 ? 'block' : 'none';
            });
        });
        
        recommendedBtn.addEventListener('click', function() {
            // In a real implementation, this would filter based on recommendations
            // For now, just show a different subset as an example
            videoCards.forEach((card, index) => {
                card.style.display = index % 2 === 0 ? 'block' : 'none';
            });
        });
        
        // Removed favorite button functionality
    });
</script>
@endsection