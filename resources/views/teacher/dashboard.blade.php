@extends('layouts.teacher')

@section('title', 'Teacher Dashboard')
@section('page-title', 'Dashboard')

@section('content')
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-6">
        <!-- Total Courses -->
        <div class="bg-white rounded-lg shadow-sm p-6 flex items-center">
            <div class="rounded-full bg-primary-100 p-3 mr-4">
                <i class="fas fa-book text-primary-600 text-xl"></i>
            </div>
            <div>
                <h3 class="text-gray-500 text-sm">Total Courses</h3>
                <p class="text-2xl font-bold">{{ $stats['courses'] }}</p>
            </div>
        </div>

        <!-- Total Students -->
        <div class="bg-white rounded-lg shadow-sm p-6 flex items-center">
            <div class="rounded-full bg-blue-100 p-3 mr-4">
                <i class="fas fa-users text-blue-600 text-xl"></i>
            </div>
            <div>
                <h3 class="text-gray-500 text-sm">Total Students</h3>
                <p class="text-2xl font-bold">{{ $stats['students'] }}</p>
            </div>
        </div>

        <!-- Total Earnings -->
        <div class="bg-white rounded-lg shadow-sm p-6 flex items-center">
            <div class="rounded-full bg-yellow-100 p-3 mr-4">
                <i class="fas fa-dollar-sign text-yellow-600 text-xl"></i>
            </div>
            <div>
                <h3 class="text-gray-500 text-sm">Total Earnings</h3>
                <p class="text-2xl font-bold">${{ $stats['cash'] }}</p>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Recent Courses -->
        <div class="lg:col-span-2 bg-white rounded-lg shadow-sm">
            <div class="px-6 py-4 border-b border-gray-200 flex justify-between items-center">
                <h2 class="font-bold text-gray-800">Recent Courses</h2>
                <a href="/teacher/courses" class="text-primary-600 hover:text-primary-800 text-sm font-medium">View All</a>
            </div>
            <div class="p-6">
                <div class="space-y-4">
                    <!-- Course 1 -->
                    <div class="flex items-center p-3 bg-gray-50 rounded-lg">
                        <img src="/placeholder.svg?height=60&width=60" alt="Course" class="w-12 h-12 rounded-lg object-cover mr-4">
                        <div class="flex-1">
                            <h3 class="font-medium">Introduction to Web Development</h3>
                            <div class="flex items-center text-sm text-gray-500">
                            <span class="flex items-center mr-3">
                                <i class="fas fa-users mr-1"></i> 45 students
                            </span>
                                <span class="flex items-center">
                                <i class="fas fa-star mr-1 text-yellow-500"></i> 4.9
                            </span>
                            </div>
                        </div>
                        <div class="text-right">
                            <span class="text-green-600 font-medium">$49.99</span>
                            <div class="text-xs text-gray-500">Published 2 days ago</div>
                        </div>
                    </div>

                    <!-- Course 2 -->
                    <div class="flex items-center p-3 bg-gray-50 rounded-lg">
                        <img src="/placeholder.svg?height=60&width=60" alt="Course" class="w-12 h-12 rounded-lg object-cover mr-4">
                        <div class="flex-1">
                            <h3 class="font-medium">Advanced JavaScript Concepts</h3>
                            <div class="flex items-center text-sm text-gray-500">
                            <span class="flex items-center mr-3">
                                <i class="fas fa-users mr-1"></i> 32 students
                            </span>
                                <span class="flex items-center">
                                <i class="fas fa-star mr-1 text-yellow-500"></i> 4.7
                            </span>
                            </div>
                        </div>
                        <div class="text-right">
                            <span class="text-green-600 font-medium">$69.99</span>
                            <div class="text-xs text-gray-500">Published 1 week ago</div>
                        </div>
                    </div>

                    <!-- Course 3 -->
                    <div class="flex items-center p-3 bg-gray-50 rounded-lg">
                        <img src="/placeholder.svg?height=60&width=60" alt="Course" class="w-12 h-12 rounded-lg object-cover mr-4">
                        <div class="flex-1">
                            <h3 class="font-medium">Python for Data Science</h3>
                            <div class="flex items-center text-sm text-gray-500">
                            <span class="flex items-center mr-3">
                                <i class="fas fa-users mr-1"></i> 78 students
                            </span>
                                <span class="flex items-center">
                                <i class="fas fa-star mr-1 text-yellow-500"></i> 4.8
                            </span>
                            </div>
                        </div>
                        <div class="text-right">
                            <span class="text-green-600 font-medium">$79.99</span>
                            <div class="text-xs text-gray-500">Published 2 weeks ago</div>
                        </div>
                    </div>

                    <!-- Course 4 -->
                    <div class="flex items-center p-3 bg-gray-50 rounded-lg">
                        <img src="/placeholder.svg?height=60&width=60" alt="Course" class="w-12 h-12 rounded-lg object-cover mr-4">
                        <div class="flex-1">
                            <h3 class="font-medium">UI/UX Design Fundamentals</h3>
                            <div class="flex items-center text-sm text-gray-500">
                            <span class="flex items-center mr-3">
                                <i class="fas fa-users mr-1"></i> 56 students
                            </span>
                                <span class="flex items-center">
                                <i class="fas fa-star mr-1 text-yellow-500"></i> 4.6
                            </span>
                            </div>
                        </div>
                        <div class="text-right">
                            <span class="text-green-600 font-medium">$59.99</span>
                            <div class="text-xs text-gray-500">Published 3 weeks ago</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Recent Activities -->
        <div class="bg-white rounded-lg shadow-sm">
            <div class="px-6 py-4 border-b border-gray-200">
                <h2 class="font-bold text-gray-800">Recent Activities</h2>
            </div>
            <div class="p-6">
                <div class="space-y-4">
                    <!-- Activity 1 -->
                    <div class="flex">
                        <div class="flex-shrink-0">
                            <div class="flex items-center justify-center h-8 w-8 rounded-full bg-primary-100 text-primary-600">
                                <i class="fas fa-user-plus text-sm"></i>
                            </div>
                        </div>
                        <div class="ml-4">
                            <p class="text-sm font-medium text-gray-900">New student enrolled</p>
                            <p class="text-sm text-gray-500">Sarah Johnson enrolled in "Introduction to Web Development"</p>
                            <p class="text-xs text-gray-400 mt-1">2 hours ago</p>
                        </div>
                    </div>

                    <!-- Activity 2 -->
                    <div class="flex">
                        <div class="flex-shrink-0">
                            <div class="flex items-center justify-center h-8 w-8 rounded-full bg-yellow-100 text-yellow-600">
                                <i class="fas fa-star text-sm"></i>
                            </div>
                        </div>
                        <div class="ml-4">
                            <p class="text-sm font-medium text-gray-900">New course review</p>
                            <p class="text-sm text-gray-500">Michael Brown left a 5-star review on "Advanced JavaScript Concepts"</p>
                            <p class="text-xs text-gray-400 mt-1">5 hours ago</p>
                        </div>
                    </div>

                    <!-- Activity 3 -->
                    <div class="flex">
                        <div class="flex-shrink-0">
                            <div class="flex items-center justify-center h-8 w-8 rounded-full bg-blue-100 text-blue-600">
                                <i class="fas fa-comment text-sm"></i>
                            </div>
                        </div>
                        <div class="ml-4">
                            <p class="text-sm font-medium text-gray-900">New question</p>
                            <p class="text-sm text-gray-500">David Wilson asked a question in "Python for Data Science"</p>
                            <p class="text-xs text-gray-400 mt-1">Yesterday</p>
                        </div>
                    </div>

                    <!-- Activity 4 -->
                    <div class="flex">
                        <div class="flex-shrink-0">
                            <div class="flex items-center justify-center h-8 w-8 rounded-full bg-green-100 text-green-600">
                                <i class="fas fa-dollar-sign text-sm"></i>
                            </div>
                        </div>
                        <div class="ml-4">
                            <p class="text-sm font-medium text-gray-900">New sale</p>
                            <p class="text-sm text-gray-500">You earned $79.99 from a sale of "Python for Data Science"</p>
                            <p class="text-xs text-gray-400 mt-1">2 days ago</p>
                        </div>
                    </div>

                    <!-- Activity 5 -->
                    <div class="flex">
                        <div class="flex-shrink-0">
                            <div class="flex items-center justify-center h-8 w-8 rounded-full bg-purple-100 text-purple-600">
                                <i class="fas fa-certificate text-sm"></i>
                            </div>
                        </div>
                        <div class="ml-4">
                            <p class="text-sm font-medium text-gray-900">Course completion</p>
                            <p class="text-sm text-gray-500">Emily Davis completed "UI/UX Design Fundamentals"</p>
                            <p class="text-xs text-gray-400 mt-1">3 days ago</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Upcoming Schedule -->
    <div class="mt-6 bg-white rounded-lg shadow-sm">
        <div class="px-6 py-4 border-b border-gray-200">
            <h2 class="font-bold text-gray-800">Upcoming Schedule</h2>
        </div>
        <div class="p-6">
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Course</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Type</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Time</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Students</th>
                        <th scope="col" class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Action</th>
                    </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                    <!-- Schedule 1 -->
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm font-medium text-gray-900">Introduction to Web Development</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Live Session</span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Apr 18, 2025</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">10:00 AM - 11:30 AM</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">45</td>
                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                            <a href="#" class="text-primary-600 hover:text-primary-900">Start</a>
                        </td>
                    </tr>

                    <!-- Schedule 2 -->
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm font-medium text-gray-900">Advanced JavaScript Concepts</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">Q&A Session</span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Apr 19, 2025</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">2:00 PM - 3:00 PM</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">32</td>
                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                            <a href="#" class="text-primary-600 hover:text-primary-900">Start</a>
                        </td>
                    </tr>

                    <!-- Schedule 3 -->
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm font-medium text-gray-900">Python for Data Science</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-purple-100 text-purple-800">Workshop</span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Apr 20, 2025</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">1:00 PM - 3:00 PM</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">78</td>
                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                            <a href="#" class="text-primary-600 hover:text-primary-900">Start</a>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
