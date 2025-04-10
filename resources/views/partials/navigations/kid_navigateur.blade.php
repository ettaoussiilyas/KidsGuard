
<div class="pt-16 pb-8 px-4 mt-16 bg-gradient-to-b from-[#9B59B6] to-[#8E44AD]">
    <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-6 gap-6 sm:gap-8 md:gap-10 max-w-6xl mx-auto">
        <a href="{{ route('kid.videos.index') }}" class="flex flex-col items-center group">
            <div class="w-16 h-16 sm:w-20 sm:h-20 md:w-24 md:h-24 rounded-full bg-white/20 flex items-center justify-center shadow-lg group-hover:shadow-xl transform transition-all duration-300 group-hover:scale-110 relative overflow-hidden p-1">
                <img src="{{ asset('images/icons/quick_access/videos_elmo.png') }}" alt="Videos Icon" class="w-full h-full object-contain">
            </div>
            <span class="mt-2 text-base sm:text-lg md:text-xl font-bold text-white">Videos</span>
        </a>
            
        <a href="{{ route('kid.games.index') }}" class="flex flex-col items-center group">
            <div class="w-16 h-16 sm:w-20 sm:h-20 md:w-24 md:h-24 rounded-full bg-white/20 flex items-center justify-center shadow-lg group-hover:shadow-xl transform transition-all duration-300 group-hover:scale-110 relative overflow-hidden p-1">
                <img src="{{ asset('images/icons/quick_access/games_cookie_monster.png') }}" alt="Games Icon" class="w-full h-full object-contain">
            </div>
            <span class="mt-2 text-base sm:text-lg md:text-xl font-bold text-white">Games</span>
        </a>
        
        <a href=" route('kid.stories.index') }}" class="flex flex-col items-center group">
            <div class="w-16 h-16 sm:w-20 sm:h-20 md:w-24 md:h-24 rounded-full bg-white/20 flex items-center justify-center shadow-lg group-hover:shadow-xl transform transition-all duration-300 group-hover:scale-110 relative overflow-hidden p-1">
                <img src="{{ asset('images/icons/quick_access/stories_monster.png') }}" alt="Stories Icon" class="w-full h-full object-contain">
            </div>
            <span class="mt-2 text-base sm:text-lg md:text-xl font-bold text-white">Stories</span>
        </a>
            
        <a href="{{ route('kid.musics.index') }}" class="flex flex-col items-center group">
            <div class="w-16 h-16 sm:w-20 sm:h-20 md:w-24 md:h-24 rounded-full bg-white/20 flex items-center justify-center shadow-lg group-hover:shadow-xl transform transition-all duration-300 group-hover:scale-110 relative overflow-hidden p-1">
                <img src="{{ asset('images/icons/quick_access/music_cute_monster.png') }}" alt="Songs Icon" class="w-full h-full object-contain">
            </div>
            <span class="mt-2 text-base sm:text-lg md:text-xl font-bold text-white">Songs</span>
        </a>
            
        <a href="{{ route('kid.learning.index') }}" class="flex flex-col items-center group">
            <div class="w-16 h-16 sm:w-20 sm:h-20 md:w-24 md:h-24 rounded-full bg-white/20 flex items-center justify-center shadow-lg group-hover:shadow-xl transform transition-all duration-300 group-hover:scale-110 relative overflow-hidden p-1">
                <img src="{{ asset('images/icons/quick_access/learning_littel_monsters.png') }}" alt="Learning Icon" class="w-full h-full object-contain">
            </div>
            <span class="mt-2 text-base sm:text-lg md:text-xl font-bold text-white">Learn</span>
        </a>
            
        <a href="{{ route('kid.index') }}" class="flex flex-col items-center group">
            <div class="w-16 h-16 sm:w-20 sm:h-20 md:w-24 md:h-24 rounded-full bg-white/20 flex items-center justify-center shadow-lg group-hover:shadow-xl transform transition-all duration-300 group-hover:scale-110 relative overflow-hidden p-1">
                <img src="{{ asset('images/icons/quick_access/home_icon.svg') }}" alt="Featured Icon" class="w-full h-full object-contain">
            </div>
            <span class="mt-2 text-base sm:text-lg md:text-xl font-bold text-white">Featured</span>
        </a>
    </div>
</div>