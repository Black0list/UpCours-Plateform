<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UpCours Teacher - @yield('title', 'Dashboard')</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

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

    <style>
        /* Sidebar transition */
        .sidebar-transition {
            transition: transform 0.3s ease-in-out, width 0.3s ease-in-out, margin-left 0.3s ease-in-out;
        }

        /* Active sidebar item */
        .sidebar-active {
            background-color: rgba(22, 101, 52, 0.8);
            color: white;
        }

        /* Hover effect for sidebar items */
        .sidebar-item:hover {
            background-color: rgba(22, 101, 52, 0.6);
        }

        /* Form elements styling */
        input, select, textarea {
            padding: 0.625rem 0.75rem;
            border-width: 1px;
            border-color: #d1d5db;
            border-radius: 0.375rem;
        }

        input:focus, select:focus, textarea:focus {
            outline: none;
            border-color: #22c55e;
            box-shadow: 0 0 0 2px rgba(34, 197, 94, 0.2);
        }

        /* Button styling */
        .btn {
            padding: 0.5rem 1rem;
            border-radius: 0.375rem;
            font-weight: 500;
            transition: all 0.2s;
        }

        .btn-primary {
            background-color: #16a34a;
            color: white;
            border: 1px solid #15803d;
        }

        .btn-primary:hover {
            background-color: #15803d;
        }
    </style>

    @yield('styles')
</head>
<body class="bg-gray-100 min-h-screen">
<div class="flex h-screen overflow-hidden">
    <!-- Sidebar Backdrop (Mobile) -->
    <div id="sidebarBackdrop" class="fixed inset-0 z-20 bg-black bg-opacity-50 lg:hidden hidden" aria-hidden="true"></div>

    <!-- Sidebar -->
    <aside id="sidebar" class="fixed inset-y-0 left-0 z-30 w-64 flex-shrink-0 bg-primary-800 transform -translate-x-full lg:translate-x-0 lg:static lg:inset-0 sidebar-transition">
        <div class="flex flex-col h-full">
            <!-- Sidebar Header -->
            <div class="p-4 border-b border-primary-700 flex items-center justify-between">
                <a href="/" class="flex items-center space-x-3">
                        <span class="text-white bg-primary-600 p-2 rounded-lg">
                            <i class="fas fa-graduation-cap text-xl"></i>
                        </span>
                    <span class="text-xl font-bold text-white">UpCours</span>
                </a>
                <button id="closeSidebar" class="text-white lg:hidden">
                    <i class="fas fa-times"></i>
                </button>
            </div>

            <!-- User Profile -->
            <div class="p-4 border-b border-primary-700">
                <div class="flex items-center space-x-3">
                    <img class="h-10 w-10 rounded-full border-2 border-primary-300" src={{ url('storage/'.Auth::user()->photo) }} alt="Profile">
                    <div>
                        <h3 class="text-white font-medium">{{ Auth::user()->full_name }}</h3>
                        <p class="text-primary-300 text-sm">{{ Auth::user()->role->role_name }}</p>
                    </div>
                </div>
            </div>

            <!-- Sidebar Navigation -->
            <div class="flex-1 overflow-y-auto no-scrollbar">
                <nav class="px-2 py-4">
                    <div class="mb-6">
                        <h2 class="px-3 text-xs font-semibold text-primary-300 uppercase tracking-wider">
                            General
                        </h2>
                        <div class="mt-3 space-y-1">
                            <a href="/teacher/dashboard" class="group flex items-center px-3 py-2 text-sm font-medium rounded-md sidebar-item sidebar-active">
                                <i class="fas fa-tachometer-alt mr-3 text-primary-300 w-5 text-center"></i>
                                Dashboard
                            </a>
                        </div>
                    </div>

                    <div class="mb-6">
                        <h2 class="px-3 text-xs font-semibold text-primary-300 uppercase tracking-wider">
                            Content
                        </h2>
                        <div class="mt-3 space-y-1">
                            <a class="group flex items-center px-3 py-2 text-sm font-medium rounded-md text-white sidebar-item" href={{ route("teacher.courses.main") }}>
                                <i class="fas fa-book mr-3 text-primary-300 w-5 text-center"></i>
                                My Courses
                            </a>
                            <a  class="group flex items-center px-3 py-2 text-sm font-medium rounded-md text-white sidebar-item" href={{ route("teacher.courses.createForm") }} >
                                <i class="fas fa-plus-circle mr-3 text-primary-300 w-5 text-center"></i>
                                Create Course
                            </a>
                        </div>
                    </div>
                </nav>
            </div>

            <!-- Sidebar Footer -->
            <div class="p-4 border-t border-primary-700">
                <a href="/logout" class="flex items-center px-3 py-2 text-sm font-medium rounded-md text-white hover:bg-primary-700 transition-colors">
                    <i class="fas fa-sign-out-alt mr-3 w-5 text-center"></i>
                    Logout
                </a>
            </div>
        </div>
    </aside>

    <!-- Main Content -->
    <div class="flex-1 flex flex-col overflow-hidden">
        <!-- Top Navigation -->
        <header class="bg-white shadow-sm z-10">
            <div class="px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between h-16">
                    <div class="flex items-center">
                        <!-- Mobile menu button -->
                        <button id="openSidebar" class="lg:hidden text-gray-500 focus:outline-none">
                            <i class="fas fa-bars text-xl"></i>
                        </button>
                        <div class="ml-4 lg:ml-0">
                            <h1 class="text-xl font-bold text-primary-600">@yield('page-title', 'Dashboard')</h1>
                        </div>
                    </div>

                    <div class="flex items-center space-x-4">
                        <!-- User dropdown -->
                        <div class="relative">
                            <button type="button" class="flex items-center space-x-3 text-sm rounded-full focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-500" id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                                <span class="sr-only">Open user menu</span>
                                <img class="h-8 w-8 rounded-full" src={{ url('storage/'.Auth::user()->photo) }} alt="userPhoto" />
                                <span class="hidden md:block text-gray-700">{{ Auth::user()->full_name }}</span>
                                <i class="fas fa-chevron-down text-gray-400 text-xs"></i>
                            </button>
                            <!-- User dropdown menu -->
                            <div class="hidden origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg py-1 bg-white ring-1 ring-black ring-opacity-5 focus:outline-none z-10" id="user-dropdown-menu" role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1">
                                <a href="/profile" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">Your Profile</a>
                                <a href="/logout" class="block px-4 py-2 text-sm text-red-700 hover:bg-red-100" role="menuitem">Logout</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <!-- Page Content -->
        <main class="flex-1 overflow-y-auto bg-gray-100 p-4 sm:p-6 lg:p-8">
            @yield('content')
        </main>
    </div>
