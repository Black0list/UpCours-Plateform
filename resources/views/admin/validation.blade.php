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
@endsection
