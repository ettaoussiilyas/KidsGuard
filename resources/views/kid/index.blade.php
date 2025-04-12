@extends('layouts.kid_layout')

@section('title', 'Kid Space')

@section('content')
<div class="container mx-auto px-4 py-8">
    <!-- Welcome Section -->
    <div class="mb-10 text-center">
        <h1 class="text-4xl font-bold text-indigo-600 mb-4">Welcome to KidsGuard!</h1>
        <p class="text-xl text-gray-600">A safe and fun space just for you</p>
    </div>
    
    <!-- Featured Videos Section -->
    <div class="mb-12">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-bold text-indigo-600">Featured Videos</h2>
        </div>
        
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($featuredVideos as $video)
            <div class="video-card bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition-all duration-300 hover:-translate-y-1 group">
                <div class="relative aspect-video cursor-pointer" 
                     data-video-id="{{ $video['contentDetails']['videoId'] ?? '' }}"
                     data-video-title="{{ $video['snippet']['title'] ?? '' }}">
                    <img src="{{ $video['snippet']['thumbnails']['high']['url'] ?? asset('images/video-thumbnails/default-thumbnail.jpg') }}" 
                         alt="{{ $video['snippet']['title'] ?? 'Video' }}" 
                         class="w-full h-full object-cover">
                    <div class="absolute inset-0 bg-black/20 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                        <div class="bg-white/80 rounded-full p-3 transform scale-90 group-hover:scale-100 transition-transform duration-300">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-indigo-600" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM9.555 7.168A1 1 0 008 8v4a1 1 0 001.555.832l3-2a1 1 0 000-1.664l-3-2z" clip-rule="evenodd" />
                            </svg>
                        </div>
                    </div>
                    <div class="absolute bottom-2 right-2 bg-indigo-600/80 text-white text-xs px-2 py-1 rounded">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 inline-block mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        Watch
                    </div>
                </div>
                <div class="p-4">
                    <h3 class="font-semibold text-gray-800 mb-1 line-clamp-2 text-lg">{{ $video['snippet']['title'] ?? 'Untitled Video' }}</h3>
                    <p class="text-sm text-gray-600 mb-3 line-clamp-2">{{ $video['snippet']['description'] ?? 'No description available' }}</p>
                </div>
            </div>
            @endforeach
        </div>
        
        <!-- Simple Pagination -->
        @if($prevPageToken || $nextPageToken)
        <div class="mt-8 flex justify-center">
            <div class="flex items-center space-x-4">
                @if($prevPageToken)
                <a href="{{ route('kid.index', ['page_token' => $prevPageToken]) }}" class="pagination-button prev-button">
                    <div class="bg-indigo-500 hover:bg-indigo-600 text-white rounded-full w-12 h-12 flex items-center justify-center shadow-md transform transition hover:scale-110">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                        </svg>
                    </div>
                </a>
                @endif

                @if($nextPageToken)
                <a href="{{ route('kid.index', ['page_token' => $nextPageToken]) }}" class="pagination-button next-button">
                    <div class="bg-indigo-500 hover:bg-indigo-600 text-white rounded-full w-12 h-12 flex items-center justify-center shadow-md transform transition hover:scale-110">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                    </div>
                </a>
                @endif
            </div>
        </div>
        @endif
    </div>
    
    <!-- Quick Access Section -->
    <div class="mb-12">
        <h2 class="text-2xl font-bold text-indigo-600 mb-6">Quick Access</h2>
        
        <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-6">
            
            <a href="{{ route('kid.videos.index') }}" class="bg-gradient-to-br from-purple-500 to-indigo-600 rounded-xl p-5 text-center text-[#001c68] shadow-lg hover:shadow-xl transition-all duration-300 hover:-translate-y-1">
                <div class="bg-white/20 rounded-full w-20 h-20 mx-auto mb-3 flex items-center justify-center p-1">
                    <img src="{{ asset('images/icons/quick_access/games_cookie_monster.png') }}" alt="Games Icon" class="w-full h-full object-contain">
                </div>
                <h3 class="font-bold text-lg">Games</h3>
            </a>

            <a href="{{ route('kid.games.index') }}" class="bg-gradient-to-br from-purple-500 to-indigo-600 rounded-xl p-5 text-center text-[#ac0614] shadow-lg hover:shadow-xl transition-all duration-300 hover:-translate-y-1">
                <div class="bg-white/20 rounded-full w-20 h-20 mx-auto mb-3 flex items-center justify-center p-1">
                    <img src="{{ asset('images/icons/quick_access/videos_elmo.png') }}" alt="Games Icon" class="w-full h-full object-contain">
                </div>
                <h3 class="font-bold text-lg">Videos</h3>
            </a>

            <a href="{{ route('kid.musics.index') }}" class="bg-gradient-to-br from-purple-500 to-indigo-600 rounded-xl p-5 text-center text-[#ff59a1] shadow-lg hover:shadow-xl transition-all duration-300 hover:-translate-y-1">
                <div class="bg-white/20 rounded-full w-20 h-20 mx-auto mb-3 flex items-center justify-center p-1">
                    <img src="{{ asset('images/icons/quick_access/music_cute_monster.png') }}" alt="Games Icon" class="w-full h-full object-contain">
                </div>
                <h3 class="font-bold text-lg">Songs</h3>
            </a>

            <a href="{{ route('kid.learning.index') }}" class="bg-gradient-to-br from-purple-500 to-indigo-600 rounded-xl p-5 text-center text-[#8f489c] shadow-lg hover:shadow-xl transition-all duration-300 hover:-translate-y-1">
                <div class="bg-white/20 rounded-full w-20 h-20 mx-auto mb-3 flex items-center justify-center p-1">
                    <img src="{{ asset('images/icons/quick_access/learning_littel_monsters.png') }}" alt="Games Icon" class="w-full h-full object-contain">
                </div>
                <h3 class="font-bold text-lg">Learn</h3>
            </a>
            
        </div>
    </div>
</div>

<!-- Video Modal -->
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

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Video cards functionality
        const videoCards = document.querySelectorAll('.video-card');
        const videoModal = document.getElementById('video-modal');
        const videoIframe = document.getElementById('video-iframe');
        const modalTitle = document.getElementById('modal-title');
        const closeModal = document.getElementById('close-modal');
        
        videoCards.forEach(card => {
            const videoImage = card.querySelector('.relative.aspect-video');
            videoImage.addEventListener('click', function() {
                const videoId = this.getAttribute('data-video-id');
                const videoTitle = this.getAttribute('data-video-title');
                
                modalTitle.textContent = videoTitle;
                videoIframe.src = `https://www.youtube.com/embed/${videoId}?autoplay=1`;
                
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
    });
</script>
@endsection