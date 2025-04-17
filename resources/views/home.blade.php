@extends('layouts.app')

@section('title', 'Home')
@section('meta_description', 'UpCours - Online learning platform for everyone. Learn at your own pace with our quality courses.')

@section('content')
    <!-- Hero Section -->
    <section class="bg-gradient-to-r from-indigo-600 to-purple-600 text-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-24">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-center">
                <div>
                    <h1 class="text-4xl md:text-5xl font-extrabold tracking-tight mb-4">Learn Without Limits</h1>
                    <p class="text-xl mb-8">Develop your skills with thousands of online courses taught by experts. Learn at your own pace, wherever you are.</p>
                    <div class="flex flex-col sm:flex-row gap-4">
                        <a href="/courses" class="inline-flex items-center justify-center px-5 py-3 border border-transparent text-base font-medium rounded-md text-indigo-700 bg-white hover:bg-indigo-50">
                            Discover Courses
                        </a>
                        <a href="/register" class="inline-flex items-center justify-center px-5 py-3 border border-transparent text-base font-medium rounded-md text-white bg-indigo-800 hover:bg-indigo-700">
                            Register for Free
                        </a>
                    </div>
                </div>
                <div class="hidden md:block">
                    <img src="https://images.unsplash.com/photo-1522202176988-66273c2fd55f?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1471&q=80" alt="Students learning online" class="rounded-lg shadow-xl">
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-extrabold text-gray-900 sm:text-4xl">Why Choose UpCours?</h2>
                <p class="mt-4 text-lg text-gray-600">Our platform offers a unique learning experience tailored to your needs.</p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="bg-gray-50 p-6 rounded-lg shadow-sm">
                    <div class="w-12 h-12 bg-indigo-100 rounded-full flex items-center justify-center mb-4">
                        <svg class="w-6 h-6 text-indigo-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-2">Quality Courses</h3>
                    <p class="text-gray-600">Courses created by experts and verified by our educational team to ensure quality content.</p>
                </div>
                <div class="bg-gray-50 p-6 rounded-lg shadow-sm">
                    <div class="w-12 h-12 bg-indigo-100 rounded-full flex items-center justify-center mb-4">
                        <svg class="w-6 h-6 text-indigo-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-2">Flexible Learning</h3>
                    <p class="text-gray-600">Learn at your own pace, wherever you are. Our courses are accessible 24/7.</p>
                </div>
                <div class="bg-gray-50 p-6 rounded-lg shadow-sm">
                    <div class="w-12 h-12 bg-indigo-100 rounded-full flex items-center justify-center mb-4">
                        <svg class="w-6 h-6 text-indigo-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-2">Recognized Certification</h3>
                    <p class="text-gray-600">Obtain certificates recognized by companies to showcase your skills in the job market.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Popular Courses Section -->
    <section class="py-16 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-extrabold text-gray-900 sm:text-4xl">Popular Courses</h2>
                <p class="mt-4 text-lg text-gray-600">Discover our most popular courses loved by our students.</p>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Course Card 1 -->
                <div class="bg-white rounded-lg shadow-md overflow-hidden flex flex-col h-full transition-transform duration-300 hover:shadow-xl hover:-translate-y-1">
                    <div class="relative">
                        <img src="https://images.unsplash.com/photo-1498050108023-c5249f4df085?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1472&q=80" alt="Web Development" class="w-full h-48 object-cover">
                        <div class="absolute top-4 left-4">
                            <span class="text-xs font-semibold px-3 py-1.5 bg-indigo-100 text-indigo-800 rounded-full shadow-sm">Development</span>
                        </div>
                    </div>
                    <div class="p-6 flex-1 flex flex-col">
                        <h3 class="text-xl font-semibold text-gray-900 mb-2 line-clamp-2 h-14">Full-Stack Web Development</h3>
                        <p class="text-gray-600 mb-4 flex-grow line-clamp-3">Learn to create complete web applications with modern technologies.</p>
                        <div class="flex justify-between items-center pt-4 mt-auto border-t border-gray-100">
                            <span class="text-gray-900 font-bold text-lg">$49.99</span>
                            <a href="/courses/1" class="inline-flex items-center px-4 py-2 bg-indigo-50 border border-transparent rounded-md text-sm font-medium text-indigo-700 hover:bg-indigo-100 transition-colors duration-300">
                                View Course
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M10.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L12.586 11H5a1 1 0 110-2h7.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Course Card 2 -->
                <div class="bg-white rounded-lg shadow-md overflow-hidden flex flex-col h-full transition-transform duration-300 hover:shadow-xl hover:-translate-y-1">
                    <div class="relative">
                        <img src="https://images.unsplash.com/photo-1551288049-bebda4e38f71?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1470&q=80" alt="Artificial Intelligence" class="w-full h-48 object-cover">
                        <div class="absolute top-4 left-4">
                            <span class="text-xs font-semibold px-3 py-1.5 bg-indigo-100 text-indigo-800 rounded-full shadow-sm">Data Science</span>
                        </div>
                    </div>
                    <div class="p-6 flex-1 flex flex-col">
                        <h3 class="text-xl font-semibold text-gray-900 mb-2 line-clamp-2 h-14">Artificial Intelligence and Machine Learning</h3>
                        <p class="text-gray-600 mb-4 flex-grow line-clamp-3">Master the fundamental concepts of AI and machine learning.</p>
                        <div class="flex justify-between items-center pt-4 mt-auto border-t border-gray-100">
                            <span class="text-gray-900 font-bold text-lg">$59.99</span>
                            <a href="/courses/2" class="inline-flex items-center px-4 py-2 bg-indigo-50 border border-transparent rounded-md text-sm font-medium text-indigo-700 hover:bg-indigo-100 transition-colors duration-300">
                                View Course
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M10.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L12.586 11H5a1 1 0 110-2h7.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Course Card 3 -->
                <div class="bg-white rounded-lg shadow-md overflow-hidden flex flex-col h-full transition-transform duration-300 hover:shadow-xl hover:-translate-y-1">
                    <div class="relative">
                        <img src="https://images.unsplash.com/photo-1460925895917-afdab827c52f?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1415&q=80" alt="Digital Marketing" class="w-full h-48 object-cover">
                        <div class="absolute top-4 left-4">
                            <span class="text-xs font-semibold px-3 py-1.5 bg-indigo-100 text-indigo-800 rounded-full shadow-sm">Marketing</span>
                        </div>
                    </div>
                    <div class="p-6 flex-1 flex flex-col">
                        <h3 class="text-xl font-semibold text-gray-900 mb-2 line-clamp-2 h-14">Complete Digital Marketing</h3>
                        <p class="text-gray-600 mb-4 flex-grow line-clamp-3">Develop an effective digital marketing strategy for your business.</p>
                        <div class="flex justify-between items-center pt-4 mt-auto border-t border-gray-100">
                            <span class="text-gray-900 font-bold text-lg">$39.99</span>
                            <a href="/courses/3" class="inline-flex items-center px-4 py-2 bg-indigo-50 border border-transparent rounded-md text-sm font-medium text-indigo-700 hover:bg-indigo-100 transition-colors duration-300">
                                View Course
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M10.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L12.586 11H5a1 1 0 110-2h7.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="text-center mt-12">
                <a href="/courses" class="inline-flex items-center justify-center px-6 py-3 border border-transparent text-base font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 transition-colors duration-300 shadow-md">
                    View All Courses
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L12.586 11H5a1 1 0 110-2h7.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                    </svg>
                </a>
            </div>
        </div>
    </section>


    <!-- Contact Section (Replacing Testimonials) -->
    <section class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-extrabold text-gray-900 sm:text-4xl">Contact Us</h2>
                <p class="mt-4 text-lg text-gray-600">Have questions? We're here to help you on your learning journey.</p>
            </div>
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                <div class="bg-gray-50 p-8 rounded-lg shadow-sm">
                    <form>
                        <div class="mb-4">
                            <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Full Name</label>
                            <input type="text" id="name" name="name" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500">
                        </div>
                        <div class="mb-4">
                            <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email Address</label>
                            <input type="email" id="email" name="email" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500">
                        </div>
                        <div class="mb-4">
                            <label for="subject" class="block text-sm font-medium text-gray-700 mb-1">Subject</label>
                            <select id="subject" name="subject" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500">
                                <option value="">Select a subject</option>
                                <option value="general">General Inquiry</option>
                                <option value="support">Technical Support</option>
                                <option value="billing">Billing Question</option>
                                <option value="partnership">Partnership Opportunity</option>
                            </select>
                        </div>
                        <div class="mb-4">
                            <label for="message" class="block text-sm font-medium text-gray-700 mb-1">Message</label>
                            <textarea id="message" name="message" rows="4" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500"></textarea>
                        </div>
                        <button type="submit" class="w-full px-4 py-2 bg-indigo-600 text-white font-medium rounded-md hover:bg-indigo-700 transition-colors duration-300">
                            Send Message
                        </button>
                    </form>
                </div>
                <div class="bg-gray-50 p-8 rounded-lg shadow-sm">
                    <h3 class="text-xl font-semibold text-gray-900 mb-4">Get in Touch</h3>
                    <div class="space-y-4">
                        <div class="flex items-start">
                            <div class="flex-shrink-0 bg-indigo-100 p-3 rounded-full">
                                <svg class="w-6 h-6 text-indigo-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                </svg>
                            </div>
                            <div class="ml-4">
                                <h4 class="text-lg font-medium text-gray-900">Phone</h4>
                                <p class="text-gray-600">+1 (555) 123-4567</p>
                            </div>
                        </div>
                        <div class="flex items-start">
                            <div class="flex-shrink-0 bg-indigo-100 p-3 rounded-full">
                                <svg class="w-6 h-6 text-indigo-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                </svg>
                            </div>
                            <div class="ml-4">
                                <h4 class="text-lg font-medium text-gray-900">Email</h4>
                                <p class="text-gray-600">support@upcours.com</p>
                            </div>
                        </div>
                        <div class="flex items-start">
                            <div class="flex-shrink-0 bg-indigo-100 p-3 rounded-full">
                                <svg class="w-6 h-6 text-indigo-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                            </div>
                            <div class="ml-4">
                                <h4 class="text-lg font-medium text-gray-900">Address</h4>
                                <p class="text-gray-600">123 Learning Street, Education City, CA 94103</p>
                            </div>
                        </div>
                    </div>
                    <div class="mt-8">
                        <h3 class="text-xl font-semibold text-gray-900 mb-4">Office Hours</h3>
                        <ul class="space-y-2 text-gray-600">
                            <li>Monday - Friday: 9:00 AM - 6:00 PM</li>
                            <li>Saturday: 10:00 AM - 4:00 PM</li>
                            <li>Sunday: Closed</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Statistics Section -->
    <section class="py-16 bg-indigo-600 text-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-extrabold sm:text-4xl">Join our learning community</h2>
                <p class="mt-4 text-lg text-indigo-100">Thousands of students trust us to develop their skills.</p>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
                <div class="text-center">
                    <div class="text-4xl font-bold mb-2">10,000+</div>
                    <p class="text-indigo-100">Active Students</p>
                </div>
                <div class="text-center">
                    <div class="text-4xl font-bold mb-2">500+</div>
                    <p class="text-indigo-100">Available Courses</p>
                </div>
                <div class="text-center">
                    <div class="text-4xl font-bold mb-2">50+</div>
                    <p class="text-indigo-100">Expert Instructors</p>
                </div>
                <div class="text-center">
                    <div class="text-4xl font-bold mb-2">95%</div>
                    <p class="text-indigo-100">Satisfaction Rate</p>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-indigo-50 rounded-2xl p-8 md:p-12 lg:flex lg:items-center lg:justify-between">
                <div>
                    <h2 class="text-3xl font-extrabold text-gray-900">Ready to start your learning journey?</h2>
                    <p class="mt-4 text-lg text-gray-600">Sign up today and access thousands of online courses.</p>
                </div>
                <div class="mt-8 lg:mt-0 lg:ml-8">
                    <div class="flex flex-col sm:flex-row gap-4">
                        <a href="/register" class="inline-flex items-center justify-center px-5 py-3 border border-transparent text-base font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700">
                            Register for Free
                        </a>
                        <a href="/courses" class="inline-flex items-center justify-center px-5 py-3 border border-indigo-600 text-base font-medium rounded-md text-indigo-600 bg-white hover:bg-indigo-50">
                            Explore Courses
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
