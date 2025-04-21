@extends('layouts.app')

@section('title', 'Full-Stack Web Development')
@section('meta_description', 'Learn to create complete web applications with modern technologies. This course covers HTML, CSS, JavaScript, PHP and MySQL.')

@section('content')
    <!-- Course Header -->
    <section class="bg-gradient-to-r from-indigo-600 to-purple-600 text-white py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row md:items-center md:justify-between">
                <div class="mb-6 md:mb-0 md:mr-8 md:max-w-2xl">
                    <div class="flex items-center mb-2">
                        <span class="text-xs font-semibold px-2 py-1 bg-white/20 text-white rounded-full">Development</span>
                        <div class="flex items-center ml-4">
                            <div class="flex text-yellow-300">
                                <span>★★★★★</span>
                            </div>
                            <span class="ml-1 text-white">4.8 (256 reviews)</span>
                        </div>
                    </div>
                    <h1 class="text-3xl font-extrabold sm:text-4xl mb-4">Full-Stack Web Development</h1>
                    <p class="text-lg mb-6">Learn to create complete web applications with modern technologies. This course covers HTML, CSS, JavaScript, PHP and MySQL.</p>
                    <div class="flex items-center mb-4">
                        <img class="h-10 w-10 rounded-full mr-3" src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="Thomas Dubois">
                        <div>
                            <p class="text-sm font-medium">Thomas Dubois</p>
                            <p class="text-xs">Senior Developer & Instructor</p>
                        </div>
                    </div>
                    <div class="flex flex-wrap gap-4 text-sm">
                        <div class="flex items-center">
                            <svg class="w-5 h-5 mr-1" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <span>42 hours of content</span>
                        </div>
                        <div class="flex items-center">
                            <svg class="w-5 h-5 mr-1" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M9 19l3 3m0 0l3-3m-3 3V10" />
                            </svg>
                            <span>Lifetime access</span>
                        </div>
                        <div class="flex items-center">
                            <svg class="w-5 h-5 mr-1" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <span>Certificate of completion</span>
                        </div>
                    </div>
                </div>
                <div class="bg-white rounded-lg shadow-lg p-6 w-full md:w-80 text-gray-900">
                    <div class="relative aspect-video mb-4 rounded-md overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1498050108023-c5249f4df085?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1472&q=80" alt="Web Development" class="w-full h-full object-cover">
                        <div class="absolute inset-0 flex items-center justify-center bg-black bg-opacity-50">
                            <button class="bg-white rounded-full p-3">
                                <svg class="w-8 h-8 text-indigo-600" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M8 5v14l11-7z" />
                                </svg>
                            </button>
                        </div>
                    </div>
                    <div class="mb-4">
                        <span class="text-3xl font-bold">$49.99</span>
                        <span class="text-gray-500 line-through ml-2">$199.99</span>
                        <span class="text-red-600 ml-2">75% off</span>
                    </div>
                    <div class="flex flex-col gap-3 mb-4">
                        <button class="w-full bg-indigo-600 text-white py-3 px-4 rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 font-medium">
                            Enroll in Course
                        </button>
                        <button class="w-full bg-white text-indigo-600 border border-indigo-600 py-3 px-4 rounded-md hover:bg-indigo-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 font-medium">
                            Take Quiz
                        </button>
                    </div>
                    <div class="text-sm text-gray-600">
                        <p class="mb-2">This course includes:</p>
                        <ul class="space-y-2">
                            <li class="flex items-center">
                                <svg class="w-5 h-5 mr-2 text-indigo-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z" />
                                </svg>
                                <span>42 hours of on-demand video</span>
                            </li>
                            <li class="flex items-center">
                                <svg class="w-5 h-5 mr-2 text-indigo-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                </svg>
                                <span>85 articles and resources</span>
                            </li>
                            <li class="flex items-center">
                                <svg class="w-5 h-5 mr-2 text-indigo-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                                </svg>
                                <span>25 downloadable resources</span>
                            </li>
                            <li class="flex items-center">
                                <svg class="w-5 h-5 mr-2 text-indigo-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                                <span>Lifetime access</span>
                            </li>
                            <li class="flex items-center">
                                <svg class="w-5 h-5 mr-2 text-indigo-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                                </svg>
                                <span>Certificate of completion</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Course Content -->
    <section class="py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <!-- Main Content -->
                <div class="lg:col-span-2">
                    <!-- What You'll Learn -->
                    <div class="bg-white rounded-lg shadow-sm p-6 mb-8">
                        <h2 class="text-2xl font-bold text-gray-900 mb-4">What You'll Learn</h2>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div class="flex">
                                <svg class="w-6 h-6 text-indigo-600 mr-2 flex-shrink-0" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                                <span>Master HTML5, CSS3 and modern JavaScript</span>
                            </div>
                            <div class="flex">
                                <svg class="w-6 h-6 text-indigo-600 mr-2 flex-shrink-0" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                                <span>Create responsive websites with Bootstrap</span>
                            </div>
                            <div class="flex">
                                <svg class="w-6 h-6 text-indigo-600 mr-2 flex-shrink-0" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                                <span>Develop applications with React.js</span>
                            </div>
                            <div class="flex">
                                <svg class="w-6 h-6 text-indigo-600 mr-2 flex-shrink-0" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                                <span>Build RESTful APIs with Node.js</span>
                            </div>
                            <div class="flex">
                                <svg class="w-6 h-6 text-indigo-600 mr-2 flex-shrink-0" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                                <span>Manage databases with MySQL</span>
                            </div>
                            <div class="flex">
                                <svg class="w-6 h-6 text-indigo-600 mr-2 flex-shrink-0" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                                <span>Deploy your applications to the cloud</span>
                            </div>
                            <div class="flex">
                                <svg class="w-6 h-6 text-indigo-600 mr-2 flex-shrink-0" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                                <span>Implement authentication and security</span>
                            </div>
                            <div class="flex">
                                <svg class="w-6 h-6 text-indigo-600 mr-2 flex-shrink-0" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                                <span>Create complete web applications from scratch</span>
                            </div>
                        </div>
                    </div>

                    <!-- Course Description -->
                    <div class="bg-white rounded-lg shadow-sm p-6 mb-8">
                        <h2 class="text-2xl font-bold text-gray-900 mb-4">Course Description</h2>
                        <div class="prose max-w-none text-gray-600">
                            <p class="mb-4">This comprehensive full-stack web development course will teach you how to create professional web applications from scratch. Whether you're a beginner or already have some programming knowledge, this course will guide you through all the necessary steps to become a competent full-stack web developer.</p>

                            <p class="mb-4">You'll start with the basics of front-end development with HTML, CSS, and JavaScript, then progress to modern frameworks like React.js. Next, you'll dive into back-end development with Node.js, Express, and MySQL to create RESTful APIs and manage databases.</p>

                            <p class="mb-4">By the end of this course, you'll have built several real-world projects, including a social network, an e-commerce application, and an admin dashboard. You'll be able to:</p>

                            <ul class="list-disc pl-5 mb-4">
                                <li>Create responsive and aesthetic user interfaces</li>
                                <li>Develop robust and secure APIs</li>
                                <li>Manage user authentication and authorization</li>
                                <li>Design and optimize databases</li>
                                <li>Deploy your applications to cloud services</li>
                                <li>Apply web development best practices</li>
                            </ul>

                            <p>This course is constantly updated to reflect the latest technologies and trends in web development. Join over 10,000 students who have already transformed their careers with this course!</p>
                        </div>
                    </div>

                    <!-- Course Content / Curriculum -->
                    <div class="bg-white rounded-lg shadow-sm p-6 mb-8">
                        <h2 class="text-2xl font-bold text-gray-900 mb-4">Course Content</h2>
                        <div class="mb-4">
                            <p class="text-gray-600">12 sections • 85 lessons • 42 hours total</p>
                        </div>

                        <!-- Section 1 -->
                        <div class="border border-gray-200 rounded-md mb-3">
                            <div class="flex justify-between items-center p-4 cursor-pointer bg-gray-50 hover:bg-gray-100">
                                <div class="flex items-center">
                                    <svg class="w-5 h-5 text-gray-500 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                    </svg>
                                    <h3 class="font-medium text-gray-900">Section 1: Introduction to Web Development</h3>
                                </div>
                                <span class="text-sm text-gray-500">5 lessons • 45 min</span>
                            </div>
                            <div class="p-4 border-t border-gray-200">
                                <ul class="space-y-2">
                                    <li class="flex justify-between items-center">
                                        <div class="flex items-center">
                                            <svg class="w-5 h-5 text-indigo-600 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z" />
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                            </svg>
                                            <span>Welcome to the course</span>
                                        </div>
                                        <span class="text-sm text-gray-500">10:15</span>
                                    </li>
                                    <li class="flex justify-between items-center">
                                        <div class="flex items-center">
                                            <svg class="w-5 h-5 text-indigo-600 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z" />
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                            </svg>
                                            <span>How the web works</span>
                                        </div>
                                        <span class="text-sm text-gray-500">12:30</span>
                                    </li>
                                    <li class="flex justify-between items-center">
                                        <div class="flex items-center">
                                            <svg class="w-5 h-5 text-indigo-600 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z" />
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                            </svg>
                                            <span>Setting up your development environment</span>
                                        </div>
                                        <span class="text-sm text-gray-500">15:20</span>
                                    </li>
                                    <li class="flex justify-between items-center">
                                        <div class="flex items-center">
                                            <svg class="w-5 h-5 text-indigo-600 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z" />
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                            </svg>
                                            <span>Essential tools for web development</span>
                                        </div>
                                        <span class="text-sm text-gray-500">08:45</span>
                                    </li>
                                    <li class="flex justify-between items-center">
                                        <div class="flex items-center">
                                            <svg class="w-5 h-5 text-indigo-600 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z" />
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                            </svg>
                                            <span>Overview of the final project</span>
                                        </div>
                                        <span class="text-sm text-gray-500">11:30</span>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <!-- Section 2 -->
                        <div class="border border-gray-200 rounded-md mb-3">
                            <div class="flex justify-between items-center p-4 cursor-pointer bg-gray-50 hover:bg-gray-100">
                                <div class="flex items-center">
                                    <svg class="w-5 h-5 text-gray-500 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                    </svg>
                                    <h3 class="font-medium text-gray-900">Section 2: HTML5 and CSS3 Fundamentals</h3>
                                </div>
                                <span class="text-sm text-gray-500">8 lessons • 3h 15min</span>
                            </div>
                            <div class="hidden">
                                <!-- Content hidden by default -->
                            </div>
                        </div>

                        <!-- Section 3 -->
                        <div class="border border-gray-200 rounded-md mb-3">
                            <div class="flex justify-between items-center p-4 cursor-pointer bg-gray-50 hover:bg-gray-100">
                                <div class="flex items-center">
                                    <svg class="w-5 h-5 text-gray-500 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                    </svg>
                                    <h3 class="font-medium text-gray-900">Section 3: Modern JavaScript (ES6+)</h3>
                                </div>
                                <span class="text-sm text-gray-500">12 lessons • 5h 30min</span>
                            </div>
                            <div class="hidden">
                                <!-- Content hidden by default -->
                            </div>
                        </div>

                        <!-- Show More Button -->
                        <div class="text-center mt-4">
                            <button class="text-indigo-600 font-medium hover:text-indigo-500 flex items-center justify-center mx-auto">
                                <span>Show 9 more sections</span>
                                <svg class="w-5 h-5 ml-1" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Sidebar -->
                <div class="lg:col-span-1">
                    <!-- Quiz Section -->
                    <div class="bg-white rounded-lg shadow-sm p-6 mb-6">
                        <h3 class="text-lg font-bold text-gray-900 mb-4">Course Quizzes</h3>
                        <p class="text-gray-600 mb-4">Test your knowledge with our interactive quizzes. Complete them to earn your certificate.</p>

                        <div class="space-y-4">
                            <div class="border border-gray-200 rounded-md p-4">
                                <div class="flex justify-between items-center mb-2">
                                    <h4 class="font-medium text-gray-900">HTML & CSS Basics</h4>
                                    <span class="px-2 py-1 bg-green-100 text-green-800 text-xs rounded-full">Completed</span>
                                </div>
                                <p class="text-sm text-gray-600 mb-3">10 questions • 15 minutes</p>
                                <button class="w-full bg-gray-100 text-gray-700 border border-gray-300 py-2 px-4 rounded-md hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 font-medium">
                                    Review Quiz
                                </button>
                            </div>

                            <div class="border border-gray-200 rounded-md p-4">
                                <div class="flex justify-between items-center mb-2">
                                    <h4 class="font-medium text-gray-900">JavaScript Fundamentals</h4>
                                    <span class="px-2 py-1 bg-yellow-100 text-yellow-800 text-xs rounded-full">In Progress</span>
                                </div>
                                <p class="text-sm text-gray-600 mb-3">15 questions • 20 minutes</p>
                                <button class="w-full bg-indigo-600 text-white py-2 px-4 rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 font-medium">
                                    Continue Quiz
                                </button>
                            </div>

                            <div class="border border-gray-200 rounded-md p-4">
                                <div class="flex justify-between items-center mb-2">
                                    <h4 class="font-medium text-gray-900">React Essentials</h4>
                                    <span class="px-2 py-1 bg-gray-100 text-gray-800 text-xs rounded-full">Not Started</span>
                                </div>
                                <p class="text-sm text-gray-600 mb-3">12 questions • 18 minutes</p>
                                <button class="w-full bg-indigo-600 text-white py-2 px-4 rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 font-medium">
                                    Start Quiz
                                </button>
                            </div>

                            <div class="border border-gray-200 rounded-md p-4">
                                <div class="flex justify-between items-center mb-2">
                                    <h4 class="font-medium text-gray-900">Backend Development</h4>
                                    <span class="px-2 py-1 bg-gray-100 text-gray-800 text-xs rounded-full">Not Started</span>
                                </div>
                                <p class="text-sm text-gray-600 mb-3">20 questions • 30 minutes</p>
                                <button class="w-full bg-indigo-600 text-white py-2 px-4 rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 font-medium">
                                    Start Quiz
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Instructor -->
                    <div class="bg-white rounded-lg shadow-sm p-6">
                        <h3 class="text-lg font-bold text-gray-900 mb-4">Your Instructor</h3>
                        <div class="flex items-start">
                            <img class="h-16 w-16 rounded-full mr-4" src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="Thomas Dubois">
                            <div>
                                <h4 class="text-lg font-medium text-gray-900">Thomas Dubois</h4>
                                <p class="text-gray-600 mb-2">Senior Developer & Instructor</p>
                                <p class="text-gray-600 mb-4">Thomas is a full-stack web developer with over 10 years of experience. He has worked for startups and large companies like Google and Facebook. Passionate about teaching, he has trained more than 15,000 students online and in-person.</p>
                                <button class="text-indigo-600 font-medium hover:text-indigo-500">View full profile</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
