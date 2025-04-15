<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UpCours Enseignant - @yield('title', 'Tableau de bord')</title>

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Custom Styles -->
    @yield('styles')
</head>
<body class="bg-gray-100 min-h-screen flex">
    <!-- Sidebar Toggle for Mobile -->
    <div class="md:hidden fixed top-0 left-0 p-4 z-50">
        <button id="sidebarToggle" class="text-green-600 focus:outline-none">
            <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
            </svg>
        </button>
    </div>

    <!-- Sidebar -->
    <aside id="sidebar" class="bg-green-800 text-white w-64 flex-shrink-0 transform -translate-x-full md:translate-x-0 transition-transform duration-200 ease-in-out fixed h-screen z-40">
        <div class="p-6">
            <a href="/" class="text-2xl font-bold">UpCours Enseignant</a>
        </div>
        <nav class="mt-6">
            <div class="px-4 py-2">
                <h2 class="text-xs uppercase tracking-wide text-green-300 font-semibold">Général</h2>
                <div class="mt-3 space-y-1">
                    <a href="/teacher/dashboard" class="group flex items-center px-2 py-2 text-base font-medium rounded-md bg-green-900 text-white">
                        <svg class="mr-3 h-6 w-6 text-green-300" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                        </svg>
                        Tableau de bord
                    </a>
                    <a href="/teacher/profile" class="group flex items-center px-2 py-2 text-base font-medium rounded-md text-green-100 hover:bg-green-700">
                        <svg class="mr-3 h-6 w-6 text-green-300" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                        Mon Profil
                    </a>
                </div>
            </div>
            <div class="mt-8 px-4 py-2">
                <h2 class="text-xs uppercase tracking-wide text-green-300 font-semibold">Contenu</h2>
                <div class="mt-3 space-y-1">
                    <a href="/teacher/courses" class="group flex items-center px-2 py-2 text-base font-medium rounded-md text-green-100 hover:bg-green-700">
                        <svg class="mr-3 h-6 w-6 text-green-300" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                        </svg>
                        Mes Cours
                    </a>
                    <a href="/teacher/courses/create" class="group flex items-center px-2 py-2 text-base font-medium rounded-md text-green-100 hover:bg-green-700">
                        <svg class="mr-3 h-6 w-6 text-green-300" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        Créer un cours
                    </a>
                    <a href="/teacher/quiz" class="group flex items-center px-2 py-2 text-base font-medium rounded-md text-green-100 hover:bg-green-700">
                        <svg class="mr-3 h-6 w-6 text-green-300" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                        </svg>
                        Quiz
                    </a>
                </div>
            </div>
            <div class="mt-8 px-4 py-2">
                <h2 class="text-xs uppercase tracking-wide text-green-300 font-semibold">Statistiques</h2>
                <div class="mt-3 space-y-1">
                    <a href="/teacher/stats" class="group flex items-center px-2 py-2 text-base font-medium rounded-md text-green-100 hover:bg-green-700">
                        <svg class="mr-3 h-6 w-6 text-green-300" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                        </svg>
                        Statistiques
                    </a>
                </div>
            </div>
        </nav>
    </aside>

    <!-- Main Content -->
    <div class="flex-1 flex flex-col overflow-hidden">
        <!-- Top Navigation -->
        <header class="bg-white shadow-sm z-10">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between h-16">
                    <div class="flex">
                        <div class="flex-shrink-0 hidden md:flex items-center">
                            <a href="/" class="text-2xl font-bold text-green-600">UpCours</a>
                        </div>
                    </div>
                    <div class="flex items-center">
                        <div class="ml-3 relative">
                            <div>
                                <button type="button" class="max-w-xs bg-white flex items-center text-sm rounded-full focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500" id="user-menu-button">
                                    <span class="sr-only">Ouvrir le menu utilisateur</span>
                                    <img class="h-8 w-8 rounded-full" src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <!-- Page Content -->
        <main class="flex-1 overflow-auto bg-gray-100">
            <div class="py-6">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 md:px-8">
                    <h1 class="text-2xl font-semibold text-gray-900">@yield('page-title', 'Tableau de bord')</h1>
                </div>
                <div class="max-w-7xl mx-auto px-4 sm:px-6 md:px-8 mt-4">
                    @yield('content')
                </div>
            </div>
        </main>
    </div>

    <!-- Scripts -->
    <script>
        document.getElementById('sidebarToggle').addEventListener('click', function() {
            const sidebar = document.getElementById('sidebar');
            sidebar.classList.toggle('-translate-x-full');
        });
    </script>
    @yield('scripts')
</body>
</html>