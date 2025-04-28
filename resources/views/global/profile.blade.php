@extends('layouts.app')

@section('title', 'My Profile')

@section('styles')
    <style>
        .profile-header {
            background-image: linear-gradient(to right, #4f46e5, #7c3aed);
            position: relative;
        }

        .profile-header::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            height: 40px;
            background-color: white;
            border-radius: 40px 40px 0 0;
        }

        .photo-upload-hover {
            opacity: 0;
            transition: all 0.3s ease;
        }

        .photo-upload-container:hover .photo-upload-hover {
            opacity: 1;
        }

        .input-focus-ring:focus {
            box-shadow: 0 0 0 2px rgba(79, 70, 229, 0.2);
        }

        @media (max-width: 768px) {
            .profile-header::after {
                height: 20px;
            }
        }
    </style>
@endsection

@section('content')
    <div class="w-full bg-gray-50 min-h-screen pb-12">
        <form action="/profile/update" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <!-- Profile Header with Background -->
            <div class="profile-header w-full h-64 md:h-80 relative">
                <div class="absolute inset-0 bg-black bg-opacity-20"></div>
                <div class="container mx-auto px-4 h-full flex items-start pt-8 md:pt-12 relative z-10">
                    <h1 class="text-3xl md:text-4xl font-bold text-white">My Profile</h1>
                </div>

                <!-- Profile Photo (Positioned for overlap) -->
                <div class="absolute -bottom-16 md:-bottom-20 left-1/2 transform -translate-x-1/2 z-20">
                    <div class="photo-upload-container relative group">
                        @if(Auth::user()->photo)
                            <img src="{{ url('storage/' . Auth::user()->photo) }}" alt="Profile photo"
                                 class="w-32 h-32 md:w-40 md:h-40 rounded-full object-cover border-4 border-white shadow-lg">
                        @else
                            <div class="w-32 h-32 md:w-40 md:h-40 rounded-full bg-gray-200 flex items-center justify-center text-gray-500 text-3xl md:text-4xl font-bold border-4 border-white shadow-lg">
                                {{ substr(Auth::user()->firstname, 0, 1) }}
                            </div>
                        @endif
                        <div class="photo-upload-hover absolute inset-0 rounded-full bg-black bg-opacity-50 flex items-center justify-center">
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
                    <p class="text-sm text-gray-500 mt-3 text-center">Click to change photo</p>
                </div>
            </div>

            <!-- Profile Content -->
            <div class="container mx-auto px-4 mt-24 md:mt-28">
                <div class="bg-white shadow-xl rounded-xl overflow-hidden">
                    <div class="p-6 md:p-8">
                        <!-- Basic Information -->
                        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 lg:gap-12">
                            <div class="space-y-6">
                                <h2 class="text-xl font-semibold text-gray-800 flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-indigo-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                    </svg>
                                    Personal Information
                                </h2>

                                <div class="space-y-4">
                                    <div>
                                        <label for="firstname" class="block text-sm font-medium text-gray-700 mb-1">First Name</label>
                                        <input type="text" name="name" id="name" value="{{ Auth::user()->firstname }}"
                                               class="block w-full border border-gray-300 rounded-lg px-4 py-3 text-gray-700 focus:outline-none focus:border-indigo-500 input-focus-ring transition">
                                    </div>

                                    <div>
                                        <label for="lastname" class="block text-sm font-medium text-gray-700 mb-1">Last Name</label>
                                        <input type="text" name="name" id="name" value="{{ Auth::user()->lastname }}"
                                               class="block w-full border border-gray-300 rounded-lg px-4 py-3 text-gray-700 focus:outline-none focus:border-indigo-500 input-focus-ring transition">
                                    </div>

                                    <div>
                                        <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email Address</label>
                                        <input type="email" name="email" id="email" value="{{ Auth::user()->email }}"
                                               class="block w-full border border-gray-300 rounded-lg px-4 py-3 text-gray-700 focus:outline-none focus:border-indigo-500 input-focus-ring transition">
                                    </div>

                                    <div>
                                        <label for="phone" class="block text-sm font-medium text-gray-700 mb-1">Phone Number</label>
                                        <input type="tel" name="phone" id="phone" value="{{ Auth::user()->phone }}"
                                               class="block w-full border border-gray-300 rounded-lg px-4 py-3 text-gray-700 focus:outline-none focus:border-indigo-500 input-focus-ring transition">
                                    </div>
                                </div>

                                <!-- Account Information Card -->
                                <div class="bg-gray-50 rounded-xl p-6">
                                    <h3 class="text-lg font-medium text-gray-800 mb-4">Account Information</h3>

                                    <div class="space-y-4">
                                        <div class="flex justify-between items-center">
                                            <span class="text-gray-600">Account Status:</span>
                                            <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium
                                        {{ Auth::user()->isPending ? 'bg-yellow-100 text-yellow-800' : 'bg-green-100 text-green-800' }}">
                                            <span class="w-2 h-2 rounded-full mr-2
                                                {{ Auth::user()->isPending ? 'bg-yellow-400' : 'bg-green-400' }}"></span>
                                            {{ Auth::user()->isPending ? 'Pending' : 'Active' }}
                                        </span>
                                        </div>

                                        <div class="flex justify-between items-center">
                                            <span class="text-gray-600">Role:</span>
                                            <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-green-100 text-green-800">{{ Auth::user()->role->role_name }}</span>
                                        </div>

                                        <div class="flex justify-between items-center">
                                            <span class="text-gray-600">Member Since:</span>
                                            <span class="text-gray-800 font-medium">{{ Auth::user()->created_at->format('M d, Y') }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="space-y-6">
                                <h2 class="text-xl font-semibold text-gray-800 flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-indigo-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                    </svg>
                                    Security
                                </h2>

                                <div class="bg-gray-50 rounded-xl p-6">
                                    <div class="space-y-5">
                                        <div>
                                            <label for="current_password" class="block text-sm font-medium text-gray-700 mb-1">Current Password</label>
                                            <input type="password" name="current_password" id="current_password"
                                                   class="block w-full border border-gray-300 rounded-lg px-4 py-3 text-gray-700 focus:outline-none focus:border-indigo-500 input-focus-ring transition">
                                            <p class="mt-1 text-xs text-gray-500">Required to change your password</p>
                                        </div>

                                        <div>
                                            <label for="password" class="block text-sm font-medium text-gray-700 mb-1">New Password</label>
                                            <input type="password" name="password" id="password"
                                                   class="block w-full border border-gray-300 rounded-lg px-4 py-3 text-gray-700 focus:outline-none focus:border-indigo-500 input-focus-ring transition">
                                        </div>

                                        <div>
                                            <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-1">Confirm New Password</label>
                                            <input type="password" name="password_confirmation" id="password_confirmation"
                                                   class="block w-full border border-gray-300 rounded-lg px-4 py-3 text-gray-700 focus:outline-none focus:border-indigo-500 input-focus-ring transition">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Action Buttons -->
                        <div class="mt-10 flex flex-col sm:flex-row justify-end gap-3">
                            <a href="/" class="inline-flex justify-center items-center py-3 px-5 border border-gray-300 rounded-lg text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-colors">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                                </svg>
                                Back to Home
                            </a>
                            <button type="submit" class="inline-flex justify-center items-center py-3 px-6 border border-transparent rounded-lg text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-colors">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                                Save Changes
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <!-- Preview Image Script -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const photoInput = document.getElementById('photo-upload');
            const photoPreview = photoInput.closest('.photo-upload-container').querySelector('img, div');

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
                            img.className = "w-32 h-32 md:w-40 md:h-40 rounded-full object-cover border-4 border-white shadow-lg";
                            photoPreview.parentNode.replaceChild(img, photoPreview);
                        }
                    }

                    reader.readAsDataURL(this.files[0]);
                }
            });
        });
    </script>
@endsection
