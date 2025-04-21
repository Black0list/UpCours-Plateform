@extends('layouts.admin')

@section('title', 'Role Management')
@section('meta_description', 'Manage roles on the UpCours platform')
@section('page-title', 'Roles')

@section('content')
    <div class="md:flex md:items-center md:justify-between mb-8">
        <div class="flex-1 min-w-0">
            <h2 class="text-2xl font-bold leading-7 text-gray-900 sm:text-3xl sm:truncate">Roles</h2>
        </div>
        <div class="mt-4 flex md:mt-0 md:ml-4">
            <button type="button" onclick="openAddRoleModal()" class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-primary-600 hover:bg-primary-700">
                <i class="fas fa-plus -ml-1 mr-2"></i> Add Role
            </button>
        </div>
    </div>

    <!-- Role List -->
    <div class="flex flex-col">
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Users</th>
                            <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                        </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                        @foreach($roles as $role)
                            <tr>
                                <td class="px-6 py-4 text-sm font-medium text-gray-900">{{ $role->role_name }}</td>
                                <td class="px-6 py-4 text-sm text-gray-500">{{ $role->users->count() }}</td>
                                <td class="px-6 py-4 text-right flex justify-end gap-2">
                                    <button title="Edit" onclick="editRole(this)"
                                            data-id="{{ $role->id }}"
                                            data-name="{{ $role->role_name }}"
                                            class="bg-blue-600 text-white px-3 py-2 rounded-md hover:bg-blue-700 transition">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <form method="POST" onsubmit="return confirm('Are you sure?')" action="{{ route('admin.roles.delete', $role->id) }}">
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

    <!-- Add/Edit Role Modal -->
    <div id="role-modal" class="fixed z-10 inset-0 overflow-y-auto hidden">
        <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
            <div class="fixed inset-0 bg-gray-500 bg-opacity-75"></div>

            <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:max-w-lg sm:w-full">
                <div class="absolute top-0 right-0 pt-4 pr-4">
                    <button type="button" onclick="closeRoleModal()" class="text-gray-400 hover:text-gray-500">
                        <i class="fas fa-times text-lg"></i>
                    </button>
                </div>

                <form id="role-form" method="POST" action="{{ route('admin.roles.create') }}">
                    @csrf
                    <input type="hidden" name="id" id="role-id">
                    <div class="px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                        <div class="text-left w-full">
                            <h3 id="role-modal-title" class="text-lg font-medium text-gray-900">Add Role</h3>
                            <div class="mt-6 space-y-4">
                                <div>
                                    <label for="role-name" class="block text-sm font-medium text-gray-700 mb-1">Name</label>
                                    <input type="text" name="role_name" id="role-name" class="w-full border border-gray-300 rounded-md px-4 py-2">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="bg-gray-50 px-4 py-4 sm:flex sm:flex-row-reverse">
                        <button type="submit" class="w-full sm:w-auto inline-flex justify-center rounded-md border border-transparent px-4 py-2 bg-primary-600 text-white font-medium hover:bg-primary-700">
                            Save Role
                        </button>
                        <button type="button" onclick="closeRoleModal()" class="mt-3 sm:mt-0 sm:ml-3 w-full sm:w-auto inline-flex justify-center rounded-md border border-gray-300 px-4 py-2 bg-white text-gray-700 hover:bg-gray-50">
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
        function openAddRoleModal() {
            document.getElementById('role-modal-title').textContent = 'Add Role';
            document.getElementById('role-id').value = '';
            document.getElementById('role-name').value = '';
            document.getElementById('role-form').action = '{{ route("admin.roles.create") }}';
            removePutMethod();
            document.getElementById('role-modal').classList.remove('hidden');
        }

        function editRole(button) {
            const id = button.getAttribute('data-id');
            const name = button.getAttribute('data-name');

            document.getElementById('role-modal-title').textContent = 'Update Role';
            document.getElementById('role-id').value = id;
            document.getElementById('role-name').value = name;
            document.getElementById('role-form').action = `/admin/role/${id}`;
            addPutMethod();

            document.getElementById('role-modal').classList.remove('hidden');
        }

        function closeRoleModal() {
            document.getElementById('role-modal').classList.add('hidden');
        }

        function addPutMethod() {
            let input = document.querySelector('#role-form input[name="_method"]');
            if (!input) {
                input = document.createElement('input');
                input.type = 'hidden';
                input.name = '_method';
                document.getElementById('role-form').appendChild(input);
            }
            input.value = 'PUT';
        }

        function removePutMethod() {
            let input = document.querySelector('#role-form input[name="_method"]');
            if (input) input.remove();
        }
    </script>
@endsection
