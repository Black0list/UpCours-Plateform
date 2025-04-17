@extends('layouts.app')

@section('title', 'My Profile')

@section('content')
    <div class="max-w-5xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
        <form action="/profile/update" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="bg-white shadow-xl rounded-2xl overflow-hidden">
                <!-- Profile Header with Background -->
                <div class="relative h-48 bg-gradient-to-r from-indigo-600 to-purple-600">
                    <div class="absolute inset-0 bg-black bg-opacity-20"></div>
                    <div class="absolute top-4 left-4">
                        <h1 class="text-2xl font-bold text-white">My Profile</h1>
                    </div>
                </div>

                <!-- Profile Content -->
                <div class="px-8 py-8">
                    <!-- Photo Upload Section -->
                    <div class="flex flex-col md:flex-row gap-8 mb-10">
                        <div class="flex flex-col items-center">
                            <div class="relative group">
                                @if($user->photo)
                                    <img src="{{ url('storage/' . $user->photo) }}" alt="Profile photo"
                                         class="w-32 h-32 rounded-full object-cover border-4 border-white shadow-lg">
                                @else
                                    <div class="w-32 h-32 rounded-full bg-gray-200 flex items-center justify-center text-gray-500 text-2xl font-bold border-4 border-white shadow-lg">
                                        {{ substr($user->name, 0, 1) }}
                                    </div>
                                @endif
                                <div class="absolute inset-0 rounded-full bg-black bg-opacity-50 opacity-0 group-hover:opacity-100 flex items-center justify-center transition-opacity duration-200">
                                    <label for="photo-upload" class="cursor-pointer text-white text-sm font-medium">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mx-auto mb-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z" />
                                        </svg>
                                        Change
                                    </label>
                                    <input id="photo-upload" name="photo" type="file" accept="image/*" class="hidden">
                                </div>
                            </div>
                            <p class="text-sm text-gray-500 mt-3">Click on the photo to change it</p>
                        </div>

                        <div class="flex-1 space-y-4">
                            <div>
                                <label for="name" class="block text-sm font-medium text-gray-700">Full Name</label>
                                <input type="text" name="name" id="name" value="{{ $user->name }}"
                                       class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm p-2">
                            </div>

                            <div>
                                <label for="email" class="block text-sm font-medium text-gray-700">Email Address</label>
                                <input type="email" name="email" id="email" value="{{ $user->email }}"
                                       class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm p-2">
                            </div>

                            <div>
                                <label for="phone" class="block text-sm font-medium text-gray-700">Phone Number</label>
                                <input type="tel" name="phone" id="phone" value="{{ $user->phone }}"
                                       class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm p-2">
                            </div>
                        </div>
                    </div>

                    <!-- Account Information -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <div>
                            <h2 class="text-lg font-semibold text-gray-700 mb-4 flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-indigo-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                                Account Information
                            </h2>

                            <div class="bg-gray-50 rounded-xl p-4 space-y-3">
                                <div class="flex justify-between">
                                    <span class="text-gray-500">Account Status:</span>
                                    <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium
                                    {{ $user->isPending ? 'bg-yellow-100 text-yellow-800' : 'bg-green-100 text-green-800' }}">
                                    <span class="w-2 h-2 rounded-full mr-2
                                        {{ $user->isPending ? 'bg-yellow-400' : 'bg-green-400' }}"></span>
                                    {{ $user->isPending ? 'Pending' : 'Active' }}
                                </span>
                                </div>

                                <div class="flex justify-between">
                                    <span class="text-gray-500">Role:</span>
                                    <span class="text-gray-800 font-medium">
                                    @if($user->role_id == 1)
                                            Administrator
                                        @elseif($user->role_id == 2)
                                            Teacher
                                        @elseif($user->role_id == 3)
                                            Student
                                        @else
                                            Role #{{ $user->role_id }}
                                        @endif
                                </span>
                                </div>

                                <div class="flex justify-between">
                                    <span class="text-gray-500">Member Since:</span>
                                    <span class="text-gray-800 font-medium">{{ $user->created_at->format('M d, Y') }}</span>
                                </div>
                            </div>
                        </div>

                        <div>
                            <h2 class="text-lg font-semibold text-gray-700 mb-4 flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-indigo-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                </svg>
                                Security
                            </h2>

                            <div class="bg-gray-50 rounded-xl p-4 space-y-4">
                                <div>
                                    <label for="current_password" class="block text-sm font-medium text-gray-700">Current Password</label>
                                    <input type="password" name="current_password" id="current_password"
                                           class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm p-2">
                                    <p class="mt-1 text-xs text-gray-500">Required to change your password</p>
                                </div>

                                <div>
                                    <label for="password" class="block text-sm font-medium text-gray-700">New Password</label>
                                    <input type="password" name="password" id="password"
                                           class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm p-2">
                                </div>

                                <div>
                                    <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Confirm New Password</label>
                                    <input type="password" name="password_confirmation" id="password_confirmation"
                                           class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm p-2">
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="mt-10 flex justify-end space-x-3">
                        <a href="/profile" class="inline-flex justify-center py-2 px-4 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            Cancel
                        </a>
                        <button type="submit" class="inline-flex justify-center py-2 px-6 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            Save Changes
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <!-- Preview Image Script -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const photoInput = document.getElementById('photo-upload');
            const photoPreview = photoInput.closest('.relative').querySelector('img, div');

            photoInput.addEventListener('change', function() {
                if (this.files && this.files[0]) {
                    const reader = new FileReader();

                    reader.onload = function(e) {
                        if (photoPreview.tagName === 'IMG') {
                            photoPreview.src = e.target.result;
                        }
                        else {
                            const img = document.createElement('img');
                            img.src = e.target.result;
                            img.alt = "Profile photo";
                            img.className = "w-32 h-32 rounded-full object-cover border-4 border-white shadow-lg";
                            photoPreview.parentNode.replaceChild(img, photoPreview);
                        }
                    }

                    reader.readAsDataURL(this.files[0]);
                }
            });
        });
    </script>
@endsection
