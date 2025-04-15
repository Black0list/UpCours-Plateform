<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UpCours - @yield('title', 'Administration')</title>
    <meta name="description" content="@yield('meta_description', 'UpCours - Panneau d\'administration')">

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <!-- Custom Styles -->
    @yield('styles')
</head>
<body class="bg-gray-100">
    <div class="flex h-screen overflow-hidden">
        <!-- Sidebar -->
        <div class="hidden md:flex md:flex-shrink-0">
            <div class="flex flex-col w-64 bg-gray-800">
                <div class="flex items-center h-16 px-4 bg-gray-900">
                    <span class="text-xl font-bold text-white">UpCours Admin</span>
                </div>
                <div class="flex flex-col flex-grow px-4 py-4 overflow-y-auto">
                    <div class="flex flex-col flex-grow space-y-1">
                        <!-- Dashboard Link -->
                        <a href="{{ route('admin.dashboard') }}" class="flex items-center px-2 py-2 text-sm font-medium rounded-md group {{ request()->routeIs('admin.dashboard') ? 'bg-gray-700 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white' }}">
                            <i class="fas fa-tachometer-alt w-6 h-6 mr-3 text-gray-400 group-hover:text-gray-300"></i>
                            Tableau de bord
                        </a>

                        <!-- Users Link -->
                        <a href="{{ route('admin.users') }}" class="flex items-center px-2 py-2 text-sm font-medium rounded-md group {{ request()->routeIs('admin.users') ? 'bg-gray-700 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white' }}">
                            <i class="fas fa-users w-6 h-6 mr-3 text-gray-400 group-hover:text-gray-300"></i>
                            Utilisateurs
                        </a>

                        <!-- Categories/Courses Link -->
                        <a href="{{ route('admin.categories') }}" class="flex items-center px-2 py-2 text-sm font-medium rounded-md group {{ request()->routeIs('admin.categories') ? 'bg-gray-700 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white' }}">
                            <i class="fas fa-folder-open w-6 h-6 mr-3 text-gray-400 group-hover:text-gray-300"></i>
                            Catégories/Cours
                        </a>

                        <!-- Roles Link -->
                        <a href="{{ route('admin.roles') }}" class="flex items-center px-2 py-2 text-sm font-medium rounded-md group {{ request()->routeIs('admin.roles') ? 'bg-gray-700 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white' }}">
                            <i class="fas fa-user-tag w-6 h-6 mr-3 text-gray-400 group-hover:text-gray-300"></i>
                            Rôles
                        </a>

                        <!-- Badges Link -->
                        <a href="{{ route('admin.badges') }}" class="flex items-center px-2 py-2 text-sm font-medium rounded-md group {{ request()->routeIs('admin.badges') ? 'bg-gray-700 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white' }}">
                            <i class="fas fa-award w-6 h-6 mr-3 text-gray-400 group-hover:text-gray-300"></i>
                            Badges
                        </a>

                        <!-- Quizzes Link -->
                        <a href="{{ route('admin.quizzes') }}" class="flex items-center px-2 py-2 text-sm font-medium rounded-md group {{ request()->routeIs('admin.quizzes') ? 'bg-gray-700 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white' }}">
                            <i class="fas fa-question-circle w-6 h-6 mr-3 text-gray-400 group-hover:text-gray-300"></i>
                            Quizzes
                        </a>

                        <!-- Tags Link -->
                        <a href="{{ route('admin.tags') }}" class="flex items-center px-2 py-2 text-sm font-medium rounded-md group {{ request()->routeIs('admin.tags') ? 'bg-gray-700 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white' }}">
                            <i class="fas fa-tags w-6 h-6 mr-3 text-gray-400 group-hover:text-gray-300"></i>
                            Tags
                        </a>

                    </div>
                    <div class="pt-4 mt-6 border-t border-gray-700">
                        <div class="px-2 space-y-1">
                            <a href="{{ route('admin.settings') }}" class="flex items-center px-2 py-2 text-sm font-medium rounded-md group {{ request()->routeIs('admin.settings') ? 'bg-gray-700 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white' }}">
                                <i class="fas fa-cog w-6 h-6 mr-3 text-gray-400 group-hover:text-gray-300"></i>
                                Settings
                            </a>

                            <a href="/logout" class="flex items-center px-2 py-2 text-sm font-medium rounded-md group {{ request()->routeIs('admin.settings') ? 'bg-gray-700 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white' }}">
                                <i class="fas fa-sign-out-alt w-6 h-6 mr-3 text-gray-400 group-hover:text-gray-300"></i>
                                Disconnect
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Content -->
        <div class="flex flex-col flex-1 overflow-hidden">
            <!-- Top Navigation -->
            <div class="bg-white shadow">
                <div class="px-4 sm:px-6 lg:px-8">
                    <div class="flex items-center justify-between h-16">
                        <div class="flex items-center">
                            <button class="px-4 text-gray-500 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500 md:hidden" id="mobile-menu-button">
                                <span class="sr-only">Ouvrir le menu</span>
                                <i class="fas fa-bars w-6 h-6"></i>
                            </button>
                            <div class="ml-4 md:ml-0">
                                <h1 class="text-xl font-bold text-gray-900">@yield('page-title', 'Tableau de bord')</h1>
                            </div>
                        </div>
                        <div class="flex items-center">
                            <!-- Notifications Button -->
                            <div class="relative mr-4">
                                <button class="p-1 text-gray-400 bg-white rounded-full hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" id="notifications-button">
                                    <span class="sr-only">Voir les notifications</span>
                                    <i class="fas fa-bell w-6 h-6"></i>
                                    <span class="absolute top-0 right-0 w-2 h-2 bg-red-500 rounded-full"></span>
                                </button>

                                <!-- Notifications Dropdown (Hidden by default) -->
                                <div class="absolute right-0 z-10 hidden w-80 mt-2 origin-top-right bg-white rounded-md shadow-lg ring-1 ring-black ring-opacity-5" id="notifications-dropdown">
                                    <div class="py-1">
                                        <div class="px-4 py-2 border-b border-gray-200">
                                            <h3 class="text-sm font-medium text-gray-900">Notifications</h3>
                                        </div>
                                        <div class="max-h-60 overflow-y-auto">
                                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                                <div class="flex items-start">
                                                    <div class="flex-shrink-0">
                                                        <i class="fas fa-user-plus text-blue-500"></i>
                                                    </div>
                                                    <div class="ml-3">
                                                        <p class="text-sm font-medium text-gray-900">5 nouveaux utilisateurs inscrits</p>
                                                        <p class="text-xs text-gray-500">Il y a 2 heures</p>
                                                    </div>
                                                </div>
                                            </a>
                                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                                <div class="flex items-start">
                                                    <div class="flex-shrink-0">
                                                        <i class="fas fa-exclamation-triangle text-yellow-500"></i>
                                                    </div>
                                                    <div class="ml-3">
                                                        <p class="text-sm font-medium text-gray-900">Alerte de performance serveur</p>
                                                        <p class="text-xs text-gray-500">Il y a 1 jour</p>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="px-4 py-2 border-t border-gray-200">
                                            <a href="#" class="text-sm font-medium text-indigo-600 hover:text-indigo-500">Voir toutes les notifications</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- User Profile Dropdown -->
                            <div class="relative ml-3">
                                <div>
                                    <button class="flex items-center max-w-xs text-sm bg-white rounded-full focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                                        <span class="sr-only">Ouvrir le menu utilisateur</span>
                                        <img class="w-8 h-8 rounded-full" src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
                                    </button>
                                </div>

                                <!-- User Dropdown Menu (Hidden by default) -->
                                <div class="absolute right-0 z-10 hidden w-48 mt-2 origin-top-right bg-white rounded-md shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none" id="user-dropdown" role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1">
                                    <div class="py-1" role="none">
                                        <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem" tabindex="-1" id="user-menu-item-0">Votre profil</a>
                                        <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem" tabindex="-1" id="user-menu-item-1">Paramètres</a>
                                        <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem" tabindex="-1" id="user-menu-item-2">Déconnexion</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Mobile Navigation (Hidden by default) -->
            <div class="md:hidden hidden" id="mobile-menu">
                <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3 bg-gray-800">
                    <a href="{{ route('admin.dashboard') }}" class="block px-3 py-2 text-base font-medium {{ request()->routeIs('admin.dashboard') ? 'text-white bg-gray-900' : 'text-gray-300 hover:bg-gray-700 hover:text-white' }} rounded-md">Tableau de bord</a>
                    <a href="{{ route('admin.users') }}" class="block px-3 py-2 text-base font-medium {{ request()->routeIs('admin.users') ? 'text-white bg-gray-900' : 'text-gray-300 hover:bg-gray-700 hover:text-white' }} rounded-md">Utilisateurs</a>
                    <a href="{{ route('admin.categories') }}" class="block px-3 py-2 text-base font-medium {{ request()->routeIs('admin.categories') ? 'text-white bg-gray-900' : 'text-gray-300 hover:bg-gray-700 hover:text-white' }} rounded-md">Catégories/Cours</a>
                    <a href="{{ route('admin.roles') }}" class="block px-3 py-2 text-base font-medium {{ request()->routeIs('admin.roles') ? 'text-white bg-gray-900' : 'text-gray-300 hover:bg-gray-700 hover:text-white' }} rounded-md">Rôles</a>
                    <a href="{{ route('admin.badges') }}" class="block px-3 py-2 text-base font-medium {{ request()->routeIs('admin.badges') ? 'text-white bg-gray-900' : 'text-gray-300 hover:bg-gray-700 hover:text-white' }} rounded-md">Badges</a>
                    <a href="{{ route('admin.quizzes') }}" class="block px-3 py-2 text-base font-medium {{ request()->routeIs('admin.quizzes') ? 'text-white bg-gray-900' : 'text-gray-300 hover:bg-gray-700 hover:text-white' }} rounded-md">Quizzes</a>
                    <a href="{{ route('admin.tags') }}" class="block px-3 py-2 text-base font-medium {{ request()->routeIs('admin.tags') ? 'text-white bg-gray-900' : 'text-gray-300 hover:bg-gray-700 hover:text-white' }} rounded-md">Tags</a>
                    <a href="{{ route('admin.stats') }}" class="block px-3 py-2 text-base font-medium {{ request()->routeIs('admin.stats') ? 'text-white bg-gray-900' : 'text-gray-300 hover:bg-gray-700 hover:text-white' }} rounded-md">Statistiques</a>
                </div>
                <div class="pt-4 pb-3 border-t border-gray-700 bg-gray-800">
                    <div class="flex items-center px-5">
                        <div class="flex-shrink-0">
                            <img class="w-10 h-10 rounded-full" src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
                        </div>
                        <div class="ml-3">
                            <div class="text-base font-medium text-white">Admin User</div>
                            <div class="text-sm font-medium text-gray-400">admin@upcours.com</div>
                        </div>
                    </div>
                    <div class="px-2 mt-3 space-y-1">
                        <a href="{{ route('admin.settings') }}" class="block px-3 py-2 text-base font-medium {{ request()->routeIs('admin.settings') ? 'text-white bg-gray-900' : 'text-gray-300 hover:bg-gray-700 hover:text-white' }} rounded-md">Paramètres</a>
                        <a class="block px-3 py-2 text-base font-medium text-gray-400 hover:text-white hover:bg-gray-700 rounded-md">Déconnexion</a>
                    </div>
                </div>
            </div>

            <!-- Main Content Area -->
            <main class="flex-1 overflow-y-auto bg-gray-100">
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
                        <i class="fas fa-check-circle text-green-400 text-lg"></i>
                    </div>
                    <div class="ml-3 w-0 flex-1 pt-0.5">
                        <p class="text-sm font-medium text-gray-900" id="notification-title">
                            Opération réussie
                        </p>
                        <p class="mt-1 text-sm text-gray-500" id="notification-message">
                            Les modifications ont été enregistrées avec succès.
                        </p>
                    </div>
                    <div class="ml-4 flex-shrink-0 flex">
                        <button id="close-notification" class="bg-white rounded-md inline-flex text-gray-400 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            <span class="sr-only">Fermer</span>
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
                        <i class="fas fa-exclamation-circle text-red-400 text-lg"></i>
                    </div>
                    <div class="ml-3 w-0 flex-1 pt-0.5">
                        <p class="text-sm font-medium text-gray-900" id="error-title">
                            Erreur
                        </p>
                        <p class="mt-1 text-sm text-gray-500" id="error-message">
                            Une erreur est survenue. Veuillez réessayer.
                        </p>
                    </div>
                    <div class="ml-4 flex-shrink-0 flex">
                        <button id="close-error" class="bg-white rounded-md inline-flex text-gray-400 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            <span class="sr-only">Fermer</span>
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

            // Notifications toggle
            const notificationsButton = document.getElementById('notifications-button');
            const notificationsDropdown = document.getElementById('notifications-dropdown');

            if (notificationsButton && notificationsDropdown) {
                notificationsButton.addEventListener('click', function() {
                    notificationsDropdown.classList.toggle('hidden');
                });
            }

            // Close dropdowns when clicking outside
            document.addEventListener('click', function(event) {
                if (userMenuButton && userDropdown && !userMenuButton.contains(event.target) && !userDropdown.contains(event.target)) {
                    userDropdown.classList.add('hidden');
                }

                if (notificationsButton && notificationsDropdown && !notificationsButton.contains(event.target) && !notificationsDropdown.contains(event.target)) {
                    notificationsDropdown.classList.add('hidden');
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
