<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UpCours - @yield('title', 'Administration')</title>
    <meta name="description" content="@yield('meta_description', 'UpCours - Administration Panel')">

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: {
                            50: '#f0fdf4',
                            100: '#dcfce7',
                            200: '#bbf7d0',
                            300: '#86efac',
                            400: '#4ade80',
                            500: '#22c55e',
                            600: '#16a34a',
                            700: '#15803d',
                            800: '#166534',
                            900: '#14532d',
                        }
                    }
                }
            }
        }
    </script>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <!-- Custom Styles -->
    <style>
        /* Smooth transitions */
        .transition-all {
            transition-property: all;
            transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
            transition-duration: 150ms;
        }

        /* Sidebar active item styling */
        .sidebar-active {
            background-color: #16a34a;
            color: white;
        }

        /* Hover effect for sidebar items */
        .sidebar-item:hover {
            background-color: rgba(22, 163, 74, 0.1);
        }
    </style>

    @yield('styles')
</head>
<body class="bg-gray-50">
<div class="flex h-screen overflow-hidden">
    <!-- Sidebar -->
    <div class="hidden md:flex md:flex-shrink-0">
        <div class="flex flex-col w-64 bg-white border-r border-gray-200">
            <div class="flex items-center h-16 px-4 border-b border-gray-200">
                <span class="text-xl font-bold text-primary-600">UpCours Admin</span>
            </div>
            <div class="flex flex-col flex-grow px-4 py-4 overflow-y-auto">
                <div class="flex flex-col flex-grow space-y-1">
                    <!-- Dashboard Link -->
                    <a href="/admin/dashboard" class="flex items-center px-3 py-2 text-sm font-medium rounded-md transition-all sidebar-item {{ request()->is('admin/dashboard*') ? 'sidebar-active' : 'text-gray-700 hover:text-primary-600' }}">
                        <i class="fas fa-tachometer-alt w-5 h-5 mr-3 {{ request()->is('admin/dashboard*') ? 'text-white' : 'text-primary-500' }}"></i>
                        Dashboard
                    </a>

                    <!-- Teacher Validation Link -->
                    <a href="{{ route('admin.validation') }}" class="flex items-center px-3 py-2 text-sm font-medium rounded-md transition-all sidebar-item {{ request()->is('admin/validation*') ? 'sidebar-active' : 'text-gray-700 hover:text-primary-600' }}">
                        <i class="fas fa-user-check w-5 h-5 mr-3 {{ request()->is('admin/validation*') ? 'text-white' : 'text-primary-500' }}"></i>
                        Teacher Validation
                    </a>

                    <!-- Categories Link -->
                    <a href="/admin/categories" class="flex items-center px-3 py-2 text-sm font-medium rounded-md transition-all sidebar-item {{ request()->is('admin/categories*') ? 'sidebar-active' : 'text-gray-700 hover:text-primary-600' }}">
                        <i class="fas fa-folder-open w-5 h-5 mr-3 {{ request()->is('admin/categories*') ? 'text-white' : 'text-primary-500' }}"></i>
                        Categories
                    </a>

                    <!-- Roles Link -->
                    <a href="/admin/roles" class="flex items-center px-3 py-2 text-sm font-medium rounded-md transition-all sidebar-item {{ request()->is('admin/roles*') ? 'sidebar-active' : 'text-gray-700 hover:text-primary-600' }}">
                        <i class="fas fa-user-tag w-5 h-5 mr-3 {{ request()->is('admin/roles*') ? 'text-white' : 'text-primary-500' }}"></i>
                        Roles
                    </a>

                    <!-- Tags Link -->
                    <a href="/admin/tags" class="flex items-center px-3 py-2 text-sm font-medium rounded-md transition-all sidebar-item {{ request()->is('admin/tags*') ? 'sidebar-active' : 'text-gray-700 hover:text-primary-600' }}">
                        <i class="fas fa-tags w-5 h-5 mr-3 {{ request()->is('admin/tags*') ? 'text-white' : 'text-primary-500' }}"></i>
                        Tags
                    </a>

                    <!-- Badges Link -->
                    <a href="/admin/badges" class="flex items-center px-3 py-2 text-sm font-medium rounded-md transition-all sidebar-item {{ request()->is('admin/badges*') ? 'sidebar-active' : 'text-gray-700 hover:text-primary-600' }}">
                        <i class="fas fa-award w-5 h-5 mr-3 {{ request()->is('admin/badges*') ? 'text-white' : 'text-primary-500' }}"></i>
                        Badges
                    </a>
                </div>
                <div class="pt-4 mt-6 border-t border-gray-200">
                    <div class="px-2 space-y-1">
                        <a href="/logout" class="flex items-center px-3 py-2 text-sm font-medium rounded-md text-gray-700 hover:text-primary-600 hover:bg-gray-50 transition-all">
                            <i class="fas fa-sign-out-alt w-5 h-5 mr-3 text-primary-500"></i>
                            Logout
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="flex flex-col flex-1 overflow-hidden">
        <!-- Top Navigation -->
        <div class="bg-white border-b border-gray-200">
            <div class="px-4 sm:px-6 lg:px-8">
                <div class="flex items-center justify-between h-16">
                    <div class="flex items-center">
                        <button class="px-4 text-gray-500 focus:outline-none focus:ring-2 focus:ring-primary-500 md:hidden" id="mobile-menu-button">
                            <span class="sr-only">Open menu</span>
                            <i class="fas fa-bars w-6 h-6"></i>
                        </button>
                        <div class="ml-4 md:ml-0">
                            <h1 class="text-xl font-bold text-gray-900">@yield('page-title', 'Dashboard')</h1>
                        </div>
                    </div>
                    <div class="flex items-center">
                        <!-- User Profile Dropdown -->
                        <div class="relative ml-3">
                            <div>
                                <button type="button" class="flex items-center space-x-3 text-sm rounded-full focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-500" id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                                    <span class="sr-only">Open user menu</span>
                                    <img class="h-8 w-8 rounded-full" src={{ url('/storage/'.Auth::user()->photo)}} alt="userPhoto" />
                                    <span class="hidden md:block text-gray-700">{{ Auth::user()->full_name }}</span>
                                    <i class="fas fa-chevron-down text-gray-400 text-xs"></i>
                                </button>
                            </div>

                            <!-- User Dropdown Menu (Hidden by default) -->
                            <div class="absolute right-0 z-10 hidden w-48 mt-2 origin-top-right bg-white rounded-md shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none" id="user-dropdown" role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1">
                                <div class="py-1" role="none">
                                    <a href="/profile" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem" tabindex="-1" id="user-menu-item-0">Your Profile</a>
                                    <a href="/logout" class="block px-4 py-2 text-sm text-red-700 hover:bg-red-100" role="menuitem" tabindex="-1" id="user-menu-item-2">Logout</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Mobile Navigation (Hidden by default) -->
        <div class="md:hidden hidden" id="mobile-menu">
            <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3 bg-white border-b border-gray-200">
                <!-- Dashboard Link (Mobile) -->
                <a href="/admin/dashboard" class="block px-3 py-2 text-base font-medium rounded-md {{ request()->is('admin/dashboard*') ? 'bg-primary-500 text-white' : 'text-gray-700 hover:bg-primary-50 hover:text-primary-600' }}">
                    <i class="fas fa-tachometer-alt mr-3 {{ request()->is('admin/dashboard*') ? 'text-white' : 'text-primary-500' }}"></i>
                    Dashboard
                </a>

                <!-- Teacher Validation Link (Mobile) -->
                <a href="{{ route('admin.validation') }}" class="block px-3 py-2 text-base font-medium rounded-md {{ request()->is('admin/validation*') ? 'bg-primary-500 text-white' : 'text-gray-700 hover:bg-primary-50 hover:text-primary-600' }}">
                    <i class="fas fa-user-check mr-3 {{ request()->is('admin/validation*') ? 'text-white' : 'text-primary-500' }}"></i>
                    Teacher Validation
                </a>

                <a href="/admin/categories" class="block px-3 py-2 text-base font-medium rounded-md {{ request()->is('admin/categories*') ? 'bg-primary-500 text-white' : 'text-gray-700 hover:bg-primary-50 hover:text-primary-600' }}">
                    <i class="fas fa-folder-open mr-3 {{ request()->is('admin/categories*') ? 'text-white' : 'text-primary-500' }}"></i>
                    Categories
                </a>
                <a href="/admin/roles" class="block px-3 py-2 text-base font-medium rounded-md {{ request()->is('admin/roles*') ? 'bg-primary-500 text-white' : 'text-gray-700 hover:bg-primary-50 hover:text-primary-600' }}">
                    <i class="fas fa-user-tag mr-3 {{ request()->is('admin/roles*') ? 'text-white' : 'text-primary-500' }}"></i>
                    Roles
                </a>
                <a href="/admin/tags" class="block px-3 py-2 text-base font-medium rounded-md {{ request()->is('admin/tags*') ? 'bg-primary-500 text-white' : 'text-gray-700 hover:bg-primary-50 hover:text-primary-600' }}">
                    <i class="fas fa-tags mr-3 {{ request()->is('admin/tags*') ? 'text-white' : 'text-primary-500' }}"></i>
                    Tags
                </a>
                <a href="/admin/badges" class="block px-3 py-2 text-base font-medium rounded-md {{ request()->is('admin/badges*') ? 'bg-primary-500 text-white' : 'text-gray-700 hover:bg-primary-50 hover:text-primary-600' }}">
                    <i class="fas fa-award mr-3 {{ request()->is('admin/badges*') ? 'text-white' : 'text-primary-500' }}"></i>
                    Badges
                </a>
            </div>
            <div class="pt-4 pb-3 border-t border-gray-200">
                <div class="flex items-center px-5">
                    <div class="flex-shrink-0">
                        <img class="w-10 h-10 rounded-full" src={{ url('/storage/'.Auth::user()->photo)  || "/placeholder.svg"}} alt="">
                    </div>
                    <div class="ml-3">
                        <div class="text-base font-medium text-gray-800">{{ Auth::user()->full_name }}</div>
                    </div>
                </div>
                <div class="px-2 mt-3 space-y-1">
                    <a href="/profile" class="block px-3 py-2 text-base font-medium text-gray-700 hover:bg-gray-100 rounded-md">Your Profile</a>
                    <a href="/logout" class="block px-3 py-2 text-base font-medium text-red-700 hover:bg-red-100 rounded-md">Logout</a>
                </div>
            </div>
        </div>

        <!-- Main Content Area -->
        <main class="flex-1 overflow-y-auto bg-gray-50">
            <div class="py-6">
                <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
                    @yield('content')
                </div>
            </div>
        </main>
    </div>
