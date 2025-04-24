@extends('layouts.kid_layout')

@section('title', 'Learning')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-8 gap-4">
        <h1 class="text-3xl font-bold text-indigo-600">Learning Videos</h1>
        
        <div class="flex flex-col sm:flex-row gap-4">
            <div class="flex space-x-4">
                <a href="{{ route('kid.learning.index', ['category' => 'math', 'search' => $search]) }}" 
                   class="px-4 py-2 rounded-full text-sm font-medium {{ $category === 'math' ? 'bg-indigo-600 text-white' : 'bg-indigo-100 text-indigo-700 hover:bg-indigo-200' }}">
                    Math
                </a>
                <a href="{{ route('kid.learning.index', ['category' => 'science', 'search' => $search]) }}" 
                   class="px-4 py-2 rounded-full text-sm font-medium {{ $category === 'science' ? 'bg-green-600 text-white' : 'bg-green-100 text-green-700 hover:bg-green-200' }}">
                    Science
                </a>
            </div>
            
            <form action="{{ route('kid.learning.index') }}" method="GET" class="flex">
                <input type="hidden" name="category" value="{{ $category }}">
                <input type="text" name="search" value="{{ $search }}" placeholder="Search videos..." 
                       class="px-4 py-2 border border-gray-300 rounded-l-full focus:outline-none focus:ring-2 focus:ring-indigo-500">
                <button type="submit" class="bg-indigo-500 hover:bg-indigo-600 text-white px-4 py-2 rounded-r-full">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </button>
            </form>
        </div>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8" id="learning-container">
        @foreach($learningVideos as $video)
        <div class="learning-card bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition-all duration-300 hover:-translate-y-1 group">
            <div class="relative aspect-video cursor-pointer" 
                 data-video-id="{{ $video['contentDetails']['videoId'] ?? '' }}"
                 data-video-title="{{ $video['snippet']['title'] ?? '' }}">
                <img src="{{ $video['snippet']['thumbnails']['high']['url'] ?? asset('images/learning-thumbnails/default-thumbnail.jpg') }}" 
                     alt="{{ $video['snippet']['title'] ?? 'Learning Video' }}" 
                     class="w-full h-full object-cover">
                <div class="absolute inset-0 bg-black/20 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                    <!-- No play icon, just hover effect -->
                </div>
                <div class="absolute bottom-2 right-2 bg-black/80 text-white text-xs px-2 py-1 rounded">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 inline-block mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                    </svg>
                    {{ $category === 'math' ? 'Math' : 'Science' }}
                </div>
            </div>
            <div class="p-4">
                <h3 class="font-semibold text-gray-800 mb-1 line-clamp-2 text-lg">{{ $video['snippet']['title'] ?? 'Untitled Video' }}</h3>
                <p class="text-sm text-gray-600 mb-3 line-clamp-2">{{ $video['snippet']['description'] ?? 'No description available' }}</p>
                
                <!-- <div class="flex justify-between items-center">
                    <span class="text-xs text-gray-500">
                        {{ \Carbon\Carbon::parse($video['snippet']['publishedAt'] ?? now())->format('M d, Y') }}
                    </span>
                    <button class="favorite-button text-gray-400 hover:text-yellow-500">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z" />
                        </svg>
                    </button>
                </div> -->
            </div>
        </div>
        @endforeach
    </div>

    <!-- Child-friendly Pagination -->
    <div class="mt-10 flex justify-center">
        <div class="flex items-center space-x-4">
            @if($prevPageToken)
            <a href="{{ route('kid.learning.index', ['page_token' => $prevPageToken, 'search' => $search, 'category' => $category]) }}" class="pagination-button prev-button">
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

            @if($nextPageToken)
            <a href="{{ route('kid.learning.index', ['page_token' => $nextPageToken, 'search' => $search, 'category' => $category]) }}" class="pagination-button next-button">
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


    <!-- Learning Video Modal -->
    <div id="learning-modal" class="fixed inset-0 z-50 hidden bg-black/90 flex items-center justify-center p-4 transition-opacity duration-300 opacity-0">
        <div class="w-full max-w-4xl relative mx-4">
            <button id="close-modal" class="absolute -top-10 right-0 text-white hover:text-gray-300 transition-colors duration-200 z-50">
                <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
            
            <!-- Video container with fixed aspect ratio -->
            <div class="relative w-full" style="padding-bottom: 56.25%">
                <iframe id="learning-iframe" 
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
        // Learning cards functionality
        const learningCards = document.querySelectorAll('.learning-card');
        const learningModal = document.getElementById('learning-modal');
        const learningIframe = document.getElementById('learning-iframe');
        const modalTitle = document.getElementById('modal-title');
        const closeModal = document.getElementById('close-modal');
        
        learningCards.forEach(card => {
            const videoImage = card.querySelector('.relative.aspect-video');
            videoImage.addEventListener('click', function() {
                const videoId = this.getAttribute('data-video-id');
                const videoTitle = this.getAttribute('data-video-title');
                
                modalTitle.textContent = videoTitle;
                learningIframe.src = `https://www.youtube.com/embed/${videoId}?autoplay=1`;
                
                learningModal.classList.remove('hidden');
                // Fix for modal display - ensure it's visible
                setTimeout(() => {
                    learningModal.classList.add('opacity-100');
                    learningModal.style.display = 'flex';
                }, 10);
                document.body.style.overflow = 'hidden';
            });
        });
        
        closeModal.addEventListener('click', function() {
            learningModal.classList.remove('opacity-100');
            setTimeout(() => {
                learningModal.classList.add('hidden');
                learningIframe.src = '';
                // Ensure modal is completely removed from the DOM flow
                learningModal.style.display = 'none';
                // Make sure body overflow is reset
                document.body.style.overflow = '';
            }, 300);
        });
        
        // Close modal when clicking outside or pressing escape
        learningModal.addEventListener('click', function(e) {
            if(e.target === learningModal) closeModal.click();
        });
        
        document.addEventListener('keydown', function(e) {
            if(e.key === 'Escape') closeModal.click();
        });
        
        // Favorite button functionality
        // const favoriteButtons = document.querySelectorAll('.favorite-button');
        // favoriteButtons.forEach(button => {
        //     button.addEventListener('click', function() {
        //         this.classList.toggle('text-gray-400');
        //         this.classList.toggle('text-yellow-500');
        //         // In a real implementation, this would save the favorite status
        //     });
        // });
    });
</script>
@endsection