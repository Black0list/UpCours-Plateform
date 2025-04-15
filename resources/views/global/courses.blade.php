@extends('layouts.app')

@section('title', 'Tous les cours')
@section('meta_description', 'Découvrez tous les cours disponibles sur UpCours. Filtrez par catégorie, niveau et enseignant pour trouver le cours parfait pour vous.')

@section('content')
    <!-- Courses Header -->
    <section class="bg-gradient-to-r from-indigo-600 to-purple-600 text-white py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <h1 class="text-3xl font-extrabold sm:text-4xl">Explorez nos cours</h1>
                <p class="mt-3 text-xl">Trouvez le cours parfait pour développer vos compétences</p>
            </div>
        </div>
    </section>

    <!-- Courses Content -->
    <section class="py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-4 gap-8">
                <!-- Filters Sidebar -->
                <div class="lg:col-span-1">
                    <div class="bg-white rounded-lg shadow-sm p-6 sticky top-6">
                        <h2 class="text-lg font-semibold text-gray-900 mb-4">Filtres</h2>
                        <form method="GET" action="#">
                            <!-- Search -->
                            <div class="mb-6">
                                <label for="search" class="block text-sm font-medium text-gray-700 mb-1">Rechercher</label>
                                <input type="text" id="search" name="search" placeholder="Rechercher un cours..." class="w-full p-2  rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                            </div>
                            <!-- Categories -->
                            <div class="mb-6">
                                <h3 class="text-sm font-medium text-gray-900 mb-2">Catégories</h3>
                                <div class="flex items-center">
                                    <input id="category-dev" name="category" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                                    <label for="category-dev" class="ml-2 text-sm text-gray-700">Développement</label>
                                </div>
                                <div class="flex items-center">
                                    <input id="category-data" name="category" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                                    <label for="category-data" class="ml-2 text-sm text-gray-700">Data Science</label>
                                </div>
                            </div>
                            <!-- Apply Filters Button -->
                            <button type="submit" class="w-full bg-indigo-600 text-white py-2 px-4 rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                                Appliquer les filtres
                            </button>
                        </form>
                    </div>
                </div>

                <!-- Courses Grid -->
                <div class="lg:col-span-3">
                    <!-- Sort Options -->
                    <div class="flex justify-between items-center mb-6">
                        <p class="text-sm text-gray-500">Affichage de <span class="font-medium">6</span> cours</p>
                        <div class="flex items-center">
                            <label for="sort" class="text-sm font-medium text-gray-700 mr-2 ">Trier par:</label>
                            <select id="sort" name="sort" class="rounded-md border-2 py-1 pl-3 pr-10 text-base focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm">
                                <option value="popular">Les plus populaires</option>
                                <option value="latest">Plus récents</option>
                            </select>
                        </div>
                    </div>

                    <!-- Courses List -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                        <div class="bg-white rounded-lg shadow-md overflow-hidden">
                            <img src="/images/course1.jpg" alt="Développement Web" class="w-full h-40 object-cover">
                            <div class="p-5">
                                <h3 class="text-lg font-semibold text-gray-900 mb-2">Développement Web</h3>
                                <p class="text-gray-600 text-sm mb-4">Apprenez les bases du développement web moderne.</p>
                                <div class="flex justify-between items-center">
                                    <span class="text-gray-900 font-bold">49,99 €</span>
                                    <a href="#" class="text-indigo-600 hover:text-indigo-800 font-medium text-sm">Voir le cours</a>
                                </div>
                            </div>
                        </div>
                        <div class="bg-white rounded-lg shadow-md overflow-hidden">
                            <img src="/images/course2.jpg" alt="Data Science" class="w-full h-40 object-cover">
                            <div class="p-5">
                                <h3 class="text-lg font-semibold text-gray-900 mb-2">Data Science</h3>
                                <p class="text-gray-600 text-sm mb-4">Analysez des données avec Python et Machine Learning.</p>
                                <div class="flex justify-between items-center">
                                    <span class="text-gray-900 font-bold">59,99 €</span>
                                    <a href="#" class="text-indigo-600 hover:text-indigo-800 font-medium text-sm">Voir le cours</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