</div>

<!-- Success Notification (Hidden by default) -->
<div id="success-notification" class="fixed inset-0 flex items-end justify-center px-4 py-6 pointer-events-none sm:p-6 sm:items-start sm:justify-end hidden">
    <div class="max-w-sm w-full bg-white shadow-lg rounded-lg pointer-events-auto ring-1 ring-black ring-opacity-5 overflow-hidden">
        <div class="p-4">
            <div class="flex items-start">
                <div class="flex-shrink-0">
                    <i class="fas fa-check-circle text-primary-500 text-lg"></i>
                </div>
                <div class="ml-3 w-0 flex-1 pt-0.5">
                    <p class="text-sm font-medium text-gray-900" id="notification-title">
                        Operation successful
                    </p>
                    <p class="mt-1 text-sm text-gray-500" id="notification-message">
                        Changes have been saved successfully.
                    </p>
                </div>
                <div class="ml-4 flex-shrink-0 flex">
                    <button id="close-notification" class="bg-white rounded-md inline-flex text-gray-400 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-500">
                        <span class="sr-only">Close</span>
                        <i class="fas fa-times text-lg"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Error Notification (Hidden by default) -->
<div id="error-notification" class="fixed inset-0 flex items-end justify-center px-4 py-6 pointer-events-none sm:p-6 sm:items-start sm:justify-end hidden">
    <div class="max-w-sm w-full bg-white shadow-lg rounded-lg pointer-events-auto ring-1 ring-black ring-opacity-5 overflow-hidden">
        <div class="p-4">
            <div class="flex items-start">
                <div class="flex-shrink-0">
                    <i class="fas fa-exclamation-circle text-red-500 text-lg"></i>
                </div>
                <div class="ml-3 w-0 flex-1 pt-0.5">
                    <p class="text-sm font-medium text-gray-900" id="error-title">
                        Error
                    </p>
                    <p class="mt-1 text-sm text-gray-500" id="error-message">
                        An error occurred. Please try again.
                    </p>
                </div>
                <div class="ml-4 flex-shrink-0 flex">
                    <button id="close-error" class="bg-white rounded-md inline-flex text-gray-400 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-500">
                        <span class="sr-only">Close</span>
                        <i class="fas fa-times text-lg"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Common JavaScript -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Mobile menu toggle
        const mobileMenuButton = document.getElementById('mobile-menu-button');
        const mobileMenu = document.getElementById('mobile-menu');

        if (mobileMenuButton && mobileMenu) {
            mobileMenuButton.addEventListener('click', function() {
                mobileMenu.classList.toggle('hidden');
            });
        }

        // User menu toggle
        const userMenuButton = document.getElementById('user-menu-button');
        const userDropdown = document.getElementById('user-dropdown');

        if (userMenuButton && userDropdown) {
            userMenuButton.addEventListener('click', function() {
                userDropdown.classList.toggle('hidden');
            });
        }

        // Close dropdowns when clicking outside
        document.addEventListener('click', function(event) {
            if (userMenuButton && userDropdown && !userMenuButton.contains(event.target) && !userDropdown.contains(event.target)) {
                userDropdown.classList.add('hidden');
            }

            if (mobileMenuButton && mobileMenu && !mobileMenuButton.contains(event.target) && !mobileMenu.contains(event.target)) {
                mobileMenu.classList.add('hidden');
            }
        });

        // Close notification buttons
        const closeNotification = document.getElementById('close-notification');
        const successNotification = document.getElementById('success-notification');

        if (closeNotification && successNotification) {
            closeNotification.addEventListener('click', function() {
                successNotification.classList.add('hidden');
            });
        }

        const closeError = document.getElementById('close-error');
        const errorNotification = document.getElementById('error-notification');

        if (closeError && errorNotification) {
            closeError.addEventListener('click', function() {
                errorNotification.classList.add('hidden');
            });
        }

        // Function to show success notification
        window.showSuccessNotification = function(title, message) {
            const notificationTitle = document.getElementById('notification-title');
            const notificationMessage = document.getElementById('notification-message');

            if (notificationTitle && title) {
                notificationTitle.textContent = title;
            }

            if (notificationMessage && message) {
                notificationMessage.textContent = message;
            }

            if (successNotification) {
                successNotification.classList.remove('hidden');

                // Auto-hide after 3 seconds
                setTimeout(() => {
                    successNotification.classList.add('hidden');
                }, 3000);
            }
        };

        // Function to show error notification
        window.showErrorNotification = function(title, message) {
            const errorTitle = document.getElementById('error-title');
            const errorMessage = document.getElementById('error-message');

            if (errorTitle && title) {
                errorTitle.textContent = title;
            }

            if (errorMessage && message) {
                errorMessage.textContent = message;
            }

            if (errorNotification) {
                errorNotification.classList.remove('hidden');

                // Auto-hide after 5 seconds
                setTimeout(() => {
                    errorNotification.classList.add('hidden');
                }, 5000);
            }
        };
    });
</script>

@yield('scripts')
</body>
</html>
