@extends('layouts.admin')

@section('title', 'Category Management')
@section('meta_description', 'Manage categories on the UpCours platform')
@section('page-title', 'Categories')

@section('content')
    <!-- Page Header -->
    <div class="md:flex md:items-center md:justify-between mb-8">
        <div class="flex-1 min-w-0">
            <h2 class="text-2xl font-bold leading-7 text-gray-900 sm:text-3xl sm:truncate">Categories</h2>
        </div>
        <div class="mt-4 flex md:mt-0 md:ml-4">
            <button type="button" onclick="openAddCategoryModal()" class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-primary-600 hover:bg-primary-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-500">
                <i class="fas fa-folder-plus -ml-1 mr-2"></i> Add Category
            </button>
        </div>
    </div>

    <!-- Categories Section -->
    <div id="categories-section">
        <div class="flex flex-col">
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Description</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Number of Courses</th>
                                <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                            </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                            @foreach($categories as $category)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $category->name }}</td>
                                    <td class="px-6 py-4 text-sm text-gray-900">{{ $category->description }}</td>
                                    <td class="px-6 py-4 text-sm text-gray-500">{{ $category->courses->count() }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium flex justify-end gap-2">
                                        <button
                                            title="Edit"
                                            class="bg-blue-600 text-white px-3 py-2 rounded-md hover:bg-blue-700 transition"
                                            onclick="editCategory(this)"
                                            data-id="{{ $category->id }}"
                                            data-name="{{ $category->name }}"
                                            data-description="{{ $category->description }}"
                                        >
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <form method="POST" onsubmit="return confirm('Are you sure you want to delete this category?');" action="{{ route('admin.categories.delete', $category->id) }}">
                                            @method('delete')
                                            @csrf
                                            <button title="Delete" class="bg-red-600 text-white px-3 py-2 rounded-md hover:bg-red-700 transition">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
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
            <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>
            <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                <div class="absolute top-0 right-0 pt-4 pr-4">
                    <button type="button" onclick="closeCategoryModal()" class="bg-white rounded-md text-gray-400 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-500">
                        <i class="fas fa-times text-lg"></i>
                    </button>
                </div>

                <form id="category-form" method="POST" action="{{ route('admin.categories.create') }}">
                    @csrf
                    <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                        <div class="sm:flex sm:items-start">
                            <div class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-primary-100 sm:mx-0 sm:h-10 sm:w-10">
                                <i class="fas fa-folder-plus text-primary-600"></i>
                            </div>
                            <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left w-full">
                                <h3 id="category-modal-title" class="text-lg leading-6 font-medium text-gray-900">Add Category</h3>
                                <div class="mt-6 space-y-6">
                                    <input type="hidden" id="category-id" name="id" value="">
                                    <div>
                                        <label for="category-name" class="block text-sm font-medium text-gray-700 mb-1">Name</label>
                                        <input type="text" name="name" id="category-name" class="px-4 py-3 block w-full shadow-sm text-sm border border-gray-300 rounded-md" placeholder="Enter category name">
                                    </div>
                                    <div>
                                        <label for="category-description" class="block text-sm font-medium text-gray-700 mb-1">Description</label>
                                        <textarea name="description" id="category-description" rows="3" class="px-4 py-3 block w-full shadow-sm text-sm border border-gray-300 rounded-md" placeholder="Enter category description"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="bg-gray-50 px-4 py-4 sm:px-6 sm:flex sm:flex-row-reverse">
                        <button type="submit" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-3 bg-primary-600 text-base font-medium text-white hover:bg-primary-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-500 sm:ml-3 sm:w-auto sm:text-sm">
                            Save Category
                        </button>
                        <button type="button" onclick="closeCategoryModal()" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-3 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                            Cancel
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        function openAddCategoryModal() {
            document.getElementById('category-modal-title').textContent = 'Add Category';
            document.getElementById('category-id').value = '';
            document.getElementById('category-name').value = '';
            document.getElementById('category-description').value = '';
            document.getElementById('category-modal').classList.remove('hidden');
        }

        function editCategory(button) {
            const id = button.getAttribute('data-id');
            const name = button.getAttribute('data-name');
            const description = button.getAttribute('data-description');

            // Update modal fields
            document.getElementById('category-modal-title').textContent = 'Update Category';
            document.getElementById('category-id').value = id;
            document.getElementById('category-name').value = name;
            document.getElementById('category-description').value = description;

            // Update form action and method
            const form = document.getElementById('category-form');
            form.action = `/admin/category/${id}`;

            // If you're using Blade's @method('PUT'), just inject it manually:
            let methodInput = document.querySelector('#category-form input[name="_method"]');
            if (!methodInput) {
                methodInput = document.createElement('input');
                methodInput.type = 'hidden';
                methodInput.name = '_method';
                form.appendChild(methodInput);
            }
            methodInput.value = 'PUT';

            // Show the modal
            document.getElementById('category-modal').classList.remove('hidden');
        }


        function closeCategoryModal() {
            document.getElementById('category-modal').classList.add('hidden');
        }
    </script>
@endsection
