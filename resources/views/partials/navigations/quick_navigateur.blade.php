<!-- Quick Access Section -->
<div class="mb-12">
        <h2 class="text-2xl font-bold text-indigo-600 mb-6">Quick Access</h2>
        
        <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-6">
            
            <a href="{{ route('kid.games.index') }}" class="bg-gradient-to-br from-purple-500 to-indigo-600 rounded-xl p-5 text-center text-[#001c68] shadow-lg hover:shadow-xl transition-all duration-300 hover:-translate-y-1">
                <div class="bg-white/20 rounded-full w-16 h-16 sm:w-20 sm:h-20 mx-auto mb-3 flex items-center justify-center p-1">

                    <img src="{{ asset('images/icons/quick_access/games_cookie_monster.png') }}" alt="Games Icon" class="w-full h-full object-contain">
                </div>
                <h3 class="font-bold text-lg">Games</h3>
            </a>

            <a href="{{ route('kid.videos.index') }}" class="bg-gradient-to-br from-purple-500 to-indigo-600 rounded-xl p-5 text-center text-[#ac0614] shadow-lg hover:shadow-xl transition-all duration-300 hover:-translate-y-1">
                <div class="bg-white/20 rounded-full w-16 h-16 sm:w-20 sm:h-20 mx-auto mb-3 flex items-center justify-center p-1">

                    <img src="{{ asset('images/icons/quick_access/videos_elmo.png') }}" alt="Games Icon" class="w-full h-full object-contain">
                </div>
                <h3 class="font-bold text-lg">Videos</h3>
            </a>

            <a href="{{ route('kid.musics.index') }}" class="bg-gradient-to-br from-purple-500 to-indigo-600 rounded-xl p-5 text-center text-[#ff59a1] shadow-lg hover:shadow-xl transition-all duration-300 hover:-translate-y-1">
                <div class="bg-white/20 rounded-full w-16 h-16 sm:w-20 sm:h-20 mx-auto mb-3 flex items-center justify-center p-1">

                    <img src="{{ asset('images/icons/quick_access/music_cute_monster.png') }}" alt="Games Icon" class="w-full h-full object-contain">
                </div>
                <h3 class="font-bold text-lg">Songs</h3>
            </a>

            <a href="{{ route('kid.learning.index') }}" class="bg-gradient-to-br from-purple-500 to-indigo-600 rounded-xl p-5 text-center text-[#8f489c] shadow-lg hover:shadow-xl transition-all duration-300 hover:-translate-y-1">
                <div class="bg-white/20 rounded-full w-16 h-16 sm:w-20 sm:h-20 mx-auto mb-3 flex items-center justify-center p-1">

                    <img src="{{ asset('images/icons/quick_access/learning_littel_monsters.png') }}" alt="Games Icon" class="w-full h-full object-contain">
                </div>
                <h3 class="font-bold text-lg">Learn</h3>
            </a>
            
        </div>
    </div>