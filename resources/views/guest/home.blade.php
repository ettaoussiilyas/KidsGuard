<!-- Hero Section -->
<section class="relative overflow-hidden bg-gradient-to-b from-[#FFD600] to-[#FFA726] pt-16 pb-24">
    <!-- Decorative blue drips at top -->
    <div class="absolute top-0 left-0 right-0">
        <svg viewBox="0 0 1200 120" preserveAspectRatio="none" class="w-full h-12 text-[#4A90E2] fill-current">
            <path d="M0,0 C150,120 350,0 500,120 C650,0 850,120 1200,0 L1200,0 L0,0 Z"></path>
        </svg>
    </div>
    
    <div class="container mx-auto px-6 relative z-10">
        <div class="flex flex-col md:flex-row items-center">
            <!-- Left content -->
            <div class="md:w-1/2 mb-10 md:mb-0">
                <h1 class="text-4xl md:text-5xl font-['Quicksand'] font-bold text-[#4A90E2] mb-4">
                    Welcome to <span class="text-white">KidsGuard</span>
                </h1>
                <p class="text-lg text-white mb-8 max-w-lg">
                    KidsGuard provides a safe digital environment where children can learn, play, and grow. Our platform combines fun activities with educational content, all in a secure space you can trust.
                </p>
                <div class="flex flex-wrap gap-4">
                    <a href="{{ route('register') }}" class="px-8 py-3 bg-[#4A90E2] text-white font-bold rounded-xl shadow-lg hover:shadow-xl transform hover:-translate-y-1 transition-all duration-300">
                        Get Started
                    </a>
                    <a href="{{ route('login') }}" class="px-8 py-3 bg-white text-[#4A90E2] font-bold rounded-xl shadow-lg hover:shadow-xl transform hover:-translate-y-1 transition-all duration-300">
                        Sign In
                    </a>
                </div>
                
                <!-- Feature badges -->
                <div class="mt-8 flex flex-wrap gap-3">
                    <span class="bg-white/20 backdrop-blur-sm text-white px-4 py-2 rounded-full text-sm font-medium">
                        <svg class="w-4 h-4 inline-block mr-1" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M6.267 3.455a3.066 3.066 0 001.745-.723 3.066 3.066 0 013.976 0 3.066 3.066 0 001.745.723 3.066 3.066 0 012.812 2.812c.051.643.304 1.254.723 1.745a3.066 3.066 0 010 3.976 3.066 3.066 0 00-.723 1.745 3.066 3.066 0 01-2.812 2.812 3.066 3.066 0 00-1.745.723 3.066 3.066 0 01-3.976 0 3.066 3.066 0 00-1.745-.723 3.066 3.066 0 01-2.812-2.812 3.066 3.066 0 00-.723-1.745 3.066 3.066 0 010-3.976 3.066 3.066 0 00.723-1.745 3.066 3.066 0 012.812-2.812zm7.44 5.252a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                        </svg>
                        Safe Content
                    </span>
                    <span class="bg-white/20 backdrop-blur-sm text-white px-4 py-2 rounded-full text-sm font-medium">
                        <svg class="w-4 h-4 inline-block mr-1" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M10.394 2.08a1 1 0 00-.788 0l-7 3a1 1 0 000 1.84L5.25 8.051a.999.999 0 01.356-.257l4-1.714a1 1 0 11.788 1.838L7.667 9.088l1.94.831a1 1 0 00.787 0l7-3a1 1 0 000-1.838l-7-3z"></path>
                        </svg>
                        Educational
                    </span>
                    <span class="bg-white/20 backdrop-blur-sm text-white px-4 py-2 rounded-full text-sm font-medium">
                        <svg class="w-4 h-4 inline-block mr-1" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z"></path>
                        </svg>
                        Parent Controlled
                    </span>
                </div>
            </div>
            
            <!-- Right image with deformed borders -->
            <div class="md:w-1/2 relative">
                <div class="relative">
                    <!-- Blob shape behind main image -->
                    <svg class="absolute inset-0 w-full h-full" viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg">
                        <path fill="rgba(74, 144, 226, 0.2)" d="M39.9,-65.7C51.1,-58.4,59.5,-46.6,65.8,-33.8C72.1,-21,76.3,-7.1,74.8,6.1C73.3,19.3,66.1,31.8,56.6,41.3C47.1,50.8,35.3,57.3,22.7,62.2C10.1,67.1,-3.3,70.4,-16.9,69.1C-30.5,67.8,-44.3,61.9,-53.8,51.8C-63.3,41.7,-68.5,27.4,-71.3,12.5C-74.1,-2.4,-74.5,-17.9,-68.8,-30.4C-63.1,-42.9,-51.3,-52.4,-38.7,-59C-26.1,-65.6,-13,-69.3,0.6,-70.3C14.3,-71.3,28.6,-73,39.9,-65.7Z" transform="translate(100 100)" />
                    </svg>
                    
                    <!-- Main image with clip-path for deformed border -->
                    <div class="relative z-10">
                        <div class="overflow-hidden" style="clip-path: url(#blobClip)">
                            <img src="https://picsum.photos/600/300" alt="Happy kids using digital devices" class="w-full h-auto rounded-2xl shadow-lg transform transition-all duration-300 hover:scale-[1.02] hover:shadow-xl">
                        </div>
                        <svg width="0" height="0" class="hidden">
                            <defs>
                                <clipPath id="blobClip" clipPathUnits="objectBoundingBox">
                                    <path d="M0.2,-0.05C0.3,0,0.5,0.05,0.7,0.05C0.9,0.05,1,0,1,0.15C1,0.3,0.9,0.5,0.8,0.65C0.7,0.8,0.6,0.9,0.4,0.95C0.2,1,0.1,0.95,0.05,0.85C0,0.75,-0.05,0.6,0.05,0.5C0.15,0.4,0.1,0.2,0.15,0.1C0.2,0,0.1,-0.1,0.2,-0.05Z">
                                    </path>
                                </clipPath>
                            </defs>
                        </svg>
                    </div>
                    
                    <!-- Floating elements -->
                    <div class="absolute -top-6 -right-6 bg-white p-2 rounded-full shadow-lg transform rotate-6 z-20">
                        <img src="https://picsum.photos/100/100" alt="Cartoon character" class="w-12 h-12 rounded-full">
                    </div>
                    <div class="absolute -bottom-6 -left-6 bg-white p-2 rounded-full shadow-lg transform -rotate-6 z-20">
                        <img src="https://picsum.photos/100/100" alt="Cartoon character" class="w-12 h-12 rounded-full">
                    </div>
                    
                    <!-- Small decorative images with deformed borders -->
                    <div class="absolute top-1/4 -right-10 w-24 h-24 overflow-hidden z-20" style="clip-path: polygon(50% 0%, 100% 38%, 82% 100%, 18% 100%, 0% 38%);">
                        <img src="https://picsum.photos/200/200?random=1" alt="Decorative" class="w-full h-full object-cover">
                    </div>
                    <div class="absolute bottom-1/4 -left-8 w-20 h-20 overflow-hidden z-20" style="clip-path: circle(50% at 50% 50%);">
                        <img src="https://picsum.photos/200/200?random=2" alt="Decorative" class="w-full h-full object-cover">
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Wave divider -->
    <div class="absolute bottom-0 left-0 right-0">
        <svg viewBox="0 0 1200 120" preserveAspectRatio="none" class="w-full h-16 text-white fill-current">
            <path d="M0,0 C150,120 350,0 500,120 C650,0 850,120 1200,0 L1200,120 L0,120 Z"></path>
        </svg>
    </div>
