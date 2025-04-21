@extends('layouts.admin')

@section('title', 'Admin Dashboard')
@section('page-title', 'Dashboard Overview')

@section('content')
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">
        <!-- Total Users -->
        <div class="bg-white rounded-lg shadow-sm p-6 flex items-center">
            <div class="rounded-full bg-blue-100 p-3 mr-4">
                <i class="fas fa-users text-blue-600 text-xl"></i>
            </div>
            <div>
                <h3 class="text-gray-500 text-sm">Total Users</h3>
                <p class="text-2xl font-bold">1,248</p>
            </div>
        </div>

        <!-- Total Courses -->
        <div class="bg-white rounded-lg shadow-sm p-6 flex items-center">
            <div class="rounded-full bg-green-100 p-3 mr-4">
                <i class="fas fa-book text-green-600 text-xl"></i>
            </div>
            <div>
                <h3 class="text-gray-500 text-sm">Total Courses</h3>
                <p class="text-2xl font-bold">86</p>
            </div>
        </div>

        <!-- Total Revenue -->
        <div class="bg-white rounded-lg shadow-sm p-6 flex items-center">
            <div class="rounded-full bg-yellow-100 p-3 mr-4">
                <i class="fas fa-dollar-sign text-yellow-600 text-xl"></i>
            </div>
            <div>
                <h3 class="text-gray-500 text-sm">Total Revenue</h3>
                <p class="text-2xl font-bold">$24,389</p>
            </div>
        </div>

        <!-- Active Enrollments -->
        <div class="bg-white rounded-lg shadow-sm p-6 flex items-center">
            <div class="rounded-full bg-purple-100 p-3 mr-4">
                <i class="fas fa-user-graduate text-purple-600 text-xl"></i>
            </div>
            <div>
                <h3 class="text-gray-500 text-sm">Active Enrollments</h3>
                <p class="text-2xl font-bold">3,156</p>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Recent Users -->
        <div class="lg:col-span-1 bg-white rounded-lg shadow-sm">
            <div class="px-6 py-4 border-b border-gray-200 flex justify-between items-center">
                <h2 class="font-bold text-gray-800">Recent Users</h2>
                <a href="/admin/users" class="text-primary-600 hover:text-primary-800 text-sm font-medium">View All</a>
            </div>
            <div class="p-6">
                <div class="space-y-4">
                    <!-- User 1 -->
                    <div class="flex items-center">
                        <div class="h-10 w-10 rounded-full bg-gray-200 flex items-center justify-center text-gray-600 font-bold mr-3">
                            J
                        </div>
                        <div class="flex-1">
                            <h3 class="font-medium">John Doe</h3>
                            <p class="text-sm text-gray-500">Student • Joined 2 days ago</p>
                        </div>
                    </div>

                    <!-- User 2 -->
                    <div class="flex items-center">
                        <div class="h-10 w-10 rounded-full bg-gray-200 flex items-center justify-center text-gray-600 font-bold mr-3">
                            S
                        </div>
                        <div class="flex-1">
                            <h3 class="font-medium">Sarah Johnson</h3>
                            <p class="text-sm text-gray-500">Teacher • Joined 3 days ago</p>
                        </div>
                    </div>

                    <!-- User 3 -->
                    <div class="flex items-center">
                        <div class="h-10 w-10 rounded-full bg-gray-200 flex items-center justify-center text-gray-600 font-bold mr-3">
                            M
                        </div>
                        <div class="flex-1">
                            <h3 class="font-medium">Michael Brown</h3>
                            <p class="text-sm text-gray-500">Student • Joined 5 days ago</p>
                        </div>
                    </div>

                    <!-- User 4 -->
                    <div class="flex items-center">
                        <div class="h-10 w-10 rounded-full bg-gray-200 flex items-center justify-center text-gray-600 font-bold mr-3">
                            E
                        </div>
                        <div class="flex-1">
                            <h3 class="font-medium">Emily Davis</h3>
                            <p class="text-sm text-gray-500">Student • Joined 1 week ago</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Recent Courses -->
        <div class="lg:col-span-2 bg-white rounded-lg shadow-sm">
            <div class="px-6 py-4 border-b border-gray-200 flex justify-between items-center">
                <h2 class="font-bold text-gray-800">Recent Courses</h2>
                <a href="/admin/courses" class="text-primary-600 hover:text-primary-800 text-sm font-medium">View All</a>
            </div>
            <div class="p-6">
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Course</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Instructor</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Price</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Students</th>
                        </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                        <!-- Course 1 -->
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm font-medium text-gray-900">Introduction to Web Development</div>
                                <div class="text-xs text-gray-500">Web Development</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Sarah Johnson</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                    Published
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">$49.99</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">45</td>
                        </tr>

                        <!-- Course 2 -->
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm font-medium text-gray-900">Advanced JavaScript Concepts</div>
                                <div class="text-xs text-gray-500">Web Development</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">David Wilson</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                    Published
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">$69.99</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">32</td>
                        </tr>

                        <!-- Course 3 -->
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm font-medium text-gray-900">Python for Data Science</div>
                                <div class="text-xs text-gray-500">Data Science</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Michael Brown</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">
                                    Draft
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">$79.99</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">0</td>
                        </tr>

                        <!-- Course 4 -->
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm font-medium text-gray-900">UI/UX Design Fundamentals</div>
                                <div class="text-xs text-gray-500">Design</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Emily Davis</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                    Published
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">$59.99</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">56</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- System Status -->
    <div class="mt-6 bg-white rounded-lg shadow-sm">
        <div class="px-6 py-4 border-b border-gray-200">
            <h2 class="font-bold text-gray-800">System Status</h2>
        </div>
        <div class="p-6">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="bg-gray-50 rounded-lg p-4">
                    <div class="flex items-center justify-between mb-2">
                        <h3 class="text-sm font-medium text-gray-700">Server Load</h3>
                        <span class="text-green-600 text-sm font-medium">Healthy</span>
                    </div>
                    <div class="w-full bg-gray-200 rounded-full h-2.5">
                        <div class="bg-green-600 h-2.5 rounded-full" style="width: 25%"></div>
                    </div>
                    <p class="mt-2 text-xs text-gray-500">Current load: 25%</p>
                </div>

                <div class="bg-gray-50 rounded-lg p-4">
                    <div class="flex items-center justify-between mb-2">
                        <h3 class="text-sm font-medium text-gray-700">Storage</h3>
                        <span class="text-yellow-600 text-sm font-medium">Moderate</span>
                    </div>
                    <div class="w-full bg-gray-200 rounded-full h-2.5">
                        <div class="bg-yellow-600 h-2.5 rounded-full" style="width: 65%"></div>
                    </div>
                    <p class="mt-2 text-xs text-gray-500">Used: 65% of 500GB</p>
                </div>

                <div class="bg-gray-50 rounded-lg p-4">
                    <div class="flex items-center justify-between mb-2">
                        <h3 class="text-sm font-medium text-gray-700">Memory</h3>
                        <span class="text-green-600 text-sm font-medium">Optimal</span>
                    </div>
                    <div class="w-full bg-gray-200 rounded-full h-2.5">
                        <div class="bg-green-600 h-2.5 rounded-full" style="width: 40%"></div>
                    </div>
                    <p class="mt-2 text-xs text-gray-500">Used: 40% of 16GB</p>
                </div>
            </div>
        </div>
    </div>
@endsection
