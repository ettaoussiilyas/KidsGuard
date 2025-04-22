<!-- Hero Section -->
<section class="relative overflow-hidden bg-gradient-to-b from-[#FFD600] to-[#FFD600] pt-16 pb-24">
    <!-- Decorative blue drips at top -->
    <div class="absolute top-0 left-0 right-0">
        <svg viewBox="0 0 1200 120" preserveAspectRatio="none" class="w-full h-12 text-[#4A90E2] fill-current">
            <path d="M0,0 C150,120 350,0 500,120 C650,0 850,120 1200,0 L1200,0 L0,0 Z"></path>
        </svg>
    </div>
    
    <!-- Hero Section -->
    <section class="relative overflow-hidden bg-[#FFD600] pt-16 pb-24">
        <!-- Decorative elements -->
        <div class="absolute top-0 left-0 w-full h-full">
            <div class="absolute top-10 right-10 w-8 h-8 bg-[#FFD600] rounded-full opacity-50"></div>
            <div class="absolute bottom-20 left-20 w-12 h-12 bg-[#4A90E2] rounded-full opacity-30"></div>
            <div class="absolute top-1/3 right-1/4 w-6 h-6 bg-[#9B59B6] rounded-full opacity-40"></div>
            <div class="absolute bottom-1/4 right-1/3 w-10 h-10 bg-[#2ECC71] rounded-full opacity-20"></div>
        </div>
        
        <div class="container mx-auto px-4 sm:px-6 relative z-10">
            <div class="flex flex-col md:flex-row items-center justify-between gap-8">
                <!-- Left content with improved spacing -->
                <div class="md:w-1/2 mb-10 md:mb-0 md:pl-8 lg:pl-16 xl:pl-24">
                    <h1 class="text-4xl md:text-5xl lg:text-6xl font-['Quicksand'] font-bold text-gray-800 mb-4 leading-tight">
                        A new way to <span class="text-[#4a90e2]">learn</span> <br>& get <span class="text-[#4a90e2]">knowledge</span>
                    </h1>
                    <p class="text-lg text-gray-600 mb-8 max-w-lg">
                        KidsGuard is here for you with various courses & materials from skilled tutors all around the world
                    </p>
                    <div class="flex flex-wrap gap-4">
                        <a href="{{ route('register') }}" class="px-8 py-3 bg-[#9B59B6] text-white font-medium rounded-full shadow-lg hover:shadow-xl transform hover:-translate-y-1 transition-all duration-300">
                            Join the Class
                        </a>
                        <a href="#features" class="px-8 py-3 bg-white border border-gray-300 text-gray-700 font-medium rounded-full shadow-sm hover:shadow-md transform hover:-translate-y-1 transition-all duration-300">
                            Learn more
                        </a>
                    </div>
                    
                    <!-- Stats -->
                    <div class="mt-12 flex flex-wrap gap-8 items-center text-gray-700">
                        <div class="flex flex-col">
                            <span class="text-2xl font-bold">15.2K</span>
                            <span class="text-sm text-gray-500">Active students</span>
                        </div>
                        <div class="h-10 w-px bg-gray-300"></div>
                        <div class="flex flex-col">
                            <span class="text-2xl font-bold">4.5K</span>
                            <span class="text-sm text-gray-500">Tutors</span>
                        </div>
                        <div class="h-10 w-px bg-gray-300"></div>
                        <div class="flex flex-col">
                            <span class="text-2xl font-bold">300+</span>
                            <span class="text-sm text-gray-500">Resources</span>
                        </div>
                    </div>
                </div>
                
                <!-- Right image grid with adjusted spacing -->
                <div class="md:w-1/2 relative md:pr-4 lg:pr-8">
                    <div class="relative grid grid-cols-12 grid-rows-12 gap-3 h-[400px] md:h-[450px] md:ml-8 lg:ml-16">
                        <!-- Main image - top right -->
                        <div class="col-span-8 col-start-5 row-span-6 row-start-1 relative z-10">
                            <div class="bg-[#A7D8FD] rounded-3xl p-1 shadow-lg h-full">
                                <img src="https://picsum.photos/600/300" alt="Happy kids learning" class="w-full h-full object-cover rounded-2xl">
                            </div>
                            <!-- Decorative circle -->
                            <div class="absolute -top-3 -right-3 w-10 h-10 bg-white rounded-full flex items-center justify-center shadow-md z-20">
                                <svg class="w-6 h-6 text-[#4A90E2]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                            </div>
                        </div>
                        
                        <!-- Second image - middle right -->
                        <div class="col-span-6 col-start-7 row-span-5 row-start-7 relative z-20">
                            <div class="bg-[#D8B4FE] rounded-3xl p-1 shadow-lg h-full">
                                <img src="https://picsum.photos/300/300?random=1" alt="Child learning" class="w-full h-full object-cover rounded-2xl">
                            </div>
                            <!-- Decorative circles -->
                            <div class="absolute -bottom-2 right-10 flex">
                                <div class="w-6 h-6 bg-white rounded-full border-2 border-white"></div>
                                <div class="w-6 h-6 bg-white rounded-full border-2 border-white -ml-2"></div>
                                <div class="w-6 h-6 bg-white rounded-full border-2 border-white -ml-2"></div>
                                <div class="w-6 h-6 bg-white rounded-full border-2 border-white -ml-2"></div>
                            </div>
                        </div>
                        
                        <!-- Third image - bottom left -->
                        <div class="col-span-6 col-start-1 row-span-6 row-start-7 relative z-10">
                            <div class="bg-[#B6E6BD] rounded-3xl p-1 shadow-lg h-full">
                                <img src="https://picsum.photos/300/300?random=2" alt="Child with tablet" class="w-full h-full object-cover rounded-2xl">
                            </div>
                            <!-- Decorative star -->
                            <div class="absolute -right-3 top-1/2 transform -translate-y-1/2">
                                <svg class="w-8 h-8 text-[#4A90E2]" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-.364 1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                                </svg>
                            </div>
                        </div>
                        
                        <!-- Small decorative elements -->
                        <div class="absolute -top-4 -right-4 w-16 h-16 bg-[#4a90e2]/10 rounded-full animate-pulse hidden md:block"></div>
                        <div class="absolute -bottom-4 -left-4 w-12 h-12 bg-[#4A90E2]/10 rounded-full animate-ping opacity-70 hidden md:block"></div>
                        <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-24 h-24 bg-[#9B59B6]/5 rounded-full hidden md:block"></div>
                        
                        <!-- Small star decorations -->
                        <div class="absolute top-0 left-1/4">
                            <svg class="w-6 h-6 text-[#4a90e2]" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                            </svg>
                        </div>
                        <div class="absolute bottom-10 right-0">
                            <svg class="w-5 h-5 text-[#4A90E2]" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <!-- Wave divider -->
    <div class="absolute bottom-0 left-0 right-0">
        <svg viewBox="0 0 1200 120" preserveAspectRatio="none" class="w-full h-16 text-white fill-current">
            <path d="M0,0 C150,120 350,0 500,120 C650,0 850,120 1200,0 L1200,120 L0,120 Z"></path>
        </svg>
    </div>
</section>

<!-- Features Section Quick Access -->
<section class="py-16 bg-white">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-3xl md:text-4xl font-['Quicksand'] font-bold text-[#9B59B6] mb-4">
                Providing Quality Learning for Your Kids
            </h2>
            <p class="text-gray-600 max-w-2xl mx-auto text-lg">
                Our platform is designed with children's development in mind, offering a variety of features to engage, educate, and entertain.
            </p>
        </div>
        
        <!-- Feature cards - updated with modern design -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 md:gap-8">
            <!-- Card 1 -->
            <div class="bg-white rounded-2xl shadow-lg p-6 border border-gray-100 transform transition-all duration-300 hover:-translate-y-2 hover:shadow-xl group">
                <div class="w-16 h-16 rounded-2xl bg-[#FFD600]/10 flex items-center justify-center mb-6 mx-auto group-hover:bg-[#FFD600]/20 transition-all duration-300">
                    <img src="{{ asset('images/icons/quick_access/games_cookie_monster.png') }}" alt="Games" class="w-10 h-10 object-contain">
                </div>
                <h3 class="text-xl font-['Quicksand'] font-bold text-center text-[#4A90E2] mb-3 group-hover:text-[#9B59B6] transition-colors duration-300">Interactive Games</h3>
                <p class="text-gray-600 text-center">Fun, educational games that develop critical thinking and problem-solving skills for children of all ages.</p>
            </div>
            
            <!-- Card 2 -->
            <div class="bg-white rounded-2xl shadow-lg p-6 border border-gray-100 transform transition-all duration-300 hover:-translate-y-2 hover:shadow-xl group">
                <div class="w-16 h-16 rounded-2xl bg-[#FF6B6B]/10 flex items-center justify-center mb-6 mx-auto group-hover:bg-[#FF6B6B]/20 transition-all duration-300">
                    <img src="{{ asset('images/icons/quick_access/videos_elmo.png') }}" alt="Videos" class="w-10 h-10 object-contain">
                </div>
                <h3 class="text-xl font-['Quicksand'] font-bold text-center text-[#4A90E2] mb-3 group-hover:text-[#9B59B6] transition-colors duration-300">Learning Videos</h3>
                <p class="text-gray-600 text-center">Engaging educational content that makes learning fun and accessible for curious young minds.</p>
            </div>
            
            <!-- Card 3 -->
            <div class="bg-white rounded-2xl shadow-lg p-6 border border-gray-100 transform transition-all duration-300 hover:-translate-y-2 hover:shadow-xl group">
                <div class="w-16 h-16 rounded-2xl bg-[#48C9B0]/10 flex items-center justify-center mb-6 mx-auto group-hover:bg-[#48C9B0]/20 transition-all duration-300">
                    <img src="{{ asset('images/icons/quick_access/stories_monster2.png') }}" alt="Stories" class="w-10 h-10 object-contain">
                </div>
                <h3 class="text-xl font-['Quicksand'] font-bold text-center text-[#4A90E2] mb-3 group-hover:text-[#9B59B6] transition-colors duration-300">Kid Stories</h3>
                <p class="text-gray-600 text-center">Imaginative stories that inspire creativity and foster a love of reading in children.</p>
            </div>
            
            <!-- Card 4 -->
            <div class="bg-white rounded-2xl shadow-lg p-6 border border-gray-100 transform transition-all duration-300 hover:-translate-y-2 hover:shadow-xl group">
                <div class="w-16 h-16 rounded-2xl bg-[#9B59B6]/10 flex items-center justify-center mb-6 mx-auto group-hover:bg-[#9B59B6]/20 transition-all duration-300">
                    <img src="{{ asset('images/icons/quick_access/music_cute_monster.png') }}" alt="Music" class="w-10 h-10 object-contain">
                </div>
                <h3 class="text-xl font-['Quicksand'] font-bold text-center text-[#4A90E2] mb-3 group-hover:text-[#9B59B6] transition-colors duration-300">Kid Music</h3>
                <p class="text-gray-600 text-center">Age-appropriate music that entertains while developing auditory skills and musical appreciation.</p>
            </div>
        </div>
    </div>
</section>

<!-- Parental Control Section -->
<section class="py-16 pt-0 bg-gradient-to-b from-[#924ab0] to-[#924ab0] relative overflow-hidden">
    <!-- Top wave divider -->
    <div class="absolute top-0 left-0 right-0">
        <svg viewBox="0 0 1200 120" preserveAspectRatio="none" class="w-full h-16 text-white fill-current">
            <path d="M0,0 C150,120 350,0 500,120 C650,0 850,120 1200,0 L1200,0 L0,0 Z"></path>
        </svg>
    </div>
    
    <!-- Decorative elements similar to hero -->
    <div class="absolute top-0 left-0 w-full h-full">
        <div class="absolute top-1/4 right-10 w-10 h-10 bg-[#FFD600] rounded-full opacity-20 animate-pulse"></div>
        <div class="absolute bottom-20 left-20 w-16 h-16 bg-[#4A90E2] rounded-full opacity-10 animate-ping"></div>
        <div class="absolute top-1/3 left-1/4 w-8 h-8 bg-white rounded-full opacity-10"></div>
        <div class="absolute bottom-1/4 right-1/3 w-12 h-12 bg-[#2ECC71] rounded-full opacity-10"></div>
    </div>
    
    <div class="container mx-auto px-4 sm:px-6 lg:px-8 mt-10 relative z-10">
        <div class="flex flex-col md:flex-row items-center gap-8 lg:gap-12">
            <!-- Left content with improved styling -->
            <div class="md:w-1/2 mb-10 md:mb-0 md:pr-4 lg:pr-8">
                <div class="relative pt-10">
                    <span class="absolute -top-6 -left-6 text-5xl text-white opacity-10 font-bold">"</span>
                    <h2 class="text-3xl md:text-4xl font-['Quicksand'] font-bold text-white mb-6 relative">
                        Parental Care For Your <span class="text-[#FFD600]">Children</span>
                    </h2>
                </div>
                <p class="text-white/90 mb-8 text-lg leading-relaxed">
                    KidsGuard gives parents complete control over their children's digital experience.
                </p>
                
                <!-- Feature list with improved styling -->
                <div class="space-y-5 mb-10">
                    <div class="flex items-start space-x-4 group">
                        <div class="w-12 h-12 rounded-xl bg-white/10 flex items-center justify-center flex-shrink-0 group-hover:bg-white/20 transition-all duration-300">
                            <svg class="w-6 h-6 text-[#FFD600]" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-xl font-bold text-white mb-1">Monitor Screen Time</h3>
                            <p class="text-white/80">Track usage patterns and set healthy limits for digital engagement</p>
                        </div>
                    </div>
                    
                    <div class="flex items-start space-x-4 group">
                        <div class="w-12 h-12 rounded-xl bg-white/10 flex items-center justify-center flex-shrink-0 group-hover:bg-white/20 transition-all duration-300">
                            <svg class="w-6 h-6 text-[#FFD600]" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd"></path>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-xl font-bold text-white mb-1">Content Filtering</h3>
                            <p class="text-white/80">Ensure your child only accesses age-appropriate content</p>
                        </div>
                    </div>
                    
                    <div class="flex items-start space-x-4 group">
                        <div class="w-12 h-12 rounded-xl bg-white/10 flex items-center justify-center flex-shrink-0 group-hover:bg-white/20 transition-all duration-300">
                            <svg class="w-6 h-6 text-[#FFD600]" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M10 3.5a1.5 1.5 0 013 0V4a1 1 0 001 1h3a1 1 0 011 1v3a1 1 0 01-1 1h-.5a1.5 1.5 0 000 3h.5a1 1 0 011 1v3a1 1 0 01-1 1h-3a1 1 0 01-1-1v-.5a1.5 1.5 0 00-3 0v.5a1 1 0 01-1 1H6a1 1 0 01-1-1v-3a1 1 0 00-1-1h-.5a1.5 1.5 0 010-3H4a1 1 0 001-1V6a1 1 0 011-1h3a1 1 0 001-1v-.5z"></path>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-xl font-bold text-white mb-1">Learning Progress</h3>
                            <p class="text-white/80">Track achievements and educational milestones</p>
                        </div>
                    </div>
                </div>
                
                <a href="{{ route('register') }}" class="inline-flex items-center px-8 py-4 bg-white text-[#9B59B6] font-bold rounded-full shadow-lg hover:shadow-xl transform hover:-translate-y-1 transition-all duration-300 group">
                    <span>Start Protecting Now</span>
                    <svg class="w-5 h-5 ml-2 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                    </svg>
                </a>
            </div>
            
            <!-- Right image grid with styling inspired by hero section -->
            <div class="md:w-1/2 relative">
                <div class="relative grid grid-cols-12 grid-rows-12 gap-3 h-[400px] md:h-[450px]">
                    <!-- Main image - top right -->
                    <div class="col-span-8 col-start-5 row-span-7 row-start-1 relative z-10">
                        <div class="bg-[#FFD600]/20 rounded-3xl p-1 shadow-lg h-full">
                            <img src="https://picsum.photos/600/300" alt="Parent monitoring child" class="w-full h-full object-cover rounded-2xl">
                        </div>
                        <!-- Decorative element -->
                        <div class="absolute -top-3 -right-3 w-10 h-10 bg-white rounded-full flex items-center justify-center shadow-md z-20">
                            <svg class="w-6 h-6 text-[#9B59B6]" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd"></path>
                            </svg>
                        </div>
                    </div>
                    
                    <!-- Second image - bottom left -->
                    <div class="col-span-7 col-start-1 row-span-6 row-start-6 relative z-20">
                        <div class="bg-[#4A90E2]/20 rounded-3xl p-1 shadow-lg h-full">
                            <img src="https://picsum.photos/300/300?random=3" alt="Family using tablet" class="w-full h-full object-cover rounded-2xl">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<div >
    <svg viewBox="0 0 1200 120" preserveAspectRatio="none" class="w-full h-16 text-[#924ab0] fill-current">
        <path d="M0,0 C150,120 350,0 500,120 C650,0 850,120 1200,0 L1200,0 L0,0 Z"></path>
    </svg>
</div>


<!-- Learning Journey Section -->
<section class="py-16 bg-gradient-to-r from-[#F8F9FA] to-white relative overflow-hidden">
    <!-- Decorative elements -->
    <div class="absolute top-0 left-0 w-full h-full">
        <div class="absolute top-20 right-10 w-8 h-8 bg-[#FFD600] rounded-full opacity-20 animate-pulse"></div>
        <div class="absolute bottom-10 left-20 w-12 h-12 bg-[#4A90E2] rounded-full opacity-10 animate-ping"></div>
        <div class="absolute top-1/3 left-1/4 w-6 h-6 bg-[#9B59B6] rounded-full opacity-10"></div>
    </div>
    
    <div class="container mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-['Quicksand'] font-bold text-[#9B59B6] mb-4">
                Your Child's Learning Journey
            </h2>
            <p class="text-gray-600 max-w-2xl mx-auto text-lg">
                Watch your child grow through our structured learning path designed for continuous development
            </p>
        </div>
        
        <!-- Learning path timeline - simplified to match the image exactly -->
        <div class="relative max-w-4xl mx-auto">
            <!-- Timeline line -->
            <div class="absolute left-4 md:left-1/2 top-0 bottom-0 w-1 bg-gradient-to-b from-[#FF9F43] via-[#4A90E2] to-[#2ECC71] md:transform md:-translate-x-1/2"></div>
            
            <!-- Stage 1: Discovery - LEFT -->
            <div class="relative mb-16">
                <!-- Timeline circle -->
                <div class="absolute left-4 md:left-1/2 top-6 w-8 h-8 rounded-full bg-[#FF9F43] border-4 border-white shadow-md z-10 transform -translate-x-1/2"></div>
                
                <!-- Content container -->
                <div class="md:grid md:grid-cols-2 gap-8 items-center">
                    <!-- Left side content (visible on all screens) -->
                    <div class="pl-16 md:pl-0 md:pr-12 md:text-right">
                        <div class="bg-white p-6 rounded-lg shadow-md border border-gray-100 md:inline-block">
                            <div class="flex md:justify-end mb-3">
                                <div class="w-12 h-12 rounded-full bg-[#FF9F43]/10 flex items-center justify-center">
                                    <img src="{{ asset('images/icons/quick_access/games_cookie_monster.png') }}" alt="Discovery" class="w-8 h-8">
                                </div>
                            </div>
                            <h3 class="text-xl font-bold text-[#FF9F43] mb-2">Discovery Stage</h3>
                            <p class="text-gray-600">Children begin their journey with playful exploration, discovering new concepts through interactive games.</p>
                            <div class="mt-3 md:flex md:justify-end">
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-[#FF9F43]/10 text-[#FF9F43]">
                                    Ages 3-5
                                </span>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Right side (empty) -->
                    <div class="hidden md:block"></div>
                </div>
            </div>
            
            <!-- Stage 2: Foundation - RIGHT -->
            <div class="relative mb-16">
                <!-- Timeline circle -->
                <div class="absolute left-4 md:left-1/2 top-6 w-8 h-8 rounded-full bg-[#4A90E2] border-4 border-white shadow-md z-10 transform -translate-x-1/2"></div>
                
                <!-- Content container -->
                <div class="md:grid md:grid-cols-2 gap-8 items-center">
                    <!-- Left side (empty) -->
                    <div class="hidden md:block"></div>
                    
                    <!-- Right side content (visible on all screens) -->
                    <div class="pl-16 md:pl-12">
                        <div class="bg-white p-6 rounded-lg shadow-md border border-gray-100">
                            <div class="flex mb-3">
                                <div class="w-12 h-12 rounded-full bg-[#4A90E2]/10 flex items-center justify-center">
                                    <img src="{{ asset('images/icons/quick_access/videos_elmo.png') }}" alt="Foundation" class="w-8 h-8">
                                </div>
                            </div>
                            <h3 class="text-xl font-bold text-[#4A90E2] mb-2">Foundation Stage</h3>
                            <p class="text-gray-600">Building core skills in literacy, numeracy, and critical thinking through structured learning activities.</p>
                            <div class="mt-3">
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-[#4A90E2]/10 text-[#4A90E2]">
                                    Ages 6-8
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Stage 3: Growth - LEFT -->
            <div class="relative mb-16">
                <!-- Timeline circle -->
                <div class="absolute left-4 md:left-1/2 top-6 w-8 h-8 rounded-full bg-[#FF6B6B] border-4 border-white shadow-md z-10 transform -translate-x-1/2"></div>
                
                <!-- Content container -->
                <div class="md:grid md:grid-cols-2 gap-8 items-center">
                    <!-- Left side content (visible on all screens) -->
                    <div class="pl-16 md:pl-0 md:pr-12 md:text-right">
                        <div class="bg-white p-6 rounded-lg shadow-md border border-gray-100 md:inline-block">
                            <div class="flex md:justify-end mb-3">
                                <div class="w-12 h-12 rounded-full bg-[#FF6B6B]/10 flex items-center justify-center">
                                    <img src="{{ asset('images/icons/quick_access/stories_monster2.png') }}" alt="Growth" class="w-8 h-8">
                                </div>
                            </div>
                            <h3 class="text-xl font-bold text-[#FF6B6B] mb-2">Growth Stage</h3>
                            <p class="text-gray-600">Advanced learning with deeper subject exploration and project-based activities to develop independence.</p>
                            <div class="mt-3 md:flex md:justify-end">
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-[#FF6B6B]/10 text-[#FF6B6B]">
                                    Ages 9-10
                                </span>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Right side (empty) -->
                    <div class="hidden md:block"></div>
                </div>
            </div>
            
            <!-- Stage 4: Mastery - RIGHT -->
            <div class="relative mb-16">
                <!-- Timeline circle -->
                <div class="absolute left-4 md:left-1/2 top-6 w-8 h-8 rounded-full bg-[#2ECC71] border-4 border-white shadow-md z-10 transform -translate-x-1/2"></div>
                
                <!-- Content container -->
                <div class="md:grid md:grid-cols-2 gap-8 items-center">
                    <!-- Left side (empty) -->
                    <div class="hidden md:block"></div>
                    
                    <!-- Right side content (visible on all screens) -->
                    <div class="pl-16 md:pl-12">
                        <div class="bg-white p-6 rounded-lg shadow-md border border-gray-100">
                            <div class="flex mb-3">
                                <div class="w-12 h-12 rounded-full bg-[#2ECC71]/10 flex items-center justify-center">
                                    <img src="{{ asset('images/icons/quick_access/music_cute_monster.png') }}" alt="Mastery" class="w-8 h-8">
                                </div>
                            </div>
                            <h3 class="text-xl font-bold text-[#2ECC71] mb-2">Mastery Stage</h3>
                            <p class="text-gray-600">Developing advanced skills through collaborative challenges and complex problem-solving activities.</p>
                            <div class="mt-3">
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-[#2ECC71]/10 text-[#2ECC71]">
                                    Ages 11-12
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Call to Action Section -->
            <section class="py-20 bg-gradient-to-r from-[#9B59B6] to-[#8E44AD] relative overflow-hidden">
                <!-- Decorative elements -->
                <div class="absolute top-0 left-0 w-full h-full">
                    <div class="absolute top-10 right-10 w-12 h-12 bg-white rounded-full opacity-5 animate-pulse"></div>
                    <div class="absolute bottom-20 left-20 w-16 h-16 bg-white rounded-full opacity-5 animate-ping"></div>
                    <div class="absolute top-1/3 right-1/4 w-8 h-8 bg-white rounded-full opacity-5"></div>
                </div>
                
                <div class="container mx-auto px-6 relative z-10">
                    <div class="text-center">
                        <div class="inline-block mb-6">
                            <span class="px-4 py-1 bg-white/10 text-white/90 rounded-full text-sm font-medium">Join Our Community</span>
                        </div>
                        <h2 class="text-3xl md:text-4xl lg:text-5xl font-['Quicksand'] font-bold text-white mb-6 leading-tight">
                            Ready to Create a Safe Digital Space <br class="hidden md:block"> for Your Kids?
                        </h2>
                        <p class="text-white/90 max-w-3xl mx-auto mb-10 text-lg">
                            Join thousands of parents who trust KidsGuard to provide a secure, educational, and fun digital environment for their children.
                        </p>
                        <div class="flex flex-wrap justify-center gap-6">
                            <a href="{{ route('register') }}" class="px-8 py-4 bg-white text-[#9B59B6] font-bold rounded-full shadow-lg hover:shadow-xl transform hover:-translate-y-1 transition-all duration-300 text-lg flex items-center">
                                <span>Get Started Today</span>
                                <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                                </svg>
                            </a>
                            <a href="{{ route('login') }}" class="px-8 py-4 bg-[#4A90E2] text-white font-bold rounded-full border-2 border-white/20 shadow-lg hover:shadow-xl transform hover:-translate-y-1 transition-all duration-300 text-lg">
                                Sign In
                            </a>
                        </div>
                        
                        <!-- Trust indicators -->
                        <div class="mt-12 flex flex-wrap justify-center gap-8 items-center">
                            <div class="flex items-center text-white/80">
                                <svg class="w-5 h-5 mr-2 text-[#FFD600]" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                                </svg>
                                <span>Trusted by 15,000+ parents</span>
                            </div>
                            <div class="h-6 w-px bg-white/20 hidden md:block"></div>
                            <div class="flex items-center text-white/80">
                                <svg class="w-5 h-5 mr-2 text-[#FFD600]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                                </svg>
                                <span>100% Safe & Secure</span>
                            </div>
                            <div class="h-6 w-px bg-white/20 hidden md:block"></div>
                            <div class="flex items-center text-white/80">
                                <svg class="w-5 h-5 mr-2 text-[#FFD600]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                <span>Life Time</span>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</section>

           