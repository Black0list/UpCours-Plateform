@extends('layouts.admin')

@section('title', 'Gestion des Catégories et Cours')
@section('meta_description', 'Gérez les catégories et cours de la plateforme UpCours')

@section('content')
    <!-- Page Header -->
    <div class="md:flex md:items-center md:justify-between mb-8">
        <div class="flex-1 min-w-0">
            <h2 class="text-2xl font-bold leading-7 text-gray-900 sm:text-3xl sm:truncate">
                Catégories et Cours
            </h2>
        </div>
        <div class="mt-4 flex md:mt-0 md:ml-4 space-x-3">
            <button type="button" onclick="document.getElementById('category-modal').classList.remove('hidden')" class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                <i class="fas fa-folder-plus -ml-1 mr-2"></i>
                Ajouter une catégorie
            </button>
            <button type="button" onclick="document.getElementById('course-modal').classList.remove('hidden')" class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                <i class="fas fa-plus -ml-1 mr-2"></i>
                Ajouter un cours
            </button>
        </div>
    </div>

    <!-- Tabs -->
    <div class="border-b border-gray-200 mb-6">
        <nav class="-mb-px flex space-x-8" aria-label="Tabs">
            <button id="categories-tab" onclick="showTab('categories')" class="border-indigo-500 text-indigo-600 whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm">
                Catégories
            </button>
            <button id="courses-tab" onclick="showTab('courses')" class="border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm">
                Cours
            </button>
        </nav>
    </div>

    <!-- Categories Section -->
    <div id="categories-section">
        <!-- Categories Table -->
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
                                    Nombre de cours
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Statut
                                </th>
                                <th scope="col" class="relative px-6 py-3">
                                    <span class="sr-only">Actions</span>
                                </th>
                            </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                            <!-- Category Row 1 -->
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0 h-10 w-10 flex items-center justify-center rounded-full bg-indigo-100 text-indigo-500">
                                            <i class="fas fa-laptop-code"></i>
                                        </div>
                                        <div class="ml-4">
                                            <div class="text-sm font-medium text-gray-900">
                                                Développement Web
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="text-sm text-gray-900">Apprenez à créer des sites web modernes</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    12
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                            Actif
                                        </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <button onclick="editCategory(1)" class="text-indigo-600 hover:text-indigo-900 mr-3">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button onclick="confirmDeleteCategory(1)" class="text-red-600 hover:text-red-900">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </td>
                            </tr>

                            <!-- Category Row 2 -->
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0 h-10 w-10 flex items-center justify-center rounded-full bg-blue-100 text-blue-500">
                                            <i class="fas fa-mobile-alt"></i>
                                        </div>
                                        <div class="ml-4">
                                            <div class="text-sm font-medium text-gray-900">
                                                Développement Mobile
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="text-sm text-gray-900">Créez des applications mobiles pour iOS et Android</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    8
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                            Actif
                                        </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <button onclick="editCategory(2)" class="text-indigo-600 hover:text-indigo-900 mr-3">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button onclick="confirmDeleteCategory(2)" class="text-red-600 hover:text-red-900">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </td>
                            </tr>

                            <!-- Category Row 3 -->
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0 h-10 w-10 flex items-center justify-center rounded-full bg-purple-100 text-purple-500">
                                            <i class="fas fa-database"></i>
                                        </div>
                                        <div class="ml-4">
                                            <div class="text-sm font-medium text-gray-900">
                                                Data Science
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="text-sm text-gray-900">Explorez le monde de la data science et du machine learning</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    5
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">
                                            En préparation
                                        </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <button onclick="editCategory(3)" class="text-indigo-600 hover:text-indigo-900 mr-3">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button onclick="confirmDeleteCategory(3)" class="text-red-600 hover:text-red-900">
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
    </div>

    <!-- Courses Section (Hidden by default) -->
    <div id="courses-section" class="hidden">
        <!-- Filters and Search -->
        <div class="bg-white shadow px-4 py-5 sm:rounded-lg sm:p-6 mb-6">
            <div class="md:flex md:items-center md:justify-between">
                <div class="flex-1 min-w-0">
                    <h3 class="text-lg font-medium leading-6 text-gray-900">Filtres</h3>
                </div>
            </div>
            <div class="mt-4">
                <form id="course-filter-form" class="grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-6">
                    <div class="sm:col-span-2">
                        <label for="course-search" class="block text-sm font-medium text-gray-700">Recherche</label>
                        <div class="mt-1 relative rounded-md shadow-sm">
                            <input type="text" name="search" id="course-search" class="focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md" placeholder="Titre, description...">
                            <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                <i class="fas fa-search text-gray-400"></i>
                            </div>
                        </div>
                    </div>
                    <div class="sm:col-span-1">
                        <label for="course-category" class="block text-sm font-medium text-gray-700">Catégorie</label>
                        <select id="course-category" name="category" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                            <option value="">Toutes</option>
                            <option value="1">Développement Web</option>
                            <option value="2">Développement Mobile</option>
                            <option value="3">Data Science</option>
                        </select>
                    </div>
                    <div class="sm:col-span-1">
                        <label for="course-status" class="block text-sm font-medium text-gray-700">Statut</label>
                        <select id="course-status" name="status" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                            <option value="">Tous</option>
                            <option value="published">Publié</option>
                            <option value="draft">Brouillon</option>
                            <option value="archived">Archivé</option>
                        </select>
                    </div>
                    <div class="sm:col-span-1">
                        <label for="course-instructor" class="block text-sm font-medium text-gray-700">Instructeur</label>
                        <select id="course-instructor" name="instructor" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                            <option value="">Tous</option>
                            <option value="1">Thomas Dupont</option>
                            <option value="2">Marie Laurent</option>
                            <option value="3">Jean Martin</option>
                        </select>
                    </div>
                    <div class="sm:col-span-1 flex items-end">
                        <button type="submit" class="w-full inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            <i class="fas fa-filter mr-2"></i> Filtrer
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Courses Table -->
        <div class="flex flex-col">
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Cours
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Catégorie
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Instructeur
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Statut
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Étudiants
                                </th>
                                <th scope="col" class="relative px-6 py-3">
                                    <span class="sr-only">Actions</span>
                                </th>
                            </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                            <!-- Course Row 1 -->
                            <tr>
                                <td class="px-6 py-4">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0 h-10 w-10">
                                            <img class="h-10 w-10 rounded-md object-cover" src="https://images.unsplash.com/photo-1498050108023-c5249f4df085?ixlib=rb-1.2.1&auto=format&fit=crop&w=600&q=80" alt="">
                                        </div>
                                        <div class="ml-4">
                                            <div class="text-sm font-medium text-gray-900">
                                                HTML, CSS et JavaScript pour débutants
                                            </div>
                                            <div class="text-sm text-gray-500">
                                                Créé le 15/01/2023
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">Développement Web</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">Thomas Dupont</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                            Publié
                                        </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    128
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <button onclick="editCourse(1)" class="text-indigo-600 hover:text-indigo-900 mr-3">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button onclick="confirmDeleteCourse(1)" class="text-red-600 hover:text-red-900">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </td>
                            </tr>

                            <!-- Course Row 2 -->
                            <tr>
                                <td class="px-6 py-4">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0 h-10 w-10">
                                            <img class="h-10 w-10 rounded-md object-cover" src="https://images.unsplash.com/photo-1517694712202-14dd9538aa97?ixlib=rb-1.2.1&auto=format&fit=crop&w=600&q=80" alt="">
                                        </div>
                                        <div class="ml-4">
                                            <div class="text-sm font-medium text-gray-900">
                                                React.js: From Zero to Hero
                                            </div>
                                            <div class="text-sm text-gray-500">
                                                Créé le 02/02/2023
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">Développement Web</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">Marie Laurent</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                            Publié
                                        </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    95
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <button onclick="editCourse(2)" class="text-indigo-600 hover:text-indigo-900 mr-3">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button onclick="confirmDeleteCourse(2)" class="text-red-600 hover:text-red-900">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </td>
                            </tr>

                            <!-- Course Row 3 -->
                            <tr>
                                <td class="px-6 py-4">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0 h-10 w-10">
                                            <img class="h-10 w-10 rounded-md object-cover" src="https://images.unsplash.com/photo-1555952517-2e8e729e0b44?ixlib=rb-1.2.1&auto=format&fit=crop&w=600&q=80" alt="">
                                        </div>
                                        <div class="ml-4">
                                            <div class="text-sm font-medium text-gray-900">
                                                Introduction à Swift et iOS
                                            </div>
                                            <div class="text-sm text-gray-500">
                                                Créé le 10/03/2023
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">Développement Mobile</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">Jean Martin</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">
                                            Brouillon
                                        </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    0
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <button onclick="editCourse(3)" class="text-indigo-600 hover:text-indigo-900 mr-3">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button onclick="confirmDeleteCourse(3)" class="text-red-600 hover:text-red-900">
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
    </div>

    <!-- Add/Edit Category Modal -->
    <div id="category-modal" class="fixed z-10 inset-0 overflow-y-auto hidden" aria-labelledby="modal-title" role="dialog" aria-modal="true">
        <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
            <!-- Background overlay -->
            <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>

            <!-- Modal panel -->
            <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                <form id="category-form">
                    <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                        <div class="sm:flex sm:items-start">
                            <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left w-full">
                                <h3 class="text-lg leading-6 font-medium text-gray-900" id="category-modal-title">
                                    Ajouter une catégorie
                                </h3>
                                <div class="mt-4 space-y-4">
                                    <input type="hidden" id="category-id" name="id" value="">

                                    <div>
                                        <label for="category-name" class="block text-sm font-medium text-gray-700">Nom</label>
                                        <input type="text" name="name" id="category-name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                    </div>

                                    <div>
                                        <label for="category-description" class="block text-sm font-medium text-gray-700">Description</label>
                                        <textarea name="description" id="category-description" rows="3" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"></textarea>
                                    </div>

                                    <div>
                                        <label for="category-icon" class="block text-sm font-medium text-gray-700">Icône</label>
                                        <div class="mt-1 flex items-center">
                                            <span class="inline-block h-12 w-12 rounded-full overflow-hidden bg-gray-100">
                                                <i class="fas fa-folder text-gray-400 flex items-center justify-center h-full w-full text-2xl" id="category-icon-preview"></i>
                                            </span>
                                            <div class="ml-5">
                                                <select id="category-icon" name="icon" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                                                    <option value="laptop-code">Développement Web</option>
                                                    <option value="mobile-alt">Développement Mobile</option>
                                                    <option value="database">Data Science</option>
                                                    <option value="palette">Design</option>
                                                    <option value="chart-bar">Business</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div>
                                        <label for="category-status" class="block text-sm font-medium text-gray-700">Statut</label>
                                        <select id="category-status" name="status" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                                            <option value="active">Actif</option>
                                            <option value="inactive">Inactif</option>
                                            <option value="preparation">En préparation</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                        <button type="submit" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-indigo-600 text-base font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:ml-3 sm:w-auto sm:text-sm">
                            Enregistrer
                        </button>
                        <button type="button" onclick="document.getElementById('category-modal').classList.add('hidden')" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                            Annuler
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Add/Edit Course Modal -->
    <div id="course-modal" class="fixed z-10 inset-0 overflow-y-auto hidden" aria-labelledby="modal-title" role="dialog" aria-modal="true">
        <div class="flex items-end justify-center min-h-screen pt-4 px-4   aria-modal="true">
        <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
            <!-- Background overlay -->
            <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>

            <!-- Modal panel -->
            <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                <form id="course-form">
                    <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                        <div class="sm:flex sm:items-start">
                            <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left w-full">
                                <h3 class="text-lg leading-6 font-medium text-gray-900" id="course-modal-title">
                                    Ajouter un cours
                                </h3>
                                <div class="mt-4 space-y-4">
                                    <input type="hidden" id="course-id" name="id" value="">

                                    <div>
                                        <label for="course-title" class="block text-sm font-medium text-gray-700">Titre</label>
                                        <input type="text" name="title" id="course-title" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                    </div>

                                    <div>
                                        <label for="course-description" class="block text-sm font-medium text-gray-700">Description</label>
                                        <textarea name="description" id="course-description" rows="3" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"></textarea>
                                    </div>

                                    <div>
                                        <label for="course-category-select" class="block text-sm font-medium text-gray-700">Catégorie</label>
                                        <select id="course-category-select" name="category" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                                            <option value="1">Développement Web</option>
                                            <option value="2">Développement Mobile</option>
                                            <option value="3">Data Science</option>
                                        </select>
                                    </div>

                                    <div>
                                        <label for="course-instructor" class="block text-sm font-medium text-gray-700">Instructeur</label>
                                        <select id="course-instructor-select" name="instructor" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                                            <option value="1">Thomas Dupont</option>
                                            <option value="2">Marie Laurent</option>
                                            <option value="3">Jean Martin</option>
                                        </select>
                                    </div>

                                    <div>
                                        <label for="course-image" class="block text-sm font-medium text-gray-700">Image</label>
                                        <div class="mt-1 flex items-center">
                                            <span class="inline-block h-12 w-12 rounded-md overflow-hidden bg-gray-100">
                                                <img id="course-image-preview" src="https://images.unsplash.com/photo-1498050108023-c5249f4df085?ixlib=rb-1.2.1&auto=format&fit=crop&w=600&q=80" alt="Aperçu de l'image" class="h-full w-full object-cover">
                                            </span>
                                            <div class="ml-5">
                                                <button type="button" class="bg-white py-2 px-3 border border-gray-300 rounded-md shadow-sm text-sm leading-4 font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                                    Changer
                                                </button>
                                            </div>
                                        </div>
                                    </div>

                                    <div>
                                        <label for="course-price" class="block text-sm font-medium text-gray-700">Prix (€)</label>
                                        <input type="number" name="price" id="course-price" min="0" step="0.01" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                    </div>

                                    <div>
                                        <label for="course-status-select" class="block text-sm font-medium text-gray-700">Statut</label>
                                        <select id="course-status-select" name="status" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                                            <option value="published">Publié</option>
                                            <option value="draft">Brouillon</option>
                                            <option value="archived">Archivé</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                        <button type="submit" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-indigo-600 text-base font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:ml-3 sm:w-auto sm:text-sm">
                            Enregistrer
                        </button>
                        <button type="button" onclick="document.getElementById('course-modal').classList.add('hidden')" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                            Annuler
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Delete Confirmation Modal -->
    <div id="delete-modal" class="fixed z-10 inset-0 overflow-y-auto hidden" aria-labelledby="modal-title" role="dialog" aria-modal="true">
        <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
            <!-- Background overlay -->
            <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>

            <!-- Modal panel -->
            <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                    <div class="sm:flex sm:items-start">
                        <div class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-red-100 sm:mx-0 sm:h-10 sm:w-10">
                            <i class="fas fa-exclamation-triangle text-red-600"></i>
                        </div>
                        <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                            <h3 class="text-lg leading-6 font-medium text-gray-900" id="delete-modal-title">
                                Supprimer
                            </h3>
                            <div class="mt-2">
                                <p class="text-sm text-gray-500" id="delete-modal-message">
                                    Êtes-vous sûr de vouloir supprimer cet élément ? Cette action est irréversible.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                    <button type="button" id="confirm-delete-button" onclick="deleteItem()" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-red-600 text-base font-medium text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:ml-3 sm:w-auto sm:text-sm">
                        Supprimer
                    </button>
                    <button type="button" onclick="document.getElementById('delete-modal').classList.add('hidden')" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                        Annuler
                    </button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        // Variables to store IDs for deletion
        let itemToDeleteId = null;
        let itemToDeleteType = null;

        // Function to show tab
        function showTab(tab) {
            if (tab === 'categories') {
                document.getElementById('categories-tab').classList.add('border-indigo-500', 'text-indigo-600');
                document.getElementById('categories-tab').classList.remove('border-transparent', 'text-gray-500');
                document.getElementById('courses-tab').classList.add('border-transparent', 'text-gray-500');
                document.getElementById('courses-tab').classList.remove('border-indigo-500', 'text-indigo-600');

                document.getElementById('categories-section').classList.remove('hidden');
                document.getElementById('courses-section').classList.add('hidden');
            } else {
                document.getElementById('courses-tab').classList.add('border-indigo-500', 'text-indigo-600');
                document.getElementById('courses-tab').classList.remove('border-transparent', 'text-gray-500');
                document.getElementById('categories-tab').classList.add('border-transparent', 'text-gray-500');
                document.getElementById('categories-tab').classList.remove('border-indigo-500', 'text-indigo-600');

                document.getElementById('courses-section').classList.remove('hidden');
                document.getElementById('categories-section').classList.add('hidden');
            }
        }

        // Function to edit a category
        function editCategory(categoryId) {
            // In a real application, you would fetch category data from the server
            // For this example, we'll use dummy data
            let categoryData = {
                id: categoryId,
                name: categoryId === '1' ? 'Développement Web' : (categoryId === '2' ? 'Développement Mobile' : 'Data Science'),
                description: categoryId === '1' ? 'Apprenez à créer des sites web modernes' : (categoryId === '2' ? 'Créez des applications mobiles pour iOS et Android' : 'Explorez le monde de la data science et du machine learning'),
                icon: categoryId === '1' ? 'laptop-code' : (categoryId === '2' ? 'mobile-alt' : 'database'),
                status: categoryId === '3' ? 'preparation' : 'active'
            };

            // Fill form with category data
            document.getElementById('category-id').value = categoryData.id;
            document.getElementById('category-name').value = categoryData.name;
            document.getElementById('category-description').value = categoryData.description;
            document.getElementById('category-icon').value = categoryData.icon;
            document.getElementById('category-status').value = categoryData.status;

            // Update icon preview
            document.getElementById('category-icon-preview').className = '';
            document.getElementById('category-icon-preview').classList.add('fas', 'fa-' + categoryData.icon, 'flex', 'items-center', 'justify-center', 'h-full', 'w-full', 'text-2xl');

            // Update modal title
            document.getElementById('category-modal-title').textContent = 'Modifier la catégorie';

            // Show modal
            document.getElementById('category-modal').classList.remove('hidden');
        }

        // Function to edit a course
        function editCourse(courseId) {
            // In a real application, you would fetch course data from the server
            // For this example, we'll use dummy data
            let courseData = {
                id: courseId,
                title: courseId === '1' ? 'HTML, CSS et JavaScript pour débutants' : (courseId === '2' ? 'React.js: From Zero to Hero' : 'Introduction à Swift et iOS'),
                description: 'Description du cours ' + courseId,
                category: courseId === '3' ? '2' : '1',
                instructor: courseId === '1' ? '1' : (courseId === '2' ? '2' : '3'),
                price: courseId === '1' ? '49.99' : (courseId === '2' ? '79.99' : '59.99'),
                status: courseId === '3' ? 'draft' : 'published'
            };

            // Fill form with course data
            document.getElementById('course-id').value = courseData.id;
            document.getElementById('course-title').value = courseData.title;
            document.getElementById('course-description').value = courseData.description;
            document.getElementById('course-category-select').value = courseData.category;
            document.getElementById('course-instructor-select').value = courseData.instructor;
            document.getElementById('course-price').value = courseData.price;
            document.getElementById('course-status-select').value = courseData.status;

            // Update modal title
            document.getElementById('course-modal-title').textContent = 'Modifier le cours';

            // Show modal
            document.getElementById('course-modal').classList.remove('hidden');
        }

        // Function to confirm category deletion
        function confirmDeleteCategory(categoryId) {
            itemToDeleteId = categoryId;
            itemToDeleteType = 'category';
            document.getElementById('delete-modal-title').textContent = 'Supprimer la catégorie';
            document.getElementById('delete-modal-message').textContent = 'Êtes-vous sûr de vouloir supprimer cette catégorie ? Cette action est irréversible et supprimera également tous les cours associés.';
            document.getElementById('delete-modal').classList.remove('hidden');
        }

        // Function to confirm course deletion
        function confirmDeleteCourse(courseId) {
            itemToDeleteId = courseId;
            itemToDeleteType = 'course';
            document.getElementById('delete-modal-title').textContent = 'Supprimer le cours';
            document.getElementById('delete-modal-message').textContent = 'Êtes-vous sûr de vouloir supprimer ce cours ? Cette action est irréversible.';
            document.getElementById('delete-modal').classList.remove('hidden');
        }

        // Function to delete an item
        function deleteItem() {
            // In a real application, you would send a delete request to the server
            console.log('Deleting ' + itemToDeleteType + ' with ID:', itemToDeleteId);

            // Close modal
            document.getElementById('delete-modal').classList.add('hidden');

            // Show success notification (you would implement this)
            const message = itemToDeleteType === 'category' ? 'Catégorie supprimée avec succès.' : 'Cours supprimé avec succès.';
            alert(message);

            // Reset the variables
            itemToDeleteId = null;
            itemToDeleteType = null;
        }

        // Handle category form submission
        document.getElementById('category-form').addEventListener('submit', function(e) {
            e.preventDefault();

            // In a real application, you would send form data to the server
            const isNewCategory = !document.getElementById('category-id').value;
            const message = isNewCategory ? 'Catégorie ajoutée avec succès.' : 'Catégorie mise à jour avec succès.';

            // Close modal
            document.getElementById('category-modal').classList.add('hidden');

            // Show success notification (you would implement this)
            alert(message);
        });

        // Handle course form submission
        document.getElementById('course-form').addEventListener('submit', function(e) {
            e.preventDefault();

            // In a real application, you would send form data to the server
            const isNewCourse = !document.getElementById('course-id').value;
            const message = isNewCourse ? 'Cours ajouté avec succès.' : 'Cours mis à jour avec succès.';

            // Close modal
            document.getElementById('course-modal').classList.add('hidden');

            // Show success notification (you would implement this)
            alert(message);
        });

        // Handle course filter form submission
        document.getElementById('course-filter-form').addEventListener('submit', function(e) {
            e.preventDefault();

            // In a real application, you would filter the data based on the form values
            alert('Filtres appliqués. Les résultats ont été filtrés selon vos critères.');
        });

        // Update category icon preview when icon is changed
        document.getElementById('category-icon').addEventListener('change', function() {
            document.getElementById('category-icon-preview').className = '';
            document.getElementById('category-icon-preview').classList.add('fas', 'fa-' + this.value, 'flex', 'items-center', 'justify-center', 'h-full', 'w-full', 'text-2xl');
        });
    </script>
@endsection