</div>

<!-- Scripts -->
<script>
    // Sidebar toggle functionality
    const openSidebar = document.getElementById('openSidebar');
    const closeSidebar = document.getElementById('closeSidebar');
    const sidebar = document.getElementById('sidebar');
    const sidebarBackdrop = document.getElementById('sidebarBackdrop');

    // User dropdown functionality
    const userMenuButton = document.getElementById('user-menu-button');
    const userDropdownMenu = document.getElementById('user-dropdown-menu');

    // Open sidebar on mobile
    openSidebar.addEventListener('click', () => {
        sidebar.classList.remove('-translate-x-full');
        sidebarBackdrop.classList.remove('hidden');
        document.body.classList.add('overflow-hidden');
    });

    // Close sidebar on mobile
    closeSidebar.addEventListener('click', () => {
        sidebar.classList.add('-translate-x-full');
        sidebarBackdrop.classList.add('hidden');
        document.body.classList.remove('overflow-hidden');
    });

    // Close sidebar when clicking outside on mobile
    sidebarBackdrop.addEventListener('click', () => {
        sidebar.classList.add('-translate-x-full');
        sidebarBackdrop.classList.add('hidden');
        document.body.classList.remove('overflow-hidden');
    });

    // Toggle user dropdown menu
    if (userMenuButton && userDropdownMenu) {
        userMenuButton.addEventListener('click', () => {
            userDropdownMenu.classList.toggle('hidden');
        });

        // Close dropdown when clicking outside
        document.addEventListener('click', (event) => {
            if (!userMenuButton.contains(event.target) && !userDropdownMenu.contains(event.target)) {
                userDropdownMenu.classList.add('hidden');
            }
        });
    }

    // Handle window resize
    window.addEventListener('resize', () => {
        if (window.innerWidth >= 1024) { // lg breakpoint
            sidebar.classList.remove('-translate-x-full');
            sidebarBackdrop.classList.add('hidden');
            document.body.classList.remove('overflow-hidden');
        } else {
            if (!sidebar.classList.contains('-translate-x-full')) {
                sidebarBackdrop.classList.remove('hidden');
            }
        }
    });
</script>
@yield('scripts')
</body>
</html>
