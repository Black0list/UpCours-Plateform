@extends('layouts.admin')

@section('title', 'Teacher Validation')
@section('page-title', 'Teacher Validation')

@section('content')
    <div class="bg-white shadow overflow-hidden sm:rounded-md">
        <div class="px-4 py-5 border-b border-gray-200 sm:px-6">
            <h3 class="text-lg leading-6 font-medium text-gray-900">
                Pending Teacher Applications
            </h3>
            <p class="mt-1 max-w-2xl text-sm text-gray-500">
                Review and approve teacher applications.
            </p>
        </div>

        <div class="bg-white">
            <div class="border-t border-gray-200">
                @if(count($pendingTeachers ?? []) > 0)
                    <ul role="list" class="divide-y divide-gray-200">
                        @foreach($pendingTeachers ?? [] as $teacher)
                            <li>
                                <div class="px-4 py-4 sm:px-6">
                                    <div class="flex items-center justify-between">
                                        <div class="flex items-center">
                                            <div class="flex-shrink-0 h-12 w-12">
                                                <img class="h-12 w-12 rounded-full" src="{{ url('/storage/'.$teacher->photo) }}" alt="Teacher photo">
                                            </div>
                                            <div class="ml-4">
                                                <div class="text-sm font-medium text-primary-600">
                                                    {{ $teacher->full_name ?? 'UNKNOWN' }}
                                                </div>
                                                <div class="text-sm text-gray-500">
                                                    {{ $teacher->email ?? 'teacher@example.com' }}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="flex space-x-2">
                                            <form action="{{ route('admin.teacher.validate') }}" method="POST">
                                                @csrf
                                                @method('PUT')
                                                <input type="hidden" name="teacher_id" value="{{ $teacher->id }}">
                                                <button type="submit"  class="inline-flex items-center px-3 py-1.5 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-primary-600 hover:bg-primary-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-500">
                                                    <i class="fas fa-check mr-1.5"></i> Approve
                                                </button>
                                            </form>
                                            <form action="{{ route('admin.teacher.reject') }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <input type="hidden" name="teacher_id" value="{{ $teacher->id }}">
                                                <button type="submit" class="inline-flex items-center px-3 py-1.5 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                                                    <i class="fas fa-times mr-1.5"></i> Reject
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="mt-2 sm:flex sm:justify-end">
                                        <div class="mt-2 flex items-center text-sm text-gray-500 sm:mt-0">
                                            <i class="fas fa-calendar flex-shrink-0 mr-1.5 text-gray-400"></i>
                                            <p>Applied on <time datetime="{{ $teacher->created_at ?? now() }}">{{ $teacher->created_at ? $teacher->created_at->format('M d, Y') : now()->format('M d, Y') }}</time></p>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                @else
                    <div class="text-center py-12">
                        <i class="fas fa-check-circle text-primary-500 text-5xl"></i>
                        <h3 class="mt-2 text-sm font-medium text-gray-900">No pending applications</h3>
                        <p class="mt-1 text-sm text-gray-500">There are no teacher applications waiting for review.</p>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <!-- Recently Approved Teachers -->
    <div class="mt-6 bg-white shadow overflow-hidden sm:rounded-md">
        <div class="px-4 py-5 border-b border-gray-200 sm:px-6">
            <h3 class="text-lg leading-6 font-medium text-gray-900">
                Recently Approved Teachers
            </h3>
            <p class="mt-1 max-w-2xl text-sm text-gray-500">
                Teachers approved in the last 30 days.
            </p>
        </div>

        <div class="bg-white">
            <div class="border-t border-gray-200">
                @if(count($approvedTeachers ?? []) > 0)
                    <ul role="list" class="divide-y divide-gray-200">
                        @foreach($approvedTeachers ?? [] as $teacher)
                            <li>
                                <div class="px-4 py-4 sm:px-6">
                                    <div class="flex items-center justify-between">
                                        <div class="flex items-center">
                                            <div class="flex-shrink-0 h-12 w-12">
                                                <img class="h-12 w-12 rounded-full" src="{{ $teacher->photo ?? '/placeholder.svg?height=48&width=48' }}" alt="Teacher photo">
                                            </div>
                                            <div class="ml-4">
                                                <div class="text-sm font-medium text-primary-600">
                                                    {{ $teacher->name ?? 'Approved Teacher' }}
                                                </div>
                                                <div class="text-sm text-gray-500">
                                                    {{ $teacher->email ?? 'teacher@example.com' }}
                                                </div>
                                            </div>
                                        </div>
                                        <div>
                                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                                <i class="fas fa-check-circle mr-1"></i> Approved
                                            </span>
                                        </div>
                                    </div>
                                    <div class="mt-2 sm:flex sm:justify-between">
                                        <div class="sm:flex">
                                            <div class="flex items-center text-sm text-gray-500">
                                                <i class="fas fa-graduation-cap flex-shrink-0 mr-1.5 text-gray-400"></i>
                                                <p>{{ $teacher->specialization ?? 'Web Development' }}</p>
                                            </div>
                                        </div>
                                        <div class="mt-2 flex items-center text-sm text-gray-500 sm:mt-0">
                                            <i class="fas fa-calendar flex-shrink-0 mr-1.5 text-gray-400"></i>
                                            <p>Approved on <time datetime="{{ $teacher->approved_at ?? now() }}">{{ $teacher->approved_at ? $teacher->approved_at->format('M d, Y') : now()->format('M d, Y') }}</time></p>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                @else
                    <div class="text-center py-12">
                        <i class="fas fa-user-check text-gray-400 text-5xl"></i>
                        <h3 class="mt-2 text-sm font-medium text-gray-900">No recently approved teachers</h3>
                        <p class="mt-1 text-sm text-gray-500">No teachers have been approved in the last 30 days.</p>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        function findPendingTeachers() {
                fetch(`/admin/validation`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    }
                })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            showSuccessNotification('Teacher Approved', 'The teacher has been approved successfully.');
                            // Reload the page after a short delay
                            setTimeout(() => {
                                window.location.reload();
                            }, 1500);
                        } else {
                            showErrorNotification('Error', data.message || 'An error occurred while approving the teacher.');
                        }
                    })
                    .catch(error => {
                        showErrorNotification('Error', 'An error occurred while approving the teacher.');
                        console.error('Error:', error);
                    });
        }

        function rejectTeacher(teacherId) {
            if (confirm('Are you sure you want to reject this teacher application?')) {
                fetch(`/admin/teachers/${teacherId}/reject`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    },
                    body: JSON.stringify({ teacher_id: teacherId })
                })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            showSuccessNotification('Teacher Rejected', 'The teacher application has been rejected.');
                            setTimeout(() => {
                                window.location.reload();
                            }, 1500);
                        } else {
                            showErrorNotification('Error', data.message || 'An error occurred while rejecting the teacher.');
                        }
                    })
                    .catch(error => {
                        showErrorNotification('Error', 'An error occurred while rejecting the teacher.');
                        console.error('Error:', error);
                    });
            }
        }
    </script>
@endsection
