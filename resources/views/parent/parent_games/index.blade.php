@extends('layouts.parent_layout')

@section('title', 'Video Library')

@section('content')
<div class="container mx-auto px-4 py-8">
    <!-- Search Header -->
    <div class="max-w-7xl mx-auto mb-8">
        <div class="bg-gradient-to-r from-indigo-600 to-purple-600 rounded-xl shadow-lg p-6 transition-all duration-300 hover:shadow-xl">
            <div class="flex flex-col md:flex-row justify-between items-center">
                <div class="mb-4 md:mb-0">
                    <h1 class="text-2xl md:text-3xl font-bold text-white">Video Library</h1>
                    <p class="text-indigo-100 mt-2">Browse our collection of educational videos</p>
                </div>
                <div class="w-full md:w-1/3 relative">
                    <form action="{{ route('parent.parent-games') }}" method="GET">
                        <input 
                            name="search"
                            type="text"
                            placeholder="Search videos..."
                            value="{{ $search }}"
                            class="w-full px-4 py-3 rounded-lg bg-white/90 focus:bg-white transition-all duration-300 focus:ring-2 focus:ring-purple-400 border-0 text-gray-800"
                        >
                        <button type="submit" class="absolute inset-y-0 right-0 flex items-center pr-3">
                            <svg class="h-5 w-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                            </svg>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Video Grid -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
        @foreach($videos as $video)
        <div class="bg-white rounded-xl shadow-md overflow-hidden transition-all duration-300 hover:shadow-xl hover:-translate-y-1 group">
            <!-- Thumbnail with play button -->
            <div class="relative aspect-video">
                <img 
                    src="{{ $video['snippet']['thumbnails']['high']['url'] }}" 
                    alt="{{ $video['snippet']['title'] }}"
                    class="w-full h-full object-cover"
                >
                <div class="absolute inset-0 bg-black/20 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                    <button class="play-button transform scale-90 group-hover:scale-100 transition-transform duration-300" 
                            data-video-id="{{ $video['contentDetails']['videoId'] }}"
                            data-video-title="{{ $video['snippet']['title'] }}">
                        <div class="bg-white/20 backdrop-blur-sm rounded-full p-4">
                            <svg class="h-12 w-12 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z" />
                            </svg>
                        </div>
                    </button>
                </div>
                <div class="absolute bottom-2 right-2 bg-black/80 text-white text-xs px-2 py-1 rounded">
                    {{-- Duration would be fetched from video details API --}}
                    00:00
                </div>
            </div>
            
            <!-- Video Info -->
            <div class="p-4">
                <h3 class="font-semibold text-gray-800 mb-1 line-clamp-2 text-lg">{{ $video['snippet']['title'] }}</h3>
                <div class="flex items-center text-sm text-gray-500">
                    <!-- <span>{{-- Views would be fetched from video details API --}}0 views</span> -->
                    <span class="mx-2">•</span>
                    <span>{{ \Carbon\Carbon::parse($video['snippet']['publishedAt'])->format('M d, Y') }}</span>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <!-- Pagination -->
    @if($nextPageToken || $prevPageToken)
    <div class="mt-8">
        <nav class="flex items-center justify-between">
            <div class="flex-1 flex justify-between">
                @if($prevPageToken)
                <a href="?page_token={{ $prevPageToken }}&search={{ $search }}" 
                   class="relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50">
                    Previous
                </a>
                @else
                <span class="relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-400 bg-gray-100 cursor-not-allowed">
                    Previous
                </span>
                @endif
                
                @if($nextPageToken)
                <a href="?page_token={{ $nextPageToken }}&search={{ $search }}" 
                   class="ml-3 relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50">
                    Next
                </a>
                @else
                <span class="ml-3 relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-400 bg-gray-100 cursor-not-allowed">
                    Next
                </span>
                @endif
            </div>
        </nav>
    </div>
    @endif
</div>

<!-- Video Modal -->
<div id="video-modal" class="fixed inset-0 z-50 hidden bg-black/90 flex items-center justify-center p-4 transition-opacity duration-300 opacity-0">
    <div class="w-full max-w-4xl relative mx-4">
        <button id="close-modal" class="absolute -top-10 right-0 text-white hover:text-gray-300 transition-colors duration-200 z-50">
            <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>
        
        <!-- Video container - fixing the iframe visibility issue -->
        <div class="relative w-full" style="padding-bottom: 56.25%">
            <iframe id="video-player" 
                    class="absolute top-0 left-0 w-full h-full rounded-lg z-10"
                    src=""
                    frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                    allowfullscreen></iframe>
        </div>
        
        <div class="bg-gray-900 p-6 rounded-b-xl">
            <div class="flex items-start justify-between">
                <div>
                    <h3 id="video-title" class="text-xl font-bold text-white"></h3>
                    <div class="flex items-center mt-2 space-x-4">
                        <span class="text-gray-600">•</span>
                        <p id="video-date" class="text-gray-400"></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const modal = document.getElementById('video-modal');
        const videoPlayer = document.getElementById('video-player');
        const videoTitle = document.getElementById('video-title');
        const videoDate = document.getElementById('video-date');
        const closeModal = document.getElementById('close-modal');
        
        // Play video buttons
        document.querySelectorAll('.play-button').forEach(button => {
            button.addEventListener('click', function() {
                const videoId = this.getAttribute('data-video-id');
                const title = this.getAttribute('data-video-title');
                
                videoTitle.textContent = title;
                videoPlayer.src = `https://www.youtube.com/embed/${videoId}?autoplay=1&rel=0&modestbranding=1`;
                
                modal.classList.remove('hidden');
                // Fix for modal display - ensure it's visible
                setTimeout(() => {
                    modal.classList.add('opacity-100');
                    modal.style.display = 'flex';
                }, 10);
                document.body.style.overflow = 'hidden';
            });
        });
        
        // Close modal
        closeModal.addEventListener('click', function() {
            modal.classList.remove('opacity-100');
            setTimeout(() => {
                modal.classList.add('hidden');
                videoPlayer.src = '';
            }, 300);
            document.body.style.overflow = '';
        });
        
        // Close modal when clicking outside or pressing escape
        modal.addEventListener('click', function(e) {
            if(e.target === modal) closeModal.click();
        });
        
        document.addEventListener('keydown', function(e) {
            if(e.key === 'Escape') closeModal.click();
        });
    });
</script>
@endpush