</section>

<!-- Features Section -->
<section class="py-16 bg-white">
    <div class="container mx-auto px-6">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-['Quicksand'] font-bold text-[#9B59B6] mb-4">
                Providing Good Qualities For Your Loving Kids
            </h2>
            <p class="text-gray-600 max-w-2xl mx-auto">
                Our platform is designed with children's development in mind, offering a variety of features to engage, educate, and entertain.
            </p>
        </div>
        
        <!-- Feature cards -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            <!-- Card 1 -->
            <div class="bg-white rounded-xl shadow-lg p-6 transform transition-all duration-300 hover:-translate-y-2 hover:shadow-xl">
                <div class="w-16 h-16 rounded-full bg-[#FFD600] flex items-center justify-center mb-4 mx-auto">
                    <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M2 6a2 2 0 012-2h6a2 2 0 012 2v8a2 2 0 01-2 2H4a2 2 0 01-2-2V6zM14.553 7.106A1 1 0 0014 8v4a1 1 0 00.553.894l2 1A1 1 0 0018 13V7a1 1 0 00-1.447-.894l-2 1z"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-['Quicksand'] font-bold text-center text-[#4A90E2] mb-2">Games</h3>
                <p class="text-gray-600 text-center">Fun, educational games that develop critical thinking and problem-solving skills.</p>
            </div>
            
            <!-- Card 2 -->
            <div class="bg-white rounded-xl shadow-lg p-6 transform transition-all duration-300 hover:-translate-y-2 hover:shadow-xl">
                <div class="w-16 h-16 rounded-full bg-[#FF6B6B] flex items-center justify-center mb-4 mx-auto">
                    <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10.394 2.08a1 1 0 00-.788 0l-7 3a1 1 0 000 1.84L5.25 8.051a.999.999 0 01.356-.257l4-1.714a1 1 0 11.788 1.838L7.667 9.088l1.94.831a1 1 0 00.787 0l7-3a1 1 0 000-1.838l-7-3z"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-['Quicksand'] font-bold text-center text-[#4A90E2] mb-2">Learning Videos</h3>
                <p class="text-gray-600 text-center">Engaging educational content that makes learning fun and accessible.</p>
            </div>
            
            <!-- Card 3 -->
            <div class="bg-white rounded-xl shadow-lg p-6 transform transition-all duration-300 hover:-translate-y-2 hover:shadow-xl">
                <div class="w-16 h-16 rounded-full bg-[#48C9B0] flex items-center justify-center mb-4 mx-auto">
                    <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9 4.804A7.968 7.968 0 005.5 4c-1.255 0-2.443.29-3.5.804v10A7.969 7.969 0 015.5 14c1.669 0 3.218.51 4.5 1.385A7.962 7.962 0 0114.5 14c1.255 0 2.443.29 3.5.804v-10A7.968 7.968 0 0014.5 4c-1.255 0-2.443.29-3.5.804V12a1 1 0 11-2 0V4.804z"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-['Quicksand'] font-bold text-center text-[#4A90E2] mb-2">Kid Stories</h3>
                <p class="text-gray-600 text-center">Imaginative stories that inspire creativity and foster a love of reading.</p>
            </div>
            
            <!-- Card 4 -->
            <div class="bg-white rounded-xl shadow-lg p-6 transform transition-all duration-300 hover:-translate-y-2 hover:shadow-xl">
                <div class="w-16 h-16 rounded-full bg-[#9B59B6] flex items-center justify-center mb-4 mx-auto">
                    <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M18 3a1 1 0 00-1.196-.98l-10 2A1 1 0 006 5v9.114A4.369 4.369 0 005 14c-1.657 0-3 .895-3 2s1.343 2 3 2 3-.895 3-2V7.82l8-1.6v5.894A4.37 4.37 0 0015 12c-1.657 0-3 .895-3 2s1.343 2 3 2 3-.895 3-2V3z"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-['Quicksand'] font-bold text-center text-[#4A90E2] mb-2">Kid Music</h3>
                <p class="text-gray-600 text-center">Age-appropriate music that entertains while developing auditory skills.</p>
            </div>
        </div>
    </div>
    
</section>

<!-- Parental Control Section -->
<section class="py-16 pt-0 bg-[#9B59B6]">
    <div>
        <svg viewBox="0 0 1200 120" preserveAspectRatio="none" class="w-full h-16 text-white fill-current">
            <path d="M0,0 C150,120 350,0 500,120 C650,0 850,120 1200,0 L1200,0 L0,0 Z"></path>
        </svg>
    </div>
    <div class="container mx-auto px-6 mt-10">
        <div class="flex flex-col md:flex-row items-center">
            <!-- Left content -->
            <div class="md:w-1/2 mb-10 md:mb-0">
                <h2 class="text-3xl font-['Quicksand'] font-bold text-white mb-4">
                    Parental Care For Your Children
                </h2>
                <p class="text-white/90 mb-6">
                    KidsGuard gives parents complete control over their children's digital experience. Monitor activity, set time limits, and ensure they're only accessing age-appropriate content.
                </p>
                <ul class="space-y-3">
                    <li class="flex items-center text-white">
                        <svg class="w-5 h-5 mr-2 text-[#FFD600]" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                        </svg>
                        <span>Monitor screen time and app usage</span>
                    </li>
                    <li class="flex items-center text-white">
                        <svg class="w-5 h-5 mr-2 text-[#FFD600]" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                        </svg>
                        <span>Set content filters and restrictions</span>
                    </li>
                    <li class="flex items-center text-white">
                        <svg class="w-5 h-5 mr-2 text-[#FFD600]" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                        </svg>
                        <span>Track learning progress and achievements</span>
                    </li>
                </ul>
                <a href="{{ route('register') }}" class="inline-block mt-8 px-8 py-3 bg-white text-[#9B59B6] font-bold rounded-xl shadow-lg hover:shadow-xl transform hover:-translate-y-1 transition-all duration-300">
                    Start Protecting Now
                </a>
            </div>
            
            <!-- Right image -->
            <div class="md:w-1/2">
                <div class="grid grid-cols-2 gap-4">
                    <div class="transform translate-y-8">
                        <img src="https://picsum.photos/300/200" alt="Parent with child" class="rounded-xl shadow-lg">
                    </div>
                    <div>
                        <img src="https://picsum.photos/300/200" alt="Family using tablet" class="rounded-xl shadow-lg">
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</section>
<div >
    <svg viewBox="0 0 1200 120" preserveAspectRatio="none" class="w-full h-16 text-[#9B59B6] fill-current">
        <path d="M0,0 C150,120 350,0 500,120 C650,0 850,120 1200,0 L1200,0 L0,0 Z"></path>
    </svg>
</div>

<!-- Testimonials Section -->
<section class="py-16 bg-white">
    <div class="container mx-auto px-6">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-['Quicksand'] font-bold text-[#9B59B6] mb-4">
                What Parents Say About Us
            </h2>
            <p class="text-gray-600 max-w-2xl mx-auto">
                Join thousands of satisfied parents who trust KidsGuard for their children's digital safety.
            </p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Testimonial 1 -->
            <div class="bg-gray-50 rounded-xl p-6 shadow-md">
                <div class="flex items-center mb-4">
                    <img src="https://picsum.photos/100/100" alt="Parent" class="w-12 h-12 rounded-full mr-4">
                    <div>
                        <h4 class="font-bold text-[#4A90E2]">Sarah Johnson</h4>
                        <p class="text-sm text-gray-500">Mother of two</p>
                    </div>
                </div>
                <p class="text-gray-600 italic">
                    "KidsGuard has been a game-changer for our family. My children love the educational games, and I love knowing they're safe online."
                </p>
                <div class="mt-4 flex text-[#FFD600]">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                </div>
            </div>
            
            <!-- Testimonial 2 -->
            <div class="bg-gray-50 rounded-xl p-6 shadow-md">
                <div class="flex items-center mb-4">
                    <img src="https://picsum.photos/100/100" alt="Parent" class="w-12 h-12 rounded-full mr-4">
                    <div>
                        <h4 class="font-bold text-[#4A90E2]">Michael Rodriguez</h4>
                        <p class="text-sm text-gray-500">Father of three</p>
                    </div>
                </div>
                <p class="text-gray-600 italic">
                    "The parental controls are fantastic. I can easily monitor what my kids are doing and set appropriate time limits. Highly recommended!"
                </p>
                <div class="mt-4 flex text-[#FFD600]">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                </div>
            </div>
            
            <!-- Testimonial 3 -->
            <div class="bg-gray-50 rounded-xl p-6 shadow-md">
                <div class="flex items-center mb-4">
                    <img src="https://picsum.photos/100/100" alt="Parent" class="w-12 h-12 rounded-full mr-4">
                    <div>
                        <h4 class="font-bold text-[#4A90E2]">Emily Chen</h4>
                        <p class="text-sm text-gray-500">Mother of one</p>
                    </div>
                </div>
                <p class="text-gray-600 italic">
                    "My daughter has learned so much through KidsGuard's educational content. It's the perfect balance of fun and learning!"
                </p>
                <div class="mt-4 flex text-[#FFD600]">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                </div>
            </div>
        </div>
    </div>
    
</section>

<!-- Call to Action Section -->
<section class="py-16 bg-[#2ECC71]">
    <div class="container mx-auto px-6">
        <div class="text-center">
            <h2 class="text-3xl md:text-4xl font-['Quicksand'] font-bold text-white mb-6">
                Ready to Create a Safe Digital Space for Your Kids?
            </h2>
            <p class="text-white/90 max-w-3xl mx-auto mb-8 text-lg">
                Join thousands of parents who trust KidsGuard to provide a secure, educational, and fun digital environment for their children.
            </p>
            <div class="flex flex-wrap justify-center gap-4">
                <a href="{{ route('register') }}" class="px-8 py-4 bg-white text-[#4A90E2] font-bold rounded-xl shadow-lg hover:shadow-xl transform hover:-translate-y-1 transition-all duration-300 text-lg">
                    Get Started Today
                </a>
                <a href="{{ route('login') }}" class="px-8 py-4 bg-[#4A90E2] text-white font-bold rounded-xl shadow-lg hover:shadow-xl transform hover:-translate-y-1 transition-all duration-300 text-lg">
                    Sign In
                </a>
            </div>
        </div>
    </div>
</section>

           