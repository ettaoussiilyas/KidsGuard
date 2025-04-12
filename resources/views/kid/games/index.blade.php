@extends('layouts.kid_layout')

@section('title', 'Games')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="flex justify-between items-center mb-8">
        <h1 class="text-3xl font-bold text-indigo-600">My Games</h1>
        
        <div class="flex space-x-4">
            <button id="all-games" class="bg-indigo-500 hover:bg-indigo-600 text-white px-4 py-2 rounded-full text-sm font-medium">
                All Games
            </button>
            <button id="favorites" class="bg-pink-500 hover:bg-pink-600 text-white px-4 py-2 rounded-full text-sm font-medium">
                Favorites
            </button>
            <button id="recommended" class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded-full text-sm font-medium">
                Recommended
            </button>
        </div>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8" id="games-container">
        @foreach($games as $game)
        <div class="game-card bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition-all duration-300 hover:-translate-y-1 group">
            <div class="relative aspect-video">
                <img src="{{ $game['image'] ?? asset('images/game-thumbnails/default-thumbnail.jpg') }}" 
                     alt="{{ $game['title'] }}" 
                     class="w-full h-full object-cover">
                <div class="absolute inset-0 bg-black/20 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                    <a href="{{ $game['url'] }}" target="_blank" class="play-button transform scale-90 group-hover:scale-100 transition-transform duration-300">
                        <div class="bg-white/20 backdrop-blur-sm rounded-full p-4">
                            <svg class="h-12 w-12 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z" />
                            </svg>
                        </div>
                    </a>
                </div>
                <div class="absolute top-2 right-2 bg-indigo-500 text-white text-xs px-2 py-1 rounded-full">
                    {{ $game['category'] ?? 'Game' }}
                </div>
            </div>
            <div class="p-4">
                <h3 class="font-semibold text-gray-800 mb-1 line-clamp-2 text-lg">{{ $game['title'] }}</h3>
                <p class="text-sm text-gray-600 mb-3 line-clamp-2">{{ $game['description'] }}</p>
                
                <div class="flex flex-wrap gap-2 mb-3">
                    @if(isset($game['educational_value']))
                        <span class="px-2 py-1 bg-indigo-100 text-indigo-800 text-xs rounded-full">
                            Educational Value: {{ $game['educational_value'] }}
                        </span>
                    @endif
                </div>
                
                <div class="flex justify-between items-center">
                    <span class="text-xs text-gray-500">Age: {{ $game['age_range'] ?? '3-8' }}</span>
                    <button class="favorite-button text-gray-400 hover:text-yellow-500">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <!-- Child-friendly Pagination -->
    <div class="mt-10 flex justify-center">
        <div class="flex items-center space-x-4">
            @if($currentPage > 1)
            <a href="{{ route('kid.games.index', ['page' => $currentPage - 1]) }}" class="pagination-button prev-button">
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

            <div class="flex space-x-2">
                @for($i = 1; $i <= $totalPages; $i++)
                    @if($i == $currentPage)
                        <div class="bg-indigo-600 text-white rounded-full w-10 h-10 flex items-center justify-center font-bold shadow-md">
                            {{ $i }}
                        </div>
                    @else
                        <a href="{{ route('kid.games.index', ['page' => $i]) }}" class="bg-white hover:bg-indigo-100 text-indigo-600 rounded-full w-10 h-10 flex items-center justify-center font-bold shadow-md transform transition hover:scale-110">
                            {{ $i }}
                        </a>
                    @endif
                @endfor
            </div>

            @if($currentPage < $totalPages)
            <a href="{{ route('kid.games.index', ['page' => $currentPage + 1]) }}" class="pagination-button next-button">
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

</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Game cards functionality
        const gameCards = document.querySelectorAll('.game-card');
        
        // Filter buttons functionality
        const allGamesBtn = document.getElementById('all-games');
        const favoritesBtn = document.getElementById('favorites');
        const recommendedBtn = document.getElementById('recommended');
        
        allGamesBtn.addEventListener('click', function() {
            gameCards.forEach(card => card.style.display = 'block');
        });
        
        favoritesBtn.addEventListener('click', function() {
            // In a real implementation, this would filter based on favorites
            // For now, just show a subset as an example
            gameCards.forEach((card, index) => {
                card.style.display = index % 3 === 0 ? 'block' : 'none';
            });
        });
        
        recommendedBtn.addEventListener('click', function() {
            // In a real implementation, this would filter based on recommendations
            // For now, just show a different subset as an example
            gameCards.forEach((card, index) => {
                card.style.display = index % 2 === 0 ? 'block' : 'none';
            });
        });
        
        // Favorite button functionality
        const favoriteButtons = document.querySelectorAll('.favorite-button');
        favoriteButtons.forEach(button => {
            button.addEventListener('click', function() {
                this.classList.toggle('text-gray-400');
                this.classList.toggle('text-yellow-500');
                // In a real implementation, this would save the favorite status
            });
        });
    });
</script>
@endsection