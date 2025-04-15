@extends('layouts.app')

@section('title', 'Quiz - Testez vos connaissances')
@section('meta_description', 'Testez vos connaissances avec nos quiz interactifs. Obtenez des badges et des certificats en fonction de vos résultats.')

@section('content')
    <!-- Quiz Header -->
    <section class="bg-gradient-to-r from-indigo-600 to-purple-600 text-white py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <h1 class="text-3xl font-extrabold sm:text-4xl">Quiz JavaScript Avancé</h1>
                <p class="mt-3 text-xl">Testez vos connaissances en JavaScript avancé</p>
            </div>
        </div>
    </section>

    <!-- Quiz Content -->
    <section class="py-12">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Quiz Progress -->
            <div class="mb-8">
                <div class="flex justify-between items-center mb-2">
                    <span class="text-sm font-medium text-gray-700">Progression: 3/10 questions</span>
                    <span class="text-sm font-medium text-gray-700">Temps restant: 14:32</span>
                </div>
                <div class="w-full bg-gray-200 rounded-full h-2.5">
                    <div class="bg-indigo-600 h-2.5 rounded-full" style="width: 30%"></div>
                </div>
            </div>

            <!-- Current Question -->
            <div class="bg-white rounded-lg shadow-md p-6 mb-8">
                <div class="mb-6">
                    <h2 class="text-xl font-bold text-gray-900 mb-2">Question 3:</h2>
                    <p class="text-gray-700 text-lg">Quel est le résultat de l'expression suivante en JavaScript?</p>
                    <div class="mt-4 bg-gray-100 p-4 rounded-md">
                        <pre class="text-gray-800 font-mono">console.log(typeof typeof 1);</pre>
                    </div>
                </div>

                <form>
                    <div class="space-y-4">
                        <div class="flex items-center">
                            <input id="option-a" name="answer" type="radio" class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-500">
                            <label for="option-a" class="ml-3 block text-gray-700">
                                <span class="font-medium">A.</span> "number"
                            </label>
                        </div>
                        <div class="flex items-center">
                            <input id="option-b" name="answer" type="radio" class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-500">
                            <label for="option-b" class="ml-3 block text-gray-700">
                                <span class="font-medium">B.</span> "string"
                            </label>
                        </div>
                        <div class="flex items-center">
                            <input id="option-c" name="answer" type="radio" class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-500">
                            <label for="option-c" class="ml-3 block text-gray-700">
                                <span class="font-medium">C.</span> "object"
                            </label>
                        </div>
                        <div class="flex items-center">
                            <input id="option-d" name="answer" type="radio" class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-500">
                            <label for="option-d" class="ml-3 block text-gray-700">
                                <span class="font-medium">D.</span> "undefined"
                            </label>
                        </div>
                    </div>

                    <div class="mt-8 flex justify-between">
                        <button type="button" class="inline-flex items-center px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none ">
                            <svg class="mr-2 -ml-1 h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                            </svg>
                            Question précédente
                        </button>
                        <button type="submit" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none ">
                            Question suivante
                            <svg class="ml-2 -mr-1 h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                            </svg>
                        </button>
                    </div>
                </form>
            </div>

            <!-- Question Navigation -->
            <div class="bg-white rounded-lg shadow-md p-6">
                <h3 class="text-lg font-medium text-gray-900 mb-4">Navigation des questions</h3>
                <div class="grid grid-cols-5 gap-2 sm:gap-3">
                    <button class="flex items-center justify-center h-10 w-10 rounded-md bg-green-100 text-green-700 font-medium">1</button>
                    <button class="flex items-center justify-center h-10 w-10 rounded-md bg-green-100 text-green-700 font-medium">2</button>
                    <button class="flex items-center justify-center h-10 w-10 rounded-md bg-indigo-600 text-white font-medium">3</button>
                    <button class="flex items-center justify-center h-10 w-10 rounded-md bg-gray-100 text-gray-500 font-medium">4</button>
                    <button class="flex items-center justify-center h-10 w-10 rounded-md bg-gray-100 text-gray-500 font-medium">5</button>
                    <button class="flex items-center justify-center h-10 w-10 rounded-md bg-gray-100 text-gray-500 font-medium">6</button>
                    <button class="flex items-center justify-center h-10 w-10 rounded-md bg-gray-100 text-gray-500 font-medium">7</button>
                    <button class="flex items-center justify-center h-10 w-10 rounded-md bg-gray-100 text-gray-500 font-medium">8</button>
                    <button class="flex items-center justify-center h-10 w-10 rounded-md bg-gray-100 text-gray-500 font-medium">9</button>
                    <button class="flex items-center justify-center h-10 w-10 rounded-md bg-gray-100 text-gray-500 font-medium">10</button>
                </div>
                <div class="mt-6 flex justify-center">
                    <button type="button" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none ">
                        Terminer le quiz
                    </button>
                </div>
            </div>
        </div>
    </section>

    <!-- Quiz Result (Hidden by default) -->
    <section class="py-12 ">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white rounded-lg shadow-md p-6">
                <div class="text-center mb-6">
                    <div class="inline-flex items-center justify-center h-24 w-24 rounded-full bg-green-100 text-green-600 mb-4">
                        <svg class="h-12 w-12" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <h2 class="text-2xl font-bold text-gray-900 mb-2">Félicitations!</h2>
                    <p class="text-gray-600 text-lg">Vous avez terminé le quiz JavaScript Avancé</p>
                </div>

                <div class="bg-gray-50 rounded-lg p-6 mb-6">
                    <div class="flex justify-between items-center mb-4">
                        <h3 class="text-lg font-medium text-gray-900">Votre score</h3>
                        <span class="text-2xl font-bold text-indigo-600">8/10</span>
                    </div>
                    <div class="w-full bg-gray-200 rounded-full h-2.5 mb-4">
                        <div class="bg-indigo-600 h-2.5 rounded-full" style="width: 80%"></div>
                    </div>
                    <div class="grid grid-cols-2 gap-4 text-sm text-gray-600">
                        <div class="flex items-center">
                            <svg class="w-5 h-5 text-green-500 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                            <span>Réponses correctes: 8</span>
                        </div>
                        <div class="flex items-center">
                            <svg class="w-5 h-5 text-red-500 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                            <span>Réponses incorrectes: 2</span>
                        </div>
                        <div class="flex items-center">
                            <svg class="w-5 h-5 text-indigo-500 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <span>Temps total: 12:45</span>
                        </div>
                        <div class="flex items-center">
                            <svg class="w-5 h-5 text-yellow-500 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z" />
                            </svg>
                            <span>Badge obtenu: Expert JavaScript</span>
                        </div>
                    </div>
                </div>

                <div class="mb-6">
                    <h3 class="text-lg font-medium text-gray-900 mb-4">Badge obtenu</h3>
                    <div class="flex items-center justify-center">
                        <div class="text-center">
                            <div class="inline-flex items-center justify-center h-32 w-32 rounded-full bg-yellow-100 mb-3">
                                <svg class="h-16 w-16 text-yellow-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z" />
                                </svg>
                            </div>
                            <h4 class="text-lg font-bold text-gray-900">Expert JavaScript</h4>
                            <p class="text-sm text-gray-600">Obtenu le 15 mars 2023</p>
                        </div>
                    </div>
                </div>

                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <button type="button" class="inline-flex items-center justify-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none ">
                        <svg class="mr-2 -ml-1 h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                        </svg>
                        Télécharger le certificat
                    </button>
                    <button type="button" class="inline-flex items-center justify-center px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none ">
                        <svg class="mr-2 -ml-1 h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                        </svg>
                        Recommencer le quiz
                    </button>
                </div>
            </div>
        </div>
    </section>

    <!-- Other Quizzes -->
    <section class="py-12 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-extrabold text-gray-900">Autres quiz populaires</h2>
                <p class="mt-4 text-lg text-gray-600">Continuez à tester vos connaissances avec nos autres quiz</p>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Quiz Card 1 -->
                <div class="bg-white rounded-lg shadow-md overflow-hidden flex flex-col h-full transition-transform duration-300 hover:shadow-xl hover:-translate-y-1">
                    <div class="relative">
                        <img src="https://images.unsplash.com/photo-1621839673705-6617adf9e890?ixlib=rb-1.2.1&auto=format&fit=crop&w=1400&q=80" alt="HTML et CSS" class="w-full h-48 object-cover">
                    </div>
                    <div class="p-6 flex-1 flex flex-col">
                        <h3 class="text-xl font-semibold text-gray-900 mb-3 line-clamp-2 h-14">Les bases de HTML et CSS</h3>
                        <p class="text-gray-600 mb-4 flex-grow line-clamp-3">Testez vos connaissances sur les fondamentaux du développement web.</p>

                        <div class="flex justify-between items-center mt-auto mb-4 pt-4 border-t border-gray-100">
                            <div class="flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <span class="text-sm font-medium text-gray-700">10 questions</span>
                            </div>
                            <div class="flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <span class="text-sm font-medium text-gray-700">15 min</span>
                            </div>
                        </div>

                        <a href="/quiz/html-css" class="block w-full bg-indigo-600 text-white text-center py-2.5 px-4 rounded-md hover:bg-indigo-700 transition-colors duration-300 font-medium">
                            Commencer le quiz
                        </a>
                    </div>
                </div>

                <!-- Quiz Card 2 -->
                <div class="bg-white rounded-lg shadow-md overflow-hidden flex flex-col h-full transition-transform duration-300 hover:shadow-xl hover:-translate-y-1">
                    <div class="relative">
                        <img src="https://images.unsplash.com/photo-1633356122544-f134324a6cee?ixlib=rb-1.2.1&auto=format&fit=crop&w=1400&q=80" alt="React.js" class="w-full h-48 object-cover">
                    </div>
                    <div class="p-6 flex-1 flex flex-col">
                        <h3 class="text-xl font-semibold text-gray-900 mb-3 line-clamp-2 h-14">React.js pour les développeurs</h3>
                        <p class="text-gray-600 mb-4 flex-grow line-clamp-3">Évaluez votre maîtrise de React et de son écosystème.</p>

                        <div class="flex justify-between items-center mt-auto mb-4 pt-4 border-t border-gray-100">
                            <div class="flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <span class="text-sm font-medium text-gray-700">15 questions</span>
                            </div>
                            <div class="flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <span class="text-sm font-medium text-gray-700">25 min</span>
                            </div>
                        </div>

                        <a href="/quiz/react" class="block w-full bg-indigo-600 text-white text-center py-2.5 px-4 rounded-md hover:bg-indigo-700 transition-colors duration-300 font-medium">
                            Commencer le quiz
                        </a>
                    </div>
                </div>

                <!-- Quiz Card 3 -->
                <div class="bg-white rounded-lg shadow-md overflow-hidden flex flex-col h-full transition-transform duration-300 hover:shadow-xl hover:-translate-y-1">
                    <div class="relative">
                        <img src="https://images.unsplash.com/photo-1580894732444-8ecded7900cd?ixlib=rb-1.2.1&auto=format&fit=crop&w=1400&q=80" alt="Algorithmes" class="w-full h-48 object-cover">
                    </div>
                    <div class="p-6 flex-1 flex flex-col">
                        <h3 class="text-xl font-semibold text-gray-900 mb-3 line-clamp-2 h-14">Algorithmes et structures de données</h3>
                        <p class="text-gray-600 mb-4 flex-grow line-clamp-3">Testez vos connaissances sur les algorithmes et les structures de données.</p>

                        <div class="flex justify-between items-center mt-auto mb-4 pt-4 border-t border-gray-100">
                            <div class="flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <span class="text-sm font-medium text-gray-700">20 questions</span>
                            </div>
                            <div class="flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <span class="text-sm font-medium text-gray-700">40 min</span>
                            </div>
                        </div>

                        <a href="/quiz/algorithms" class="block w-full bg-indigo-600 text-white text-center py-2.5 px-4 rounded-md hover:bg-indigo-700 transition-colors duration-300 font-medium">
                            Commencer le quiz
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
