@extends('layouts.parent_layout')

@section('title', 'Dashboard')

@section('content')
    <div class="bg-white rounded-xl shadow-md overflow-hidden">
        <div class="p-6">
            <h2 class="text-2xl font-bold text-[#4A90E2] mb-4">Welcome to Your Dashboard</h2>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mt-8">
                <!-- Kids Profile Summary Card -->
                <div class="bg-gradient-to-br from-[#4A90E2]/10 to-[#9B59B6]/10 p-6 rounded-xl border border-[#4A90E2]/20">
                    <div class="flex items-center mb-4">
                        <div class="w-12 h-12 bg-[#4A90E2] rounded-full flex items-center justify-center text-white">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9 6a3 3 0 11-6 0 3 3 0 016 0zM17 6a3 3 0 11-6 0 3 3 0 016 0zM12.93 17c.046-.327.07-.66.07-1a6.97 6.97 0 00-1.5-4.33A5 5 0 0119 16v1h-6.07zM6 11a5 5 0 015 5v1H1v-1a5 5 0 015-5z"></path>
                            </svg>
                        </div>
                        <h3 class="ml-4 text-lg font-semibold text-gray-800">Kids Profiles</h3>
                    </div>
                    <p class="text-gray-600 mb-4">Manage your children's profiles and monitor their online activities.</p>
                    <a href="#" class="text-[#4A90E2] font-medium hover:underline flex items-center">
                        View Profiles
                        <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                    </a>
                </div>
                
                <!-- Activity Monitoring Card -->
                <div class="bg-gradient-to-br from-[#FFD600]/10 to-[#FF6B6B]/10 p-6 rounded-xl border border-[#FFD600]/20">
                    <div class="flex items-center mb-4">
                        <div class="w-12 h-12 bg-[#FFD600] rounded-full flex items-center justify-center text-white">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"></path>
                            </svg>
                        </div>
                        <h3 class="ml-4 text-lg font-semibold text-gray-800">Activity Monitoring</h3>
                    </div>
                    <p class="text-gray-600 mb-4">View your children's online activities and screen time reports.</p>
                    <a href="#" class="text-[#FFD600] font-medium hover:underline flex items-center">
                        View Reports
                        <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                    </a>
                </div>
                
                <!-- Content Filtering Card -->
                <div class="bg-gradient-to-br from-[#48C9B0]/10 to-[#2ECC71]/10 p-6 rounded-xl border border-[#48C9B0]/20">
                    <div class="flex items-center mb-4">
                        <div class="w-12 h-12 bg-[#48C9B0] rounded-full flex items-center justify-center text-white">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M3 5a2 2 0 012-2h10a2 2 0 012 2v8a2 2 0 01-2 2h-2.22l.123.489.804.804A1 1 0 0113 18H7a1 1 0 01-.707-1.707l.804-.804L7.22 15H5a2 2 0 01-2-2V5zm5.771 7H5V5h10v7H8.771z" clip-rule="evenodd"></path>
                            </svg>
                        </div>
                        <h3 class="ml-4 text-lg font-semibold text-gray-800">Content Filtering</h3>
                    </div>
                    <p class="text-gray-600 mb-4">Manage content filters and set appropriate restrictions for your children.</p>
                    <a href="#" class="text-[#48C9B0] font-medium hover:underline flex items-center">
                        Adjust Filters
                        <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                    </a>
                </div>
            </div>
            
            <!-- Recent Activity Section -->
            <div class="mt-10">
                <h3 class="text-xl font-bold text-gray-800 mb-4">Recent Activity</h3>
                <div class="bg-gray-50 rounded-xl overflow-hidden border border-gray-200">
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-100">
                                <tr>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Child</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Activity</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Time</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="flex-shrink-0 h-10 w-10 rounded-full bg-[#4A90E2]/20 flex items-center justify-center">
                                                <span class="text-[#4A90E2] font-bold">S</span>
                                            </div>
                                            <div class="ml-4">
                                                <div class="text-sm font-medium text-gray-900">Sarah</div>
                                                <div class="text-xs text-gray-500">Age 10</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">YouTube Kids</div>
                                        <div class="text-xs text-gray-500">Educational content</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">Today, 3:45 PM</div>
                                        <div class="text-xs text-gray-500">45 minutes</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                            Allowed
                                        </span>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="flex-shrink-0 h-10 w-10 rounded-full bg-[#9B59B6]/20 flex items-center justify-center">
                                                <span class="text-[#9B59B6] font-bold">J</span>
                                            </div>
                                            <div class="ml-4">
                                                <div class="text-sm font-medium text-gray-900">Jack</div>
                                                <div class="text-xs text-gray-500">Age 8</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">Game: Minecraft</div>
                                        <div class="text-xs text-gray-500">Creative mode</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">Today, 2:15 PM</div>
                                        <div class="text-xs text-gray-500">30 minutes</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                            Allowed
                                        </span>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="flex-shrink-0 h-10 w-10 rounded-full bg-[#FFD600]/20 flex items-center justify-center">
                                                <span class="text-[#FFD600] font-bold">E</span>
                                            </div>
                                            <div class="ml-4">
                                                <div class="text-sm font-medium text-gray-900">Emma</div>
                                                <div class="text-xs text-gray-500">Age 12</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">Website: example.com</div>
                                        <div class="text-xs text-gray-500">Social media</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">Today, 1:30 PM</div>
                                        <div class="text-xs text-gray-500">Attempted access</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                            Blocked
                                        </span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="bg-gray-50 px-6 py-3 border-t border-gray-200">
                        <a href="#" class="text-[#4A90E2] hover:underline text-sm font-medium flex items-center justify-center md:justify-end">
                            View all activity
                            <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
            
            <!-- Quick Stats Section -->
            <div class="mt-10 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                <div class="bg-white p-6 rounded-xl border border-gray-200 shadow-sm">
                    <div class="flex items-center">
                        <div class="w-12 h-12 bg-[#4A90E2]/10 rounded-full flex items-center justify-center">
                            <svg class="w-6 h-6 text-[#4A90E2]" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"></path>
                            </svg>
                        </div>
                        <div class="ml-4">
                            <h4 class="text-sm font-medium text-gray-500">Total Screen Time</h4>
                            <p class="text-2xl font-bold text-gray-800">3h 45m</p>
                            <p class="text-xs text-green-600 flex items-center mt-1">
                                <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M14.707 12.707a1 1 0 01-1.414 0L10 9.414l-3.293 3.293a1 1 0 01-1.414-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 010 1.414z" clip-rule="evenodd"></path>
                                </svg>
                                15% less than yesterday
                            </p>
                        </div>
                    </div>
                </div>
                
                <div class="bg-white p-6 rounded-xl border border-gray-200 shadow-sm">
                    <div class="flex items-center">
                        <div class="w-12 h-12 bg-[#9B59B6]/10 rounded-full flex items-center justify-center">
                            <svg class="w-6 h-6 text-[#9B59B6]" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9 6a3 3 0 11-6 0 3 3 0 016 0zM17 6a3 3 0 11-6 0 3 3 0 016 0zM12.93 17c.046-.327.07-.66.07-1a6.97 6.97 0 00-1.5-4.33A5 5 0 0119 16v1h-6.07zM6 11a5 5 0 015 5v1H1v-1a5 5 0 015-5z"></path>
                            </svg>
                        </div>
                        <div class="ml-4">
                            <h4 class="text-sm font-medium text-gray-500">Active Children</h4>
                            <p class="text-2xl font-bold text-gray-800">3/3</p>
                            <p class="text-xs text-gray-500 mt-1">All profiles active today</p>
                        </div>
                    </div>
                </div>
                
                <div class="bg-white p-6 rounded-xl border border-gray-200 shadow-sm">
                    <div class="flex items-center">
                        <div class="w-12 h-12 bg-[#FFD600]/10 rounded-full flex items-center justify-center">
                            <svg class="w-6 h-6 text-[#FFD600]" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                            </svg>
                        </div>
                        <div class="ml-4">
                            <h4 class="text-sm font-medium text-gray-500">Alerts Today</h4>
                            <p class="text-2xl font-bold text-gray-800">5</p>
                            <p class="text-xs text-red-600 flex items-center mt-1">
                                <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                </svg>
                                2 more than yesterday
                            </p>
                        </div>
                    </div>
                </div>
                
                <div class="bg-white p-6 rounded-xl border border-gray-200 shadow-sm">
                    <div class="flex items-center">
                        <div class="w-12 h-12 bg-[#48C9B0]/10 rounded-full flex items-center justify-center">
                            <svg class="w-6 h-6 text-[#48C9B0]" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path>
                            </svg>
                        </div>
                        <div class="ml-4">
                            <h4 class="text-sm font-medium text-gray-500">Weekly Report</h4>
                            <p class="text-lg font-bold text-gray-800">Ready to view</p>
                            <a href="#" class="text-xs text-[#48C9B0] hover:underline mt-1 inline-block">
                                View Report
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Tips Section -->
            <div class="mt-10 bg-gradient-to-r from-[#4A90E2]/5 to-[#9B59B6]/5 p-6 rounded-xl border border-[#4A90E2]/10">
                <h3 class="text-xl font-bold text-gray-800 mb-4">Digital Parenting Tips</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="flex">
                        <div class="flex-shrink-0">
                            <div class="w-10 h-10 rounded-full bg-[#4A90E2]/20 flex items-center justify-center">
                                <svg class="w-5 h-5 text-[#4A90E2]" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path>
                                </svg>
                            </div>
                        </div>
                        <div class="ml-4">
                            <h4 class="text-md font-semibold text-gray-800">Set Clear Boundaries</h4>
                            <p class="text-sm text-gray-600 mt-1">Establish clear rules about screen time and which apps and websites are appropriate for your children.</p>
                        </div>
                    </div>
                    
                    <div class="flex">
                        <div class="flex-shrink-0">
                            <div class="w-10 h-10 rounded-full bg-[#9B59B6]/20 flex items-center justify-center">
                                <svg class="w-5 h-5 text-[#9B59B6]" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v1h8v-1zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-1a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v1h-3zM4.75 12.094A5.973 5.973 0 004 15v1H1v-1a3 3 0 013.75-2.906z"></path>
                                </svg>
                            </div>
                        </div>
                        <div class="ml-4">
                            <h4 class="text-md font-semibold text-gray-800">Stay Involved</h4>
                            <p class="text-sm text-gray-600 mt-1">Regularly talk with your children about their online experiences and the content they're consuming.</p>
                        </div>
                    </div>
                    
                    <div class="flex">
                        <div class="flex-shrink-0">
                            <div class="w-10 h-10 rounded-full bg-[#FFD600]/20 flex items-center justify-center">
                                <svg class="w-5 h-5 text-[#FFD600]" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M12.316 3.051a1 1 0 01.633 1.265l-4 12a1 1 0 11-1.898-.632l4-12a1 1 0 011.265-.633zM5.707 6.293a1 1 0 010 1.414L3.414 10l2.293 2.293a1 1 0 11-1.414 1.414l-3-3a1 1 0 010-1.414l3-3a1 1 0 011.414 0zm8.586 0a1 1 0 011.414 0l3 3a1 1 0 010 1.414l-3 3a1 1 0 11-1.414-1.414L16.586 10l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                </svg>
                            </div>
                        </div>
                        <div class="ml-4">
                            <h4 class="text-md font-semibold text-gray-800">Teach Digital Literacy</h4>
                            <p class="text-sm text-gray-600 mt-1">Help your children understand how to evaluate online information and recognize potential risks.</p>
                        </div>
                    </div>
                    
                    <div class="flex">
                        <div class="flex-shrink-0">
                            <div class="w-10 h-10 rounded-full bg-[#48C9B0]/20 flex items-center justify-center">
                                <svg class="w-5 h-5 text-[#48C9B0]" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M6.267 3.455a3.066 3.066 0 001.745-.723 3.066 3.066 0 013.976 0 3.066 3.066 0 001.745.723 3.066 3.066 0 012.812 2.812c.051.643.304 1.254.723 1.745a3.066 3.066 0 010 3.976 3.066 3.066 0 00-.723 1.745 3.066 3.066 0 01-2.812 2.812 3.066 3.066 0 00-1.745.723 3.066 3.066 0 01-3.976 0 3.066 3.066 0 00-1.745-.723 3.066 3.066 0 01-2.812-2.812 3.066 3.066 0 00-.723-1.745 3.066 3.066 0 010-3.976 3.066 3.066 0 00.723-1.745 3.066 3.066 0 012.812-2.812zm7.44 5.252a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                                </svg>
                            </div>
                        </div>
                        <div class="ml-4">
                            <h4 class="text-md font-semibold text-gray-800">Balance is Key</h4>
                            <p class="text-sm text-gray-600 mt-1">Encourage a healthy balance between screen time and other activities like outdoor play and reading.</p>
                        </div>
                    </div>
                </div>
                
                <div class="mt-6 text-center">
                    <a href="#" class="inline-flex items-center px-4 py-2 bg-[#4A90E2] text-white rounded-lg hover:bg-[#3A80D2] transition-colors">
                        <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M10.394 2.08a1 1 0 00-.788 0l-7 3a1 1 0 000 1.84L5.25 8.051a.999.999 0 01.356-.257l4-1.714a1 1 0 11.788 1.838L7.667 9.088l1.94.831a1 1 0 00.787 0l7-3a1 1 0 000-1.838l-7-3zM3.31 9.397L5 10.12v4.102a8.969 8.969 0 00-1.05-.174 1 1 0 01-.89-.89 11.115 11.115 0 01.25-3.762zM9.3 16.573A9.026 9.026 0 007 14.935v-3.957l1.818.78a3 3 0 002.364 0l5.508-2.361a11.026 11.026 0 01.25 3.762 1 1 0 01-.89.89 8.968 8.968 0 00-5.35 2.524 1 1 0 01-1.4 0zM6 18a1 1 0 001-1v-2.065a8.935 8.935 0 00-2-.712V17a1 1 0 001 1z"></path>
                        </svg>
                        Learn More About Digital Parenting
                    </a>
                </div>
            </div>
            
            <!-- Upcoming Features Section -->
            <div class="mt-10">
                <h3 class="text-xl font-bold text-gray-800 mb-4">Coming Soon</h3>
                <div class="bg-white p-6 rounded-xl border border-gray-200 shadow-sm">
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <div class="flex flex-col items-center text-center p-4 rounded-lg bg-[#4A90E2]/5 border border-[#4A90E2]/10">
                            <div class="w-16 h-16 bg-[#4A90E2]/10 rounded-full flex items-center justify-center mb-4">
                                <svg class="w-8 h-8 text-[#4A90E2]" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 2a6 6 0 00-6 6c0 1.887.74 3.597 1.937 4.85L10 18l4.063-5.15A6.001 6.001 0 0016 8a6 6 0 00-6-6zm0 9a3 3 0 100-6 3 3 0 000 6z" clip-rule="evenodd"></path>
                                </svg>
                            </div>
                            <h4 class="text-lg font-semibold text-gray-800 mb-2">Location Tracking</h4>
                            <p class="text-sm text-gray-600">Keep track of your child's location in real-time with advanced GPS features.</p>
                        </div>
                        
                        <div class="flex flex-col items-center text-center p-4 rounded-lg bg-[#9B59B6]/5 border border-[#9B59B6]/10">
                            <div class="w-16 h-16 bg-[#9B59B6]/10 rounded-full flex items-center justify-center mb-4">
                                <svg class="w-8 h-8 text-[#9B59B6]" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M18 5v8a2 2 0 01-2 2h-5l-5 4v-4H4a2 2 0 01-2-2V5a2 2 0 012-2h12a2 2 0 012 2zM7 8H5v2h2V8zm2 0h2v2H9V8zm6 0h-2v2h2V8z" clip-rule="evenodd"></path>
                                </svg>
                            </div>
                            <h4 class="text-lg font-semibold text-gray-800 mb-2">Safe Messaging</h4>
                            <p class="text-sm text-gray-600">Monitor and filter your child's messages to protect them from inappropriate content.</p>
                        </div>
                        
                        <div class="flex flex-col items-center text-center p-4 rounded-lg bg-[#FFD600]/5 border border-[#FFD600]/10">
                            <div class="w-16 h-16 bg-[#FFD600]/10 rounded-full flex items-center justify-center mb-4">
                                <svg class="w-8 h-8 text-[#FFD600]" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M11 3a1 1 0 10-2 0v1a1 1 0 102 0V3zM15.657 5.757a1 1 0 00-1.414-1.414l-.707.707a1 1 0 001.414 1.414l.707-.707zM18 10a1 1 0 01-1 1h-1a1 1 0 110-2h1a1 1 0 011 1zM5.05 6.464A1 1 0 106.464 5.05l-.707-.707a1 1 0 00-1.414 1.414l.707.707zM5 10a1 1 0 01-1 1H3a1 1 0 110-2h1a1 1 0 011 1zM8 16v-1h4v1a2 2 0 11-4 0zM12 14c.015-.34.208-.646.477-.859a4 4 0 10-4.954 0c.27.213.462.519.476.859h4.002z"></path>
                                </svg>
                            </div>
                            <h4 class="text-lg font-semibold text-gray-800 mb-2">Smart Alerts</h4>
                            <p class="text-sm text-gray-600">Receive intelligent notifications about potential risks in your child's online activity.</p>
                        </div>
                    </div>
                    
                    <div class="mt-6 text-center">
                        <span class="inline-flex items-center px-4 py-2 bg-gray-100 text-gray-700 rounded-lg">
                            <svg class="w-5 h-5 mr-2 text-[#4A90E2]" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"></path>
                            </svg>
                            These features will be available in the next update
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection