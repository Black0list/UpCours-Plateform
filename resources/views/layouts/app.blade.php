<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UpCours - @yield('title', 'Online Learning Platform')</title>
    <meta name="description" content="@yield('meta_description', 'UpCours - The online learning platform for everyone')">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" type="image/x-icon" href="./assets/icons/book.png">
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Custom Styles -->
    <style>
        /* Dropdown animation */
        .dropdown-enter {
            opacity: 0;
            transform: translateY(-10px);
        }
        .dropdown-enter-active {
            opacity: 1;
            transform: translateY(0);
            transition: opacity 200ms, transform 200ms;
        }
        .dropdown-exit {
            opacity: 1;
        }
        .dropdown-exit-active {
            opacity: 0;
            transform: translateY(-10px);
            transition: opacity 200ms, transform 200ms;
        }
    </style>
    @yield('styles')
</head>
<body class="bg-gray-50 min-h-screen flex flex-col">
<!-- Navigation Bar -->
<header class="bg-white shadow-sm">
    <nav class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="flex-shrink-0 flex items-center">
                    <a href="/" class="text-2xl font-bold text-indigo-600">UpCours</a>
                </div>

                <!-- Desktop Navigation Links -->
                <div class="hidden sm:ml-6 sm:flex sm:space-x-8">
                    <a href="/" class="{{ Request::is('/') ? 'border-indigo-500 text-gray-900' : 'border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700' }} inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium transition-colors duration-200">
                        Home
                    </a>
                    <a href="/courses" class="{{ Request::is('courses*') ? 'border-indigo-500 text-gray-900' : 'border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700' }} inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium transition-colors duration-200">
                        Courses
                    </a>
                </div>
            </div>

            <!-- Desktop User Links -->
            <div class="hidden sm:ml-6 sm:flex sm:items-center">
                {{-- Visitor Links (Shown only if not authenticated) --}}
                @guest
                    <div class="flex space-x-4">
                        <a href="/login" class="text-gray-500 hover:text-gray-700 px-3 py-2 rounded-md text-sm font-medium">Login</a>
                        <a href="/register" class="bg-indigo-600 text-white hover:bg-indigo-700 px-3 py-2 rounded-md text-sm font-medium">Register</a>
                    </div>
                @endguest

                {{-- Authenticated User Links --}}
                @auth
                    <div class="flex items-center space-x-4">
                        {{-- Role-specific links --}}
                        @if(Auth::user()->role->role_name === 'student')
                            <p class="text-sm font-medium text-gray-900">{{ Auth::user()->name }}</p>
                        @elseif(Auth::user()->role->role_name === 'teacher')
                            <a href="/teacher/dashboard" class="text-gray-500 hover:text-gray-700 px-3 py-2 rounded-md text-sm font-medium">Dashboard</a>
                            <a href="/teacher/courses" class="text-gray-500 hover:text-gray-700 px-3 py-2 rounded-md text-sm font-medium">My Courses</a>
                        @elseif(Auth::user()->role->role_name === 'admin')
                            <a href="/admin/dashboard" class="text-gray-500 hover:text-gray-700 px-3 py-2 rounded-md text-sm font-medium">Administration</a>
                        @endif

                        {{-- User dropdown --}}
                        <div class="relative">
                            <div>
                                <button type="button" class="bg-white rounded-full flex text-sm focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                                    <span class="sr-only">Open user menu</span>
                                    <img class="h-8 w-8 rounded-full" src={{ url('storage/'.Auth::user()->photo) }} alt="Userprofile">
                                </button>
                            </div>

                            {{-- Dropdown menu (hidden by default) --}}
                            <div class="hidden origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg py-1 bg-white ring-1 ring-black ring-opacity-5 focus:outline-none z-10" id="user-dropdown-menu" role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1">
                                <a href="/profile" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">Your Profile</a>
                                <a href="/logout" class="block px-4 py-2 text-sm text-red-700 hover:bg-red-100" role="menuitem">Logout</a>
                            </div>
                        </div>
                    </div>
                @endauth
            </div>

            <!-- Mobile Menu Button -->
            <div class="flex items-center sm:hidden">
                @auth
                    {{-- User profile for mobile --}}
                    <button type="button" id="mobile-profile-button" class="bg-white rounded-full flex text-sm focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 mr-2">
                        <span class="sr-only">Open user menu</span>
                        <img class="h-8 w-8 rounded-full" src={{ url('storage/'.Auth::user()->photo) }} alt="Userprofile">
                    </button>
                @endauth

                <button type="button" id="mobile-menu-button" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500">
                    <span class="sr-only">Open main menu</span>
                    <!-- Hamburger Icon -->
                    <svg id="mobile-menu-icon" class="block h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                    <!-- Close Icon (Hidden by default) -->
                    <svg id="mobile-menu-close-icon" class="hidden h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>

        <!-- Mobile Menu (Hidden by default) -->
        <div id="mobile-menu" class="hidden sm:hidden">
            <div class="pt-2 pb-3 space-y-1">
                <a href="/" class="{{ Request::is('/') ? 'bg-indigo-50 border-indigo-500 text-indigo-700' : 'border-transparent text-gray-500 hover:bg-gray-50 hover:border-gray-300 hover:text-gray-700' }} block pl-3 pr-4 py-2 border-l-4 text-base font-medium">
                    Home
                </a>
                <a href="/courses" class="{{ Request::is('courses*') ? 'bg-indigo-50 border-indigo-500 text-indigo-700' : 'border-transparent text-gray-500 hover:bg-gray-50 hover:border-gray-300 hover:text-gray-700' }} block pl-3 pr-4 py-2 border-l-4 text-base font-medium">
                    Courses
                </a>
            </div>

            @auth
                {{-- Role-specific mobile links --}}
                <div class="pt-2 pb-3 space-y-1 border-t border-gray-200">
                    @if(Auth::user()->role->role_name === 'teacher')
                        <a href="/teacher/dashboard" class="{{ Request::is('teacher/dashboard*') ? 'bg-indigo-50 border-indigo-500 text-indigo-700' : 'border-transparent text-gray-500 hover:bg-gray-50 hover:border-gray-300 hover:text-gray-700' }} block pl-3 pr-4 py-2 border-l-4 text-base font-medium">
                            Dashboard
                        </a>
                        <a href="/teacher/courses" class="{{ Request::is('teacher/courses*') ? 'bg-indigo-50 border-indigo-500 text-indigo-700' : 'border-transparent text-gray-500 hover:bg-gray-50 hover:border-gray-300 hover:text-gray-700' }} block pl-3 pr-4 py-2 border-l-4 text-base font-medium">
                            My Courses
                        </a>
                    @elseif(Auth::user()->role->role_name === 'admin')
                        <a href="/admin/dashboard" class="{{ Request::is('admin/dashboard*') ? 'bg-indigo-50 border-indigo-500 text-indigo-700' : 'border-transparent text-gray-500 hover:bg-gray-50 hover:border-gray-300 hover:text-gray-700' }} block pl-3 pr-4 py-2 border-l-4 text-base font-medium">
                            Administration
                        </a>
                    @endif
                </div>

                {{-- User profile section for mobile --}}
                <div class="pt-4 pb-3 border-t border-gray-200">
                    <div class="flex items-center px-4">
                        <div class="flex-shrink-0">
                            <img class="h-10 w-10 rounded-full" src={{ url('storage/'.Auth::user()->photo) }} alt="Userprofile">
                        </div>
                        <div class="ml-3">
                            <div class="text-base font-medium text-gray-800">{{ Auth::user()->name }}</div>
                        </div>
                    </div>
                    <div class="mt-3 space-y-1">
                        <a href="/profile" class="block px-4 py-2 text-base font-medium text-gray-500 hover:text-gray-800 hover:bg-gray-100">Your Profile</a>
                        <a href="/logout" class="block px-4 py-2 text-base font-medium text-red-500 hover:text-gray-800 hover:bg-red-100">Logout</a>
                    </div>
                </div>
            @else
                {{-- Visitor links for mobile --}}
                <div class="pt-4 pb-3 border-t border-gray-200">
                    <div class="space-y-1">
                        <a href="/login" class="block px-4 py-2 text-base font-medium text-gray-500 hover:text-gray-800 hover:bg-gray-100">Login</a>
                        <a href="/register" class="block px-4 py-2 text-base font-medium text-gray-500 hover:text-gray-800 hover:bg-gray-100">Register</a>
                    </div>
                </div>
            @endauth
        </div>

        <!-- Mobile Profile Dropdown (Hidden by default) -->
        <div id="mobile-profile-dropdown" class="hidden sm:hidden absolute right-0 mt-2 w-48 rounded-md shadow-lg py-1 bg-white ring-1 ring-black ring-opacity-5 focus:outline-none z-10">
            <div class="px-4 py-2 border-b border-gray-100">
                @auth
                    <p class="text-sm font-medium text-gray-900">{{ Auth::user()->name }}</p>
                @endauth
            </div>
            <a href="/profile" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Your Profile</a>
            <a href="/logout" class="block px-4 py-2 text-sm text-red-700 hover:bg-red-100">Logout</a>
        </div>
    </nav>
