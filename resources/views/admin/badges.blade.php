@extends('layouts.admin')

@section('title', 'Gestion des Badges')
@section('meta_description', 'Gérez les badges et récompenses de la plateforme UpCours')

@section('content')
    <!-- Page Header -->
    <div class="md:flex md:items-center md:justify-between mb-8">
        <div class="flex-1 min-w-0">
            <h2 class="text-2xl font-bold leading-7 text-gray-900 sm:text-3xl sm:truncate">
                Gestion des Badges
            </h2>
        </div>
        <div class="mt-4 flex md:mt-0 md:ml-4">
            <button type="button" onclick="document.getElementById('badge-modal').classList.remove('hidden')" class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                <i class="fas fa-plus -ml-1 mr-2"></i>
                Ajouter un badge
            </button>
        </div>
    </div>

    <!-- Badges Grid -->
    <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 mb-8">
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
                        <button onclick="editBadge(1)" class="text-indigo-600 hover:text-indigo-900">
                            <i class="fas fa-edit"></i>
                        </button>
                        <button onclick="confirmDeleteBadge(1)" class="text-red-600 hover:text-red-900">
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
                        <button onclick="editBadge(2)" class="text-indigo-600 hover:text-indigo-900">
                            <i class="fas fa-edit"></i>
                        </button>
                        <button onclick="confirmDeleteBadge(2)" class="text-red-600 hover:text-red-900">
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
                        <button onclick="editBadge(3)" class="text-indigo-600 hover:text-indigo-900">
                            <i class="fas fa-edit"></i>
                        </button>
                        <button onclick="confirmDeleteBadge(3)" class="text-red-600 hover:text-red-900">
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
                        <button onclick="editBadge(4)" class="text-indigo-600 hover:text-indigo-900">
                            <i class="fas fa-edit"></i>
                        </button>
                        <button onclick="confirmDeleteBadge(4)" class="text-red-600 hover:text-red-900">
                            <i class="fas fa-trash"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Recent Badge Attributions -->
    <div class="bg-white shadow overflow-hidden sm:rounded-lg mb-8">
        <div class="px-4 py-5 sm:px-6 flex justify-between items-center">
            <div>
                <h3 class="text-lg leading-6 font-medium text-gray-900">
                    Attributions récentes
                </h3>
                <p class="mt-1 max-w-2xl text-sm text-gray-500">
                    Dernières attributions de badges aux utilisateurs
                </p>
            </div>
        </div>
        <div class="border-t border-gray-200">
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

    <!-- Add/Edit Badge Modal -->
    <div id="badge-modal" class="fixed z-10 inset-0 overflow-y-auto hidden" aria-labelledby="modal-title" role="dialog" aria-modal="true">
        <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
            <!-- Background overlay -->
            <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>

            <!-- Modal panel -->
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
                        <button type="button" onclick="document.getElementById('badge-modal').classList.add('hidden')" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
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
                                Supprimer le badge
                            </h3>
                            <div class="mt-2">
                                <p class="text-sm text-gray-500" id="delete-modal-message">
                                    Êtes-vous sûr de vouloir supprimer ce badge ? Cette action est irréversible et le badge sera retiré de tous les utilisateurs qui l'ont obtenu.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                    <button type="button" id="confirm-delete-button" onclick="deleteBadge()" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-red-600 text-base font-medium text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:ml-3 sm:w-auto sm:text-sm">
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
        // Store the ID of the badge to delete
        let badgeToDeleteId = null;

        // Function to edit a badge
        function editBadge(badgeId) {
            // In a real application, you would fetch badge data from the server
            // For this example, we'll use dummy data
            let badgeData = {
                id: badgeId,
                name: badgeId === '1' ? 'Premier Cours Terminé' :
                    (badgeId === '2' ? 'Expert en Développement' :
                        (badgeId === '3' ? 'Quiz Master' : 'Contributeur Actif')),
                description: badgeId === '1' ? 'Terminer son premier cours' :
                    (badgeId === '2' ? 'Terminer 5 cours de développement' :
                        (badgeId === '3' ? 'Obtenir 100% à 10 quiz' : 'Poster 20 commentaires utiles')),
                icon: badgeId === '1' ? 'award' :
                    (badgeId === '2' ? 'star' :
                        (badgeId === '3' ? 'trophy' : 'medal')),
                color: badgeId === '1' ? 'blue' :
                    (badgeId === '2' ? 'green' :
                        (badgeId === '3' ? 'yellow' : 'purple')),
                condition: badgeId === '1' ? 'Terminer au moins un cours' :
                    (badgeId === '2' ? 'Terminer 5 cours dans la catégorie Développement' :
                        (badgeId === '3' ? 'Obtenir un score parfait dans 10 quiz différents' : 'Avoir 20 commentaires marqués comme utiles par d\'autres utilisateurs'))
            };

            // Fill form with badge data
            document.getElementById('badge-id').value = badgeData.id;
            document.getElementById('badge-name').value = badgeData.name;
            document.getElementById('badge-description').value = badgeData.description;
            document.getElementById('badge-icon').value = badgeData.icon;
            document.getElementById('badge-color').value = badgeData.color;
            document.getElementById('badge-condition').value = badgeData.condition;

            // Update modal title
            document.getElementById('badge-modal-title').textContent = 'Modifier le badge';

            // Show modal
            document.getElementById('badge-modal').classList.remove('hidden');
        }

        // Function to confirm badge deletion
        function confirmDeleteBadge(badgeId) {
            badgeToDeleteId = badgeId;
            document.getElementById('delete-modal').classList.remove('hidden');
        }

        // Function to delete a badge
        function deleteBadge() {
            // In a real application, you would send a delete request to the server
            console.log('Deleting badge with ID:', badgeToDeleteId);

            // Close modal
            document.getElementById('delete-modal').classList.add('hidden');

            // Show success notification (you would implement this)
            alert('Badge supprimé avec succès.');

            // Reset the ID
            badgeToDeleteId = null;
        }

        // Handle badge form submission
        document.getElementById('badge-form').addEventListener('submit', function(e) {
            e.preventDefault();

            // In a real application, you would send form data to the server
            const isNewBadge = !document.getElementById('badge-id').value;
            const message = isNewBadge ? 'Badge ajouté avec succès.' : 'Badge mis à jour avec succès.';

            // Close modal
            document.getElementById('badge-modal').classList.add('hidden');

            // Show success notification (you would implement this)
            alert(message);
        });
    </script>
@endsection
