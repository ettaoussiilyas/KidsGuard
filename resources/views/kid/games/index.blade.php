@extends('layouts.kid_layout')

@section('title', 'Games')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="flex justify-between items-center mb-8">
        <h1 class="text-3xl font-bold text-indigo-600">My Games</h1>
        
        <div class="flex flex-wrap gap-2">
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

    <!-- Game display iframe (initially hidden) -->
    <div id="game-frame-container" class="hidden mb-8">
        <div class="bg-white rounded-xl shadow-lg overflow-hidden p-4">
            <div class="flex justify-between items-center mb-4">
                <h2 id="current-game-title" class="text-2xl font-bold text-indigo-600">Game Title</h2>
                <button id="close-game" class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-full text-sm font-medium">
                    Close Game
                </button>
            </div>
            <div class="relative aspect-video">
                <iframe id="game-frame" src="" class="w-full h-full border-0 rounded-lg" allowfullscreen></iframe>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6" id="games-container">
        @foreach($games as $game)
        <div class="game-card bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition-all duration-300 hover:-translate-y-1 group">
            <div class="relative aspect-video">
                <img src="{{ $game['image'] ?? asset('images/game-thumbnails/default-thumbnail.jpg') }}" 
                     alt="{{ $game['title'] }}" 
                     class="w-full h-full object-cover">
                <div class="absolute inset-0 bg-black/20 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                    <button class="play-game-button transform scale-90 group-hover:scale-100 transition-transform duration-300"
                           data-game-url="{{ $game['url'] }}"
                           data-game-title="{{ $game['title'] }}">
                        <div class="bg-white/20 backdrop-blur-sm rounded-full p-4">
                            <svg class="h-12 w-12 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z" />
                            </svg>
                        </div>
                    </button>
                </div>
                <div class="absolute top-2 right-2 bg-indigo-500 text-white text-xs px-2 py-1 rounded-full">
                    {{ $game['category'] ?? 'Game' }}
                </div>
            </div>
            <div class="p-3">
                <h3 class="font-semibold text-gray-800 mb-1 line-clamp-1 text-lg">{{ $game['title'] }}</h3>
                <p class="text-sm text-gray-600 mb-2 line-clamp-2">{{ $game['description'] }}</p>
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

            <!-- Remove the numbered pagination -->

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
        const gameFrameContainer = document.getElementById('game-frame-container');
        const gameFrame = document.getElementById('game-frame');
        const currentGameTitle = document.getElementById('current-game-title');
        const closeGameBtn = document.getElementById('close-game');
        const gamesContainer = document.getElementById('games-container');
        
        // Play game buttons
        const playGameButtons = document.querySelectorAll('.play-game-button');
        playGameButtons.forEach(button => {
            button.addEventListener('click', function() {
                const gameUrl = this.getAttribute('data-game-url');
                const gameTitle = this.getAttribute('data-game-title');
                
                // Set the iframe source and title
                gameFrame.src = gameUrl;
                currentGameTitle.textContent = gameTitle;
                
                // Show the game frame and scroll to it
                gameFrameContainer.classList.remove('hidden');
                gameFrameContainer.scrollIntoView({ behavior: 'smooth' });
            });
        });
        
        // Close game button
        closeGameBtn.addEventListener('click', function() {
            // Hide the game frame and clear the iframe source
            gameFrameContainer.classList.add('hidden');
            gameFrame.src = '';
        });
        
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
    });
</script>
@endsection