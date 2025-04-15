@extends('layouts.admin')

@section('title', 'Statistiques de la Plateforme')
@section('meta_description', 'Consultez les statistiques et analyses de la plateforme UpCours')

@section('page-title', 'Statistiques de la Plateforme')

@section('content')
    <!-- Page Header -->
    <div class="md:flex md:items-center md:justify-between mb-8">
        <div class="flex-1 min-w-0">
            <h2 class="text-2xl font-bold leading-7 text-gray-900 sm:text-3xl sm:truncate">
                Tableau de Bord Analytique
            </h2>
        </div>
        <div class="mt-4 flex md:mt-0 md:ml-4 space-x-3">
            <button type="button" class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                <i class="fas fa-file-export -ml-1 mr-2"></i>
                Exporter
            </button>
            <button type="button" class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                <i class="fas fa-sync -ml-1 mr-2"></i>
                Actualiser
            </button>
        </div>
    </div>

    <!-- Date Range Selector -->
    <div class="bg-white p-4 rounded-lg shadow mb-6">
        <div class="sm:flex sm:items-center sm:justify-between">
            <div>
                <h3 class="text-lg leading-6 font-medium text-gray-900">Période d'analyse</h3>
                <p class="mt-1 text-sm text-gray-500">Sélectionnez une période pour filtrer les données</p>
            </div>
            <div class="mt-3 sm:mt-0 sm:ml-4">
                <div class="flex items-center space-x-2">
                    <select id="date-range" class="block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                        <option value="7">7 derniers jours</option>
                        <option value="30" selected>30 derniers jours</option>
                        <option value="90">3 derniers mois</option>
                        <option value="365">Année en cours</option>
                        <option value="custom">Personnalisé</option>
                    </select>
                    <button type="button" class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Appliquer
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Stats Cards -->
    <div class="grid grid-cols-1 gap-5 sm:grid-cols-2 lg:grid-cols-4 mb-6">
        <!-- Total Users Card -->
        <div class="bg-white overflow-hidden shadow rounded-lg">
            <div class="p-5">
                <div class="flex items-center">
                    <div class="flex-shrink-0 bg-indigo-500 rounded-md p-3">
                        <i class="fas fa-users text-white text-xl"></i>
                    </div>
                    <div class="ml-5 w-0 flex-1">
                        <dl>
                            <dt class="text-sm font-medium text-gray-500 truncate">
                                Utilisateurs totaux
                            </dt>
                            <dd>
                                <div class="text-lg font-medium text-gray-900">
                                    2,845
                                </div>
                                <div class="flex items-center mt-1">
                                    <span class="text-sm text-green-600 font-semibold">
                                        <i class="fas fa-arrow-up mr-1"></i>12%
                                    </span>
                                    <span class="text-sm text-gray-500 ml-2">vs mois précédent</span>
                                </div>
                            </dd>
                        </dl>
                    </div>
                </div>
            </div>
        </div>

        <!-- Active Courses Card -->
        <div class="bg-white overflow-hidden shadow rounded-lg">
            <div class="p-5">
                <div class="flex items-center">
                    <div class="flex-shrink-0 bg-green-500 rounded-md p-3">
                        <i class="fas fa-book-open text-white text-xl"></i>
                    </div>
                    <div class="ml-5 w-0 flex-1">
                        <dl>
                            <dt class="text-sm font-medium text-gray-500 truncate">
                                Cours actifs
                            </dt>
                            <dd>
                                <div class="text-lg font-medium text-gray-900">
                                    156
                                </div>
                                <div class="flex items-center mt-1">
                                    <span class="text-sm text-green-600 font-semibold">
                                        <i class="fas fa-arrow-up mr-1"></i>8%
                                    </span>
                                    <span class="text-sm text-gray-500 ml-2">vs mois précédent</span>
                                </div>
                            </dd>
                        </dl>
                    </div>
                </div>
            </div>
        </div>

        <!-- Total Revenue Card -->
        <div class="bg-white overflow-hidden shadow rounded-lg">
            <div class="p-5">
                <div class="flex items-center">
                    <div class="flex-shrink-0 bg-blue-500 rounded-md p-3">
                        <i class="fas fa-euro-sign text-white text-xl"></i>
                    </div>
                    <div class="ml-5 w-0 flex-1">
                        <dl>
                            <dt class="text-sm font-medium text-gray-500 truncate">
                                Revenus totaux
                            </dt>
                            <dd>
                                <div class="text-lg font-medium text-gray-900">
                                    €24,568
                                </div>
                                <div class="flex items-center mt-1">
                                    <span class="text-sm text-green-600 font-semibold">
                                        <i class="fas fa-arrow-up mr-1"></i>15%
                                    </span>
                                    <span class="text-sm text-gray-500 ml-2">vs mois précédent</span>
                                </div>
                            </dd>
                        </dl>
                    </div>
                </div>
            </div>
        </div>

        <!-- Completion Rate Card -->
        <div class="bg-white overflow-hidden shadow rounded-lg">
            <div class="p-5">
                <div class="flex items-center">
                    <div class="flex-shrink-0 bg-purple-500 rounded-md p-3">
                        <i class="fas fa-chart-line text-white text-xl"></i>
                    </div>
                    <div class="ml-5 w-0 flex-1">
                        <dl>
                            <dt class="text-sm font-medium text-gray-500 truncate">
                                Taux de complétion
                            </dt>
                            <dd>
                                <div class="text-lg font-medium text-gray-900">
                                    68%
                                </div>
                                <div class="flex items-center mt-1">
                                    <span class="text-sm text-red-600 font-semibold">
                                        <i class="fas fa-arrow-down mr-1"></i>3%
                                    </span>
                                    <span class="text-sm text-gray-500 ml-2">vs mois précédent</span>
                                </div>
                            </dd>
                        </dl>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Tabs -->
    <div class="border-b border-gray-200 mb-6">
        <nav class="-mb-px flex space-x-8" aria-label="Tabs">
            <button class="border-indigo-500 text-indigo-600 whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm" id="tab-stats">
                Statistiques
            </button>
            <button class="border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm" id="tab-badges">
                Badges
            </button>
            <button class="border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm" id="tab-tags">
                Tags
            </button>
        </nav>
    </div>

    <!-- Statistics Section -->
    <div id="section-stats" class="space-y-6">
        <!-- Charts Section -->
        <div class="grid grid-cols-1 gap-5 lg:grid-cols-2 mb-6">
            <!-- User Growth Chart -->
            <div class="bg-white overflow-hidden shadow rounded-lg">
                <div class="px-4 py-5 sm:p-6">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="text-lg font-medium leading-6 text-gray-900">Croissance des utilisateurs</h3>
                        <div class="flex items-center space-x-2">
                            <button type="button" class="inline-flex items-center px-2.5 py-1.5 border border-gray-300 shadow-sm text-xs font-medium rounded text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                Jour
                            </button>
                            <button type="button" class="inline-flex items-center px-2.5 py-1.5 border border-transparent shadow-sm text-xs font-medium rounded text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                Semaine
                            </button>
                            <button type="button" class="inline-flex items-center px-2.5 py-1.5 border border-gray-300 shadow-sm text-xs font-medium rounded text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                Mois
                            </button>
                        </div>
                    </div>
                    <div class="h-80 bg-gray-50 rounded-lg flex items-center justify-center">
                        <p class="text-gray-500">Graphique de croissance des utilisateurs</p>
                    </div>
                </div>
            </div>

            <!-- Course Enrollment Chart -->
            <div class="bg-white overflow-hidden shadow rounded-lg">
                <div class="px-4 py-5 sm:p-6">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="text-lg font-medium leading-6 text-gray-900">Inscriptions aux cours</h3>
                        <div class="flex items-center space-x-2">
                            <button type="button" class="inline-flex items-center px-2.5 py-1.5 border border-gray-300 shadow-sm text-xs font-medium rounded text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                Jour
                            </button>
                            <button type="button" class="inline-flex items-center px-2.5 py-1.5 border border-transparent shadow-sm text-xs font-medium rounded text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                Semaine
                            </button>
                            <button type="button" class="inline-flex items-center px-2.5 py-1.5 border border-gray-300 shadow-sm text-xs font-medium rounded text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                Mois
                            </button>
                        </div>
                    </div>
                    <div class="h-80 bg-gray-50 rounded-lg flex items-center justify-center">
                        <p class="text-gray-500">Graphique d'inscriptions aux cours</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Top Performers Section -->
        <div class="grid grid-cols-1 gap-5 lg:grid-cols-2 mb-6">
            <!-- Top Courses -->
            <div class="bg-white overflow-hidden shadow rounded-lg">
                <div class="px-4 py-5 border-b border-gray-200 sm:px-6">
                    <h3 class="text-lg font-medium leading-6 text-gray-900">Cours les plus populaires</h3>
                </div>
                <div class="px-4 py-5 sm:p-6">
                    <div class="flow-root">
                        <ul class="-my-5 divide-y divide-gray-200">
                            <li class="py-4">
                                <div class="flex items-center space-x-4">
                                    <div class="flex-shrink-0">
                                        <img class="h-12 w-12 rounded-md object-cover" src="https://images.unsplash.com/photo-1498050108023-c5249f4df085?ixlib=rb-1.2.1&auto=format&fit=crop&w=600&q=80" alt="HTML, CSS et JavaScript pour débutants">
                                    </div>
                                    <div class="flex-1 min-w-0">
                                        <p class="text-sm font-medium text-gray-900 truncate">
                                            HTML, CSS et JavaScript pour débutants
                                        </p>
                                        <p class="text-sm text-gray-500 truncate">
                                            Thomas Dupont
                                        </p>
                                    </div>
                                    <div>
                                        <div class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                            458 inscrits
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="py-4">
                                <div class="flex items-center space-x-4">
                                    <div class="flex-shrink-0">
                                        <img class="h-12 w-12 rounded-md object-cover" src="https://images.unsplash.com/photo-1517694712202-14dd9538aa97?ixlib=rb-1.2.1&auto=format&fit=crop&w=600&q=80" alt="React.js: From Zero to Hero">
                                    </div>
                                    <div class="flex-1 min-w-0">
                                        <p class="text-sm font-medium text-gray-900 truncate">
                                            React.js: From Zero to Hero
                                        </p>
                                        <p class="text-sm text-gray-500 truncate">
                                            Marie Laurent
                                        </p>
                                    </div>
                                    <div>
                                        <div class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                            376 inscrits
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="py-4">
                                <div class="flex items-center space-x-4">
                                    <div class="flex-shrink-0">
                                        <img class="h-12 w-12 rounded-md object-cover" src="https://images.unsplash.com/photo-1555952517-2e8e729e0b44?ixlib=rb-1.2.1&auto=format&fit=crop&w=600&q=80" alt="Introduction à Swift et iOS">
                                    </div>
                                    <div class="flex-1 min-w-0">
                                        <p class="text-sm font-medium text-gray-900 truncate">
                                            Introduction à Swift et iOS
                                        </p>
                                        <p class="text-sm text-gray-500 truncate">
                                            Jean Martin
                                        </p>
                                    </div>
                                    <div>
                                        <div class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                            289 inscrits
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="mt-6">
                        <a href="#" class="w-full flex justify-center items-center px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50">
                            Voir tous les cours
                        </a>
                    </div>
                </div>
            </div>

            <!-- Top Instructors -->
            <div class="bg-white overflow-hidden shadow rounded-lg">
                <div class="px-4 py-5 border-b border-gray-200 sm:px-6">
                    <h3 class="text-lg font-medium leading-6 text-gray-900">Meilleurs instructeurs</h3>
                </div>
                <div class="px-4 py-5 sm:p-6">
                    <div class="flow-root">
                        <ul class="-my-5 divide-y divide-gray-200">
                            <li class="py-4">
                                <div class="flex items-center space-x-4">
                                    <div class="flex-shrink-0">
                                        <img class="h-12 w-12 rounded-full" src="https://images.unsplash.com/photo-1500648767791-00dcc994a43e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=4&w=256&h=256&q=60" alt="Thomas Dupont">
                                    </div>
                                    <div class="flex-1 min-w-0">
                                        <p class="text-sm font-medium text-gray-900 truncate">
                                            Thomas Dupont
                                        </p>
                                        <p class="text-sm text-gray-500 truncate">
                                            Développement Web
                                        </p>
                                    </div>
                                    <div>
                                        <div class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                            8 cours
                                        </div>
                                    </div>
                                    <div>
                                        <div class="flex items-center">
                                            <i class="fas fa-star text-yellow-400"></i>
                                            <span class="ml-1 text-sm font-medium text-gray-900">4.9</span>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="py-4">
                                <div class="flex items-center space-x-4">
                                    <div class="flex-shrink-0">
                                        <img class="h-12 w-12 rounded-full" src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=4&w=256&h=256&q=60" alt="Marie Laurent">
                                    </div>
                                    <div class="flex-1 min-w-0">
                                        <p class="text-sm font-medium text-gray-900 truncate">
                                            Marie Laurent
                                        </p>
                                        <p class="text-sm text-gray-500 truncate">
                                            Développement Frontend
                                        </p>
                                    </div>
                                    <div>
                                        <div class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                            6 cours
                                        </div>
                                    </div>
                                    <div>
                                        <div class="flex items-center">
                                            <i class="fas fa-star text-yellow-400"></i>
                                            <span class="ml-1 text-sm font-medium text-gray-900">4.8</span>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="py-4">
                                <div class="flex items-center space-x-4">
                                    <div class="flex-shrink-0">
                                        <img class="h-12 w-12 rounded-full" src="https://images.unsplash.com/photo-1520813792240-56fc4a3765a7?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=4&w=256&h=256&q=60" alt="Jean Martin">
                                    </div>
                                    <div class="flex-1 min-w-0">
                                        <p class="text-sm font-medium text-gray-900 truncate">
                                            Jean Martin
                                        </p>
                                        <p class="text-sm text-gray-500 truncate">
                                            Développement Mobile
                                        </p>
                                    </div>
                                    <div>
                                        <div class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                            5 cours
                                        </div>
                                    </div>
                                    <div>
                                        <div class="flex items-center">
                                            <i class="fas fa-star text-yellow-400"></i>
                                            <span class="ml-1 text-sm font-medium text-gray-900">4.7</span>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="mt-6">
                        <a href="#" class="w-full flex justify-center items-center px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50">
                            Voir tous les instructeurs
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Badges Section (Hidden by default) -->
    <div id="section-badges" class="hidden space-y-6">
        <!-- Badges Header -->
        <div class="md:flex md:items-center md:justify-between mb-6">
            <div class="flex-1 min-w-0">
                <h2 class="text-lg font-medium leading-6 text-gray-900">
                    Gestion des Badges
                </h2>
                <p class="mt-1 text-sm text-gray-500">
                    Créez et gérez les badges et récompenses pour vos utilisateurs
                </p>
            </div>
            <div class="mt-4 flex md:mt-0 md:ml-4">
                <button type="button" class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    <i class="fas fa-plus -ml-1 mr-2"></i>
                    Ajouter un badge
                </button>
            </div>
        </div>

        <!-- Badges Grid -->
        <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
            <!-- Badge Card 1 -->
            <div class="bg-white overflow-hidden shadow rounded-lg">
                <div class="p-5 flex justify-center">
                    <div class="h-32 w-32 flex items-center justify-center rounded-full bg-gradient-to-r from-blue-400 to-indigo-500">
                        <i class="fas fa-award text-white text-5xl"></i>
                    </div>
                </div>
                <div class="px-5 py-3 border-t border-gray-200">
                    <div class="flex justify-between items-center">
                        <div>
                            <h3 class="text-lg font-medium text-gray-900">Premier Cours Terminé</h3>
                            <p class="text-sm text-gray-600 mt-1">Terminer son premier cours</p>
                            <p class="text-sm text-gray-500 mt-2">Attribué à 156 utilisateurs</p>
                        </div>
                        <div class="flex space-x-2">
                            <button class="text-indigo-600 hover:text-indigo-900">
                                <i class="fas fa-edit"></i>
                            </button>
                            <button class="text-red-600 hover:text-red-900">
                                <i class="fas fa-trash"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Badge Card 2 -->
            <div class="bg-white overflow-hidden shadow rounded-lg">
                <div class="p-5 flex justify-center">
                    <div class="h-32 w-32 flex items-center justify-center rounded-full bg-gradient-to-r from-green-400 to-emerald-500">
                        <i class="fas fa-star text-white text-5xl"></i>
                    </div>
                </div>
                <div class="px-5 py-3 border-t border-gray-200">
                    <div class="flex justify-between items-center">
                        <div>
                            <h3 class="text-lg font-medium text-gray-900">Expert en Développement</h3>
                            <p class="text-sm text-gray-600 mt-1">Terminer 5 cours de développement</p>
                            <p class="text-sm text-gray-500 mt-2">Attribué à 42 utilisateurs</p>
                        </div>
                        <div class="flex space-x-2">
                            <button class="text-indigo-600 hover:text-indigo-900">
                                <i class="fas fa-edit"></i>
                            </button>
                            <button class="text-red-600 hover:text-red-900">
                                <i class="fas fa-trash"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Badge Card 3 -->
            <div class="bg-white overflow-hidden shadow rounded-lg">
                <div class="p-5 flex justify-center">
                    <div class="h-32 w-32 flex items-center justify-center rounded-full bg-gradient-to-r from-yellow-400 to-amber-500">
                        <i class="fas fa-trophy text-white text-5xl"></i>
                    </div>
                </div>
                <div class="px-5 py-3 border-t border-gray-200">
                    <div class="flex justify-between items-center">
                        <div>
                            <h3 class="text-lg font-medium text-gray-900">Quiz Master</h3>
                            <p class="text-sm text-gray-600 mt-1">Obtenir 100% à 10 quiz</p>
                            <p class="text-sm text-gray-500 mt-2">Attribué à 28 utilisateurs</p>
                        </div>
                        <div class="flex space-x-2">
                            <button class="text-indigo-600 hover:text-indigo-900">
                                <i class="fas fa-edit"></i>
                            </button>
                            <button class="text-red-600 hover:text-red-900">
                                <i class="fas fa-trash"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Badge Card 4 -->
            <div class="bg-white overflow-hidden shadow rounded-lg">
                <div class="p-5 flex justify-center">
                    <div class="h-32 w-32 flex items-center justify-center rounded-full bg-gradient-to-r from-purple-400 to-fuchsia-500">
                        <i class="fas fa-medal text-white text-5xl"></i>
                    </div>
                </div>
                <div class="px-5 py-3 border-t border-gray-200">
                    <div class="flex justify-between items-center">
                        <div>
                            <h3 class="text-lg font-medium text-gray-900">Contributeur Actif</h3>
                            <p class="text-sm text-gray-600 mt-1">Poster 20 commentaires utiles</p>
                            <p class="text-sm text-gray-500 mt-2">Attribué à 64 utilisateurs</p>
                        </div>
                        <div class="flex space-x-2">
                            <button class="text-indigo-600 hover:text-indigo-900">
                                <i class="fas fa-edit"></i>
                            </button>
                            <button class="text-red-600 hover:text-red-900">
                                <i class="fas fa-trash"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Recent Badge Attributions -->
        <div class="mt-8">
            <h3 class="text-lg leading-6 font-medium text-gray-900 mb-4">
                Attributions récentes
            </h3>
            <div class="bg-white shadow overflow-hidden sm:rounded-md">
                <ul class="divide-y divide-gray-200">
                    <li>
                        <div class="px-4 py-4 sm:px-6">
                            <div class="flex items-center justify-between">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0 h-10 w-10">
                                        <img class="h-10 w-10 rounded-full" src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=4&w=256&h=256&q=60" alt="">
                                    </div>
                                    <div class="ml-4">
                                        <div class="text-sm font-medium text-gray-900">
                                            Sophie Martin
                                        </div>
                                        <div class="text-sm text-gray-500">
                                            sophie.martin@example.com
                                        </div>
                                    </div>
                                </div>
                                <div class="flex items-center">
                                    <div class="flex-shrink-0 h-8 w-8 mr-2">
                                        <div class="h-8 w-8 flex items-center justify-center rounded-full bg-gradient-to-r from-blue-400 to-indigo-500">
                                            <i class="fas fa-award text-white text-xs"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="text-sm font-medium text-gray-900">
                                            Premier Cours Terminé
                                        </div>
                                        <div class="text-sm text-gray-500">
                                            Il y a 2 heures
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="px-4 py-4 sm:px-6">
                            <div class="flex items-center justify-between">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0 h-10 w-10">
                                        <img class="h-10 w-10 rounded-full" src="https://images.unsplash.com/photo-1500648767791-00dcc994a43e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=4&w=256&h=256&q=60" alt="">
                                    </div>
                                    <div class="ml-4">
                                        <div class="text-sm font-medium text-gray-900">
                                            Thomas Dupont
                                        </div>
                                        <div class="text-sm text-gray-500">
                                            thomas.dupont@example.com
                                        </div>
                                    </div>
                                </div>
                                <div class="flex items-center">
                                    <div class="flex-shrink-0 h-8 w-8 mr-2">
                                        <div class="h-8 w-8 flex items-center justify-center rounded-full bg-gradient-to-r from-green-400 to-emerald-500">
                                            <i class="fas fa-star text-white text-xs"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="text-sm font-medium text-gray-900">
                                            Expert en Développement
                                        </div>
                                        <div class="text-sm text-gray-500">
                                            Hier
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <!-- Tags Section (Hidden by default) -->
    <div id="section-tags" class="hidden space-y-6">
        <!-- Tags Header -->
        <div class="md:flex md:items-center md:justify-between mb-6">
            <div class="flex-1 min-w-0">
                <h2 class="text-lg font-medium leading-6 text-gray-900">
                    Gestion des Tags
                </h2>
                <p class="mt-1 text-sm text-gray-500">
                    Créez et gérez les tags pour organiser vos cours et contenus
                </p>
            </div>
            <div class="mt-4 flex md:mt-0 md:ml-4">
                <button type="button" class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    <i class="fas fa-plus -ml-1 mr-2"></i>
                    Ajouter un tag
                </button>
            </div>
        </div>

        <!-- Tags Table -->
        <div class="flex flex-col">
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Nom
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Description
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Cours associés
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Couleur
                                </th>
                                <th scope="col" class="relative px-6 py-3">
                                    <span class="sr-only">Actions</span>
                                </th>
                            </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                            <!-- Tag Row 1 -->
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm font-medium text-gray-900">JavaScript</div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="text-sm text-gray-900">Langage de programmation pour le web</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    12
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">
                                            #F7DF1E
                                        </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <button class="text-indigo-600 hover:text-indigo-900 mr-3">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button class="text-red-600 hover:text-red-900">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </td>
                            </tr>

                            <!-- Tag Row 2 -->
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm font-medium text-gray-900">React</div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="text-sm text-gray-900">Bibliothèque JavaScript pour créer des interfaces utilisateur</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    8
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">
                                            #61DAFB
                                        </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <button class="text-indigo-600 hover:text-indigo-900 mr-3">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button class="text-red-600 hover:text-red-900">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </td>
                            </tr>

                            <!-- Tag Row 3 -->
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm font-medium text-gray-900">Python</div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="text-sm text-gray-900">Langage de programmation polyvalent</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    6
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                            #3776AB
                                        </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <button class="text-indigo-600 hover:text-indigo-900 mr-3">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button class="text-red-600 hover:text-red-900">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </td>
                            </tr>

                            <!-- Tag Row 4 -->
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm font-medium text-gray-900">Débutant</div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="text-sm text-gray-900">Cours pour les débutants</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    15
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-purple-100 text-purple-800">
                                            #9C27B0
                                        </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <button class="text-indigo-600 hover:text-indigo-900 mr-3">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button class="text-red-600 hover:text-red-900">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tag Usage Chart -->
        <div class="bg-white overflow-hidden shadow rounded-lg">
            <div class="px-4 py-5 sm:p-6">
                <h3 class="text-lg leading-6 font-medium text-gray-900 mb-4">Utilisation des tags</h3>
                <div class="h-80 bg-gray-50 rounded-lg flex items-center justify-center">
                    <p class="text-gray-500">Graphique d'utilisation des tags</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Add/Edit Badge Modal (Hidden by default) -->
    <div class="fixed z-10 inset-0 overflow-y-auto hidden" id="badge-modal">
        <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
            <div class="fixed inset-0 transition-opacity" aria-hidden="true">
                <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
            </div>

            <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>

            <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                <form id="badge-form">
                    <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                        <div class="sm:flex sm:items-start">
                            <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left w-full">
                                <h3 class="text-lg leading-6 font-medium text-gray-900" id="badge-modal-title">
                                    Ajouter un badge
                                </h3>
                                <div class="mt-4 space-y-4">
                                    <input type="hidden" id="badge-id" name="id" value="">

                                    <div>
                                        <label for="badge-name" class="block text-sm font-medium text-gray-700">Nom du badge</label>
                                        <input type="text" name="name" id="badge-name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                    </div>

                                    <div>
                                        <label for="badge-description" class="block text-sm font-medium text-gray-700">Description</label>
                                        <textarea name="description" id="badge-description" rows="3" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"></textarea>
                                    </div>

                                    <div>
                                        <label for="badge-icon" class="block text-sm font-medium text-gray-700">Icône</label>
                                        <select id="badge-icon" name="icon" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                                            <option value="award">Médaille (award)</option>
                                            <option value="star">Étoile (star)</option>
                                            <option value="trophy">Trophée (trophy)</option>
                                            <option value="medal">Médaille (medal)</option>
                                            <option value="fire">Flamme (fire)</option>
                                            <option value="graduation-cap">Diplôme (graduation-cap)</option>
                                        </select>
                                    </div>

                                    <div>
                                        <label for="badge-color" class="block text-sm font-medium text-gray-700">Couleur</label>
                                        <select id="badge-color" name="color" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                                            <option value="blue">Bleu</option>
                                            <option value="green">Vert</option>
                                            <option value="yellow">Jaune</option>
                                            <option value="purple">Violet</option>
                                            <option value="red">Rouge</option>
                                            <option value="cyan">Cyan</option>
                                        </select>
                                    </div>

                                    <div>
                                        <label for="badge-condition" class="block text-sm font-medium text-gray-700">Condition d'obtention</label>
                                        <textarea name="condition" id="badge-condition" rows="2" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                        <button type="submit" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-indigo-600 text-base font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:ml-3 sm:w-auto sm:text-sm">
                            Enregistrer
                        </button>
                        <button type="button" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                            Annuler
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Add/Edit Tag Modal (Hidden by default) -->
    <div class="fixed z-10 inset-0 overflow-y-auto hidden" id="tag-modal">
        <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
            <div class="fixed inset-0 transition-opacity" aria-hidden="true">
                <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
            </div>

            <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>

            <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                <form id="tag-form">
                    <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                        <div class="sm:flex sm:items-start">
                            <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left w-full">
                                <h3 class="text-lg leading-6 font-medium text-gray-900" id="tag-modal-title">
                                    Ajouter un tag
                                </h3>
                                <div class="mt-4 space-y-4">
                                    <input type="hidden" id="tag-id" name="id" value="">

                                    <div>
                                        <label for="tag-name" class="block text-sm font-medium text-gray-700">Nom du tag</label>
                                        <input type="text" name="name" id="tag-name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                    </div>

                                    <div>
                                        <label for="tag-description" class="block text-sm font-medium text-gray-700">Description</label>
                                        <textarea name="description" id="tag-description" rows="3" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"></textarea>
                                    </div>

                                    <div>
                                        <label for="tag-color" class="block text-sm font-medium text-gray-700">Couleur</label>
                                        <div class="mt-1 flex items-center">
                                            <input type="color" id="tag-color" name="color" value="#3B82F6" class="h-8 w-8 rounded-md border-gray-300">
                                            <input type="text" name="color-hex" id="tag-color-hex" value="#3B82F6" class="ml-2 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                        <button type="submit" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-indigo-600 text-base font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:ml-3 sm:w-auto sm:text-sm">
                            Enregistrer
                        </button>
                        <button type="button" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                            Annuler
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Tab switching functionality
            const tabStats = document.getElementById('tab-stats');
            const tabBadges = document.getElementById('tab-badges');
            const tabTags = document.getElementById('tab-tags');

            const sectionStats = document.getElementById('section-stats');
            const sectionBadges = document.getElementById('section-badges');
            const sectionTags = document.getElementById('section-tags');

            // Set active tab
            function setActiveTab(tab, section) {
                // Reset all tabs
                [tabStats, tabBadges, tabTags].forEach(t => {
                    t.classList.remove('border-indigo-500', 'text-indigo-600');
                    t.classList.add('border-transparent', 'text-gray-500', 'hover:text-gray-700', 'hover:border-gray-300');
                });

                // Set active tab
                tab.classList.remove('border-transparent', 'text-gray-500', 'hover:text-gray-700', 'hover:border-gray-300');
                tab.classList.add('border-indigo-500', 'text-indigo-600');

                // Hide all sections
                [sectionStats, sectionBadges, sectionTags].forEach(s => {
                    s.classList.add('hidden');
                });

                // Show active section
                section.classList.remove('hidden');
            }

            // Add event listeners
            tabStats.addEventListener('click', () => setActiveTab(tabStats, sectionStats));
            tabBadges.addEventListener('click', () => setActiveTab(tabBadges, sectionBadges));
            tabTags.addEventListener('click', () => setActiveTab(tabTags, sectionTags));
        });
    </script>
@endsection
