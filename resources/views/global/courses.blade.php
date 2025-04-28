@extends('layouts.app')

@section('title', 'All Courses')
@section('meta_description', 'Discover all courses available on UpCours. Filter by category, level, and teacher to find the perfect course for you.')

@section('content')
    <!-- Courses Header -->
    <section class="bg-gradient-to-r from-indigo-600 to-purple-600 text-white py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <h1 class="text-4xl font-extrabold sm:text-5xl mb-4">Explore Our Courses</h1>
                <p class="mt-3 text-xl max-w-2xl mx-auto">Find the perfect course to develop your skills and advance your career</p>
            </div>
        </div>
    </section>

    <!-- Courses Content -->
    <section class="py-16 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-4 gap-8">
                <!-- Filters Sidebar -->
                <div class="lg:col-span-1">
                    <div class="bg-white rounded-xl shadow-md p-6 sticky top-6">
                        <h2 class="text-xl font-bold text-gray-900 mb-6">Filters</h2>
                        <form method="GET" action="/courses">
                            <!-- Search -->
                            <div class="mb-6">
                                <label for="search" class="block text-sm font-medium text-gray-700 mb-2">Search</label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                            <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                    <input type="text" id="search" name="search" value="{{ request('search') }}" placeholder="Search for a course..." class="pl-10 w-full px-4 py-2.5 rounded-lg border border-gray-300 shadow-sm focus:border-primary focus:ring-primary">
                                </div>
                            </div>

                            <!-- Categories -->
                            <div class="mb-6">
                                <h3 class="text-sm font-medium text-gray-900 mb-3">Categories</h3>
                                @if(isset($categories) && count($categories) > 0)
                                    <select name="category_id" id="category"
                                            class="mt-2 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 text-sm">
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                @else
                                    <div class="text-sm text-gray-500 italic">No categories available</div>
                                @endif
                            </div>

                            <!-- Apply Filters Button -->
                            <button type="submit" class="w-full bg-primary text-white py-2.5 px-4 rounded-lg hover:bg-primary/90 focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-2 transition-colors duration-200">
                                Apply Filters
                            </button>

                            @if(request()->has('search') || request()->has('categories'))
                                <a href="/courses" class="mt-3 text-sm text-center block text-primary hover:text-primary/80">
                                    Clear all filters
                                </a>
                            @endif
                        </form>
                    </div>
                </div>

                <!-- Courses Grid -->
                <div class="lg:col-span-3">
                    <!-- Sort Options -->
                    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-8 bg-white p-4 rounded-lg shadow-sm">
                        @if(isset($courses))
                            <p class="text-sm text-gray-500 mb-2 sm:mb-0">
                                Showing <span class="font-medium">{{ $courses->count() }}</span> courses
                            </p>
                        @endif
                    </div>

                    <!-- Courses List -->
                    @if(isset($courses) && $courses->count() > 0)
                        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                            @foreach($courses as $course)
                                <div class="bg-white rounded-xl shadow-md overflow-hidden transition-all duration-300 hover:shadow-lg hover:-translate-y-1 flex flex-col h-full">
                                    <div class="relative">
                                        <img src="{{ asset('storage/' . $course->image) }}" alt="{{ $course->title }}" class="w-full h-48 object-cover">
                                        @if(isset($course->category))
                                            <div class="absolute top-4 left-4">
                                                <span class="px-3 py-1.5 text-xs font-semibold bg-white/90 text-primary rounded-full shadow-sm">
                                                    {{ $course->category->name ?? 'Uncategorized' }}
                                                </span>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="p-6 flex flex-col flex-grow">
                                        <h3 class="text-lg font-bold text-gray-900 mb-2 line-clamp-2 h-14">{{ $course->title }}</h3>
                                        <p class="text-gray-600 text-sm mb-4 flex-grow line-clamp-3 h-18">{{ Str::limit($course->description, 120) }}</p>
                                        <div class="mt-auto">
                                            @if(isset($course->teacher))
                                                <div class="mb-4 flex items-center text-sm text-gray-500 pt-3 border-t border-gray-100">
                                                    <img src={{ url('/storage/'.$course->teacher->photo)  }} alt="Teacher" class="w-6 h-6 rounded-full mr-2">
                                                    <span class="text-green-900 font-bold">{{ $course->teacher->full_name ?? 'Instructor' }}</span>
                                                </div>
                                            @endif
                                            <div class="flex justify-between items-center pt-3 border-t border-gray-100">
                                                <span class="text-xl font-bold text-gray-900">{{ number_format($course->price, 2) }} €</span>
                                                <a href="/course/{{ $course->id }}" class="inline-flex items-center px-4 py-2 bg-primary/10 text-primary rounded-lg hover:bg-primary/20 transition-colors duration-200 font-medium text-sm">
                                                    View Course
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" viewBox="0 0 20 20" fill="currentColor">
                                                        <path fill-rule="evenodd" d="M10.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L12.586 11H5a1 1 0 110-2h7.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                                                    </svg>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <!-- Pagination -->
                        @if(method_exists($courses, 'links'))
                            <div class="mt-10">
                                {{ $courses->appends(request()->query())->links() }}
                            </div>
                        @endif
                    @else
                        <div class="bg-white rounded-xl shadow-md p-10 text-center">
                            <svg class="mx-auto h-16 w-16 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <h3 class="mt-4 text-lg font-medium text-gray-900">No courses found</h3>
                            <p class="mt-2 text-gray-500">Try adjusting your search or filter criteria.</p>
                            <div class="mt-6">
                                <a href="/courses" class="inline-flex items-center px-5 py-2.5 border border-transparent text-sm font-medium rounded-lg shadow-sm text-white bg-primary hover:bg-primary/90 focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-2 transition-colors duration-200">
                                    Clear all filters
                                </a>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>
@endsection
