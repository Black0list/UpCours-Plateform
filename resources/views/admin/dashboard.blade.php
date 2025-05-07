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
                <p class="text-2xl font-bold">{{ $stats['users']->count() }}</p>
            </div>
        </div>

        <!-- Total Courses -->
        <div class="bg-white rounded-lg shadow-sm p-6 flex items-center">
            <div class="rounded-full bg-green-100 p-3 mr-4">
                <i class="fas fa-book text-green-600 text-xl"></i>
            </div>
            <div>
                <h3 class="text-gray-500 text-sm">Total Courses</h3>
                <p class="text-2xl font-bold">{{ $stats['courses']->count() }}</p>
            </div>
        </div>

        <!-- Total Revenue -->
        <div class="bg-white rounded-lg shadow-sm p-6 flex items-center">
            <div class="rounded-full bg-yellow-100 p-3 mr-4">
                <i class="fas fa-user-tag text-yellow-600 text-xl"></i>
            </div>
            <div>
                <h3 class="text-gray-500 text-sm">Total Roles</h3>
                <p class="text-2xl font-bold">{{ $stats['roles'] }}</p>
            </div>
        </div>

        <!-- Active Enrollments -->
        <div class="bg-white rounded-lg shadow-sm p-6 flex items-center">
            <div class="rounded-full bg-purple-100 p-3 mr-4">
                <i class="fas fa-user-graduate text-purple-600 text-xl"></i>
            </div>
            <div>
                <h3 class="text-gray-500 text-sm">Active Enrollments</h3>
                <p class="text-2xl font-bold">{{ $stats['enrollments'] }}</p>
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
                    <!-- User -->
                    @foreach($stats['users'] as $user)
                        <div class="flex items-center">
                            <div class="h-10 w-10 rounded-full bg-gray-200 flex items-center justify-center text-gray-600 font-bold mr-3">
                                <img src="{{ url('/storage/'.$user->photo) }}">
                            </div>
                            <div class="flex-1">
                                <h3 class="font-medium">{{ $user->full_name }}</h3>
                                <p class="text-sm text-gray-500">{{ $user->created_at->format('d M, Y h:m') }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        <!-- Recent Courses -->
        <div class="lg:col-span-2 bg-white rounded-lg shadow-sm">
            <div class="px-6 py-4 border-b border-gray-200 flex justify-between items-center">
                <h2 class="font-bold text-gray-800">Recent Courses</h2>
                <a href="/courses" class="text-primary-600 hover:text-primary-800 text-sm font-medium">View All</a>
            </div>
            <div class="p-6">
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Course</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Price</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Students</th>
                        </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                        <!-- Course -->
                        @foreach($stats['courses'] as $course)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm font-medium text-gray-900">{{ $course->title }}</div>
                                    <div class="text-xs text-gray-500">{{ $course->category->name ?? 'uncategorized' }}</div>
                                </td>
{{--                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $course->teacher->firstname }}</td>--}}
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">${{ $course->price }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $course->subscribers->count() }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
