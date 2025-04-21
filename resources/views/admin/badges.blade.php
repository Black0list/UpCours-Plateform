@extends('layouts.admin')

@section('title', 'Badge Management')
@section('meta_description', 'Manage badges on the UpCours platform')
@section('page-title', 'Badges')

@section('content')
    <div class="md:flex md:items-center md:justify-between mb-8">
        <div class="flex-1 min-w-0">
            <h2 class="text-2xl font-bold leading-7 text-gray-900 sm:text-3xl sm:truncate">Badges</h2>
        </div>
        <div class="mt-4 flex md:mt-0 md:ml-4">
            <button type="button" onclick="openAddBadgeModal()" class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-primary-600 hover:bg-primary-700">
                <i class="fas fa-plus -ml-1 mr-2"></i> Add Badge
            </button>
        </div>
    </div>

    <!-- Badge List -->
    <div id="badges-section">
        <div class="flex flex-col">
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Icon</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                                <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                            </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                            @foreach($badges as $badge)
                                <tr>
                                    <td class="px-6 py-4 text-sm text-gray-500">
                                        <img src={{ url('/storage/'.$badge->icon) }} alt="icon" class="w-8 h-8">
                                    </td>
                                    <td class="px-6 py-4 text-sm font-medium text-gray-900">{{ $badge->badge_name }}</td>
                                    <td class="px-6 py-4 text-right flex justify-end gap-2">
                                        <button title="Edit" onclick="editBadge(this)"
                                                data-id="{{ $badge->id }}"
                                                data-name="{{ $badge->badge_name }}"
                                                data-icon="{{ url("/storage/".$badge->icon) }}"
                                                class="bg-blue-600 text-white px-3 py-2 rounded-md hover:bg-blue-700 transition">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <form method="POST" onsubmit="return confirm('Are you sure?')" action="{{ route('admin.badges.delete', $badge->id) }}">
                                            @csrf @method('DELETE')
                                            <button class="bg-red-600 text-white px-3 py-2 rounded-md hover:bg-red-700 transition">
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

    <!-- Add/Edit Badge Modal -->
    <div id="badge-modal" class="fixed z-10 inset-0 overflow-y-auto hidden">
        <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
            <div class="fixed inset-0 bg-gray-500 bg-opacity-75"></div>

            <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:max-w-lg sm:w-full">
                <div class="absolute top-0 right-0 pt-4 pr-4">
                    <button type="button" onclick="closeBadgeModal()" class="text-gray-400 hover:text-gray-500">
                        <i class="fas fa-times text-lg"></i>
                    </button>
                </div>

                <form id="badge-form" method="POST" enctype="multipart/form-data" action="{{ route('admin.badges.create') }}">
                    @csrf
                    <div class="px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                        <div class="text-left w-full">
                            <h3 id="badge-modal-title" class="text-lg font-medium text-gray-900">Add Badge</h3>
                            <input type="hidden" name="id" id="badge-id">
                            <div class="mt-6 space-y-4">
                                <div>
                                    <label for="badge-name" class="block text-sm font-medium text-gray-700 mb-1">Name</label>
                                    <input type="text" name="badge_name" id="badge-name" class="w-full border border-gray-300 rounded-md px-4 py-2">
                                </div>
                                <div>
                                    <label for="badge-icon" class="block text-sm font-medium text-gray-700 mb-1">Icon Image</label>
                                    <input type="file" name="icon" id="badge-icon" class="w-full border border-gray-300 rounded-md px-4 py-2">
                                    <div id="preview-icon" class="mt-2 hidden">
                                        <p class="text-xs text-gray-500 mb-1">Current Icon:</p>
                                        <img id="preview-img" src="" alt="icon preview" class="w-10 h-10 rounded">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="bg-gray-50 px-4 py-4 sm:flex sm:flex-row-reverse">
                        <button type="submit" class="w-full sm:w-auto inline-flex justify-center rounded-md border border-transparent px-4 py-2 bg-primary-600 text-white font-medium hover:bg-primary-700">
                            Save Badge
                        </button>
                        <button type="button" onclick="closeBadgeModal()" class="mt-3 sm:mt-0 sm:ml-3 w-full sm:w-auto inline-flex justify-center rounded-md border border-gray-300 px-4 py-2 bg-white text-gray-700 hover:bg-gray-50">
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
        function openAddBadgeModal() {
            document.getElementById('badge-modal-title').textContent = 'Add Badge';
            document.getElementById('badge-id').value = '';
            document.getElementById('badge-name').value = '';
            document.getElementById('badge-icon').value = '';
            document.getElementById('badge-form').action = '{{ route("admin.badges.create") }}';
            removePutMethod();

            document.getElementById('preview-icon').classList.add('hidden');
            document.getElementById('preview-img').src = '';

            document.getElementById('badge-modal').classList.remove('hidden');
        }

        function editBadge(button) {
            const id = button.getAttribute('data-id');
            const name = button.getAttribute('data-name');
            const icon = button.getAttribute('data-icon');

            document.getElementById('badge-modal-title').textContent = 'Update Badge';
            document.getElementById('badge-id').value = id;
            document.getElementById('badge-name').value = name;
            document.getElementById('badge-form').action = `/admin/badge/${id}`;
            addPutMethod();

            if (icon) {
                document.getElementById('preview-img').src = icon;
                document.getElementById('preview-icon').classList.remove('hidden');
            } else {
                document.getElementById('preview-icon').classList.add('hidden');
            }

            document.getElementById('badge-modal').classList.remove('hidden');
        }

        function closeBadgeModal() {
            document.getElementById('badge-modal').classList.add('hidden');
        }

        function addPutMethod() {
            let input = document.querySelector('#badge-form input[name="_method"]');
            if (!input) {
                input = document.createElement('input');
                input.type = 'hidden';
                input.name = '_method';
                document.getElementById('badge-form').appendChild(input);
            }
            input.value = 'PUT';
        }

        function removePutMethod() {
            let input = document.querySelector('#badge-form input[name="_method"]');
            if (input) input.remove();
        }
    </script>
@endsection