</header>

<!-- Main Content -->
<main class="flex-grow">
    @yield('content')
</main>

<!-- Footer -->
<footer class="bg-gray-800 text-white">
    <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div>
                <h3 class="text-lg font-semibold mb-4">UpCours</h3>
                <p class="text-gray-300">The online learning platform for everyone.</p>
            </div>
            <div>
                <h3 class="text-lg font-semibold mb-4">Quick Links</h3>
                <ul class="space-y-2">
                    <li><a href="/" class="text-gray-300 hover:text-white">Home</a></li>
                    <li><a href="/courses" class="text-gray-300 hover:text-white">Courses</a></li>
                </ul>
            </div>
            <div>
                <h3 class="text-lg font-semibold mb-4">Contact</h3>
                <ul class="space-y-2">
                    <li class="text-gray-300">contact.abdelkebir@gmail.com</li>
                    <li class="text-gray-300">+212 608229760</li>
                </ul>
            </div>
        </div>
        <div class="mt-8 pt-8 border-t border-gray-700 text-center text-gray-300">
            <p>&copy; 2025 UpCours. All rights reserved.</p>
        </div>
    </div>
</footer>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Mobile menu toggle
        const mobileMenuButton = document.getElementById('mobile-menu-button');
        const mobileMenu = document.getElementById('mobile-menu');
        const mobileMenuIcon = document.getElementById('mobile-menu-icon');
        const mobileMenuCloseIcon = document.getElementById('mobile-menu-close-icon');

        if (mobileMenuButton && mobileMenu) {
            mobileMenuButton.addEventListener('click', () => {
                const isOpen = mobileMenu.classList.toggle('hidden');
                if (mobileMenuIcon && mobileMenuCloseIcon) {
                    mobileMenuIcon.classList.toggle('hidden', !isOpen);
                    mobileMenuCloseIcon.classList.toggle('hidden', isOpen);
                }

                // Close mobile profile dropdown if open
                if (mobileProfileDropdown) {
                    mobileProfileDropdown.classList.add('hidden');
                }
            });
        }

        // Desktop user dropdown toggle
        const userMenuButton = document.getElementById('user-menu-button');
        const userDropdownMenu = document.getElementById('user-dropdown-menu');

        if (userMenuButton && userDropdownMenu) {
            userMenuButton.addEventListener('click', () => {
                userDropdownMenu.classList.toggle('hidden');

                // Add animation classes
                if (!userDropdownMenu.classList.contains('hidden')) {
                    userDropdownMenu.classList.add('dropdown-enter');
                    setTimeout(() => {
                        userDropdownMenu.classList.remove('dropdown-enter');
                        userDropdownMenu.classList.add('dropdown-enter-active');
                    }, 10);
                    setTimeout(() => {
                        userDropdownMenu.classList.remove('dropdown-enter-active');
                    }, 200);
                }
            });

            // Close dropdown when clicking outside
            document.addEventListener('click', (event) => {
                if (!userMenuButton.contains(event.target) && !userDropdownMenu.contains(event.target)) {
                    userDropdownMenu.classList.add('hidden');
                }
            });
        }

        // Mobile profile dropdown toggle
        const mobileProfileButton = document.getElementById('mobile-profile-button');
        const mobileProfileDropdown = document.getElementById('mobile-profile-dropdown');

        if (mobileProfileButton && mobileProfileDropdown) {
            mobileProfileButton.addEventListener('click', (event) => {
                event.stopPropagation();
                mobileProfileDropdown.classList.toggle('hidden');

                // Close mobile menu if open
                if (mobileMenu && !mobileMenu.classList.contains('hidden')) {
                    mobileMenu.classList.add('hidden');
                    if (mobileMenuIcon && mobileMenuCloseIcon) {
                        mobileMenuIcon.classList.remove('hidden');
                        mobileMenuCloseIcon.classList.add('hidden');
                    }
                }
            });

            // Close dropdown when clicking outside
            document.addEventListener('click', (event) => {
                if (!mobileProfileButton.contains(event.target) && !mobileProfileDropdown.contains(event.target)) {
                    mobileProfileDropdown.classList.add('hidden');
                }
            });
        }
    });
</script>
@yield('scripts')
</body>
</html>
