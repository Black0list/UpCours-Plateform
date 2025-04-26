@extends('layouts.app')

@section('title', "$course->title")
@section('meta_description', 'Learn to create complete web applications with modern technologies. This course covers HTML, CSS, JavaScript, PHP and MySQL.')

@section('content')
    <!-- Course Header -->
    <section class="bg-gradient-to-r from-indigo-600 to-purple-600 text-white py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row md:items-center md:justify-between">
                <div class="mb-6 md:mb-0 md:mr-8 md:max-w-2xl">
                    <div class="flex items-center mb-2">
                        <span class="text-xs font-semibold px-2 py-1 bg-white/20 text-white rounded-full">{{ $course->category->name }}</span>
                    </div>
                    <h1 class="text-3xl font-extrabold sm:text-4xl mb-4">{{ $course->title }}</h1>
                    <div class="flex items-center mb-4">
                        <img class="h-10 w-10 rounded-full mr-3" src={{ url('/storage/'.$course->teacher->photo) }} alt="UserProfile">
                        <div>
                            <p class="text-sm font-medium">{{ $course->teacher->full_name }}</p>
                        </div>
                    </div>
                    <div class="flex flex-wrap gap-4 text-sm">
                        <div class="flex items-center">
                            <svg class="w-5 h-5 mr-1" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M9 19l3 3m0 0l3-3m-3 3V10" />
                            </svg>
                            <span>Lifetime access</span>
                        </div>
                        <div class="flex items-center">
                            <svg class="w-5 h-5 mr-1" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <span>Certificate of completion</span>
                        </div>
                    </div>
                </div>
                <div class="bg-white rounded-lg shadow-lg p-6 w-full md:w-80 text-gray-900">
                    <div class="relative aspect-video mb-4 rounded-md overflow-hidden">
                        <img  alt="Web Development" class="w-full h-full object-cover" src={{ url('/storage/'.$course->image) }} >
                    </div>
                    <div class="mb-4">
                        <span class="text-3xl font-bold">${{ $course->price }}</span>
                        <span class="text-red-500 line-through ml-2">${{ $course->price + 200 }}</span>
                    </div>
                    <div class="flex flex-col gap-3 mb-4">
                        @if(!$course->subscribers->contains(Auth::user()))
                            <button onclick="enroll({{Auth::user()->id}},{{$course->id}}, this)" class="w-full bg-indigo-600 text-white py-3 px-4 rounded-md bg-indigo-600 hover:bg-indigo-700 font-medium" id="enroll_button">
                                Enroll in Course
                            </button>
                        @else
                            <button onclick="enroll({{Auth::user()->id}},{{$course->id}}, this)" class="w-full bg-indigo-600 text-white py-3 px-4 rounded-md hover:bg-red-700 bg-red-600 font-medium" id="enroll_button">
                                Unsubscribe
                            </button>
                        @endif
                            <a href="/quiz/{{$course->quizzes[0]->id}}" id="quiz" class="w-full bg-white text-center text-indigo-600 border border-indigo-600 py-3 px-4 rounded-md hover:bg-indigo-50  font-medium">
                                Take Quiz
                            </a>
                    </div>
                    <div class="text-sm text-gray-600">
                        <p class="mb-2">This course includes:</p>
                            <li class="flex items-center">
                                <svg class="w-5 h-5 mr-2 text-indigo-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                                <span>Lifetime access</span>
                            </li>
                            <li class="flex items-center">
                                <svg class="w-5 h-5 mr-2 text-indigo-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                                </svg>
                                <span>Certificate of completion</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Course Content -->
    <section class="py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <!-- Main Content -->
                <div class="lg:col-span-2">
                    <!-- Course Description -->
                    <div class="bg-white rounded-lg shadow-sm p-6 mb-8">
                        <h2 class="text-2xl font-bold text-gray-900 mb-4">Course Description</h2>
                        <div class="prose max-w-none text-gray-600">
                            {{ $course->description }}
                        </div>
                    </div>

                    <!-- Course Content -->
                    <div class="bg-white rounded-2xl p-2 shadow-lg mb-10">
                        <h2 class="text-3xl font-semibold text-gray-800 mb-6 border-b pb-3">📚 Course Content</h2>

                        <div class="">
                            @php
                                $extension = strtolower(pathinfo($course->content, PATHINFO_EXTENSION));
                            @endphp

                            @if (in_array($extension, ['mp4', 'mov', 'avi', 'webm']))
                                <video
                                    class="plyr w-full max-w-4xl rounded-xl shadow-md"
                                    id="course-video"
                                    playsinline
                                    controls
                                >
                                    <source src="{{ url('/storage/' . $course->content) }}" type="video/mp4" />
                                    Your browser does not support HTML5 video.
                                </video>

                            @elseif ($extension === 'pdf')
                                <iframe
                                    src="{{ url('/storage/' . $course->content) }}"
                                    class="w-full h-[600px] rounded-xl border shadow-md"
                                    frameborder="0"
                                ></iframe>
                            @else
                                <p class="text-red-500 font-semibold">❌ Unsupported file type.</p>
                            @endif
                        </div>
                    </div>


                </div>

                <!-- Sidebar -->
                <div class="lg:col-span-1">
                    <!-- Instructor -->
                    <div class="bg-white rounded-lg shadow-sm p-6">
                        <h3 class="text-lg font-bold text-gray-900 mb-4">Your Instructor</h3>
                        <div class="flex items-start">
                            <img class="h-16 w-16 rounded-full mr-4" src={{ url("/storage/".$course->teacher->photo) }} alt="ThomasDubois">
                            <div>
                                <h4 class="text-lg font-medium text-gray-900">{{ $course->teacher->full_name }}</h4>
                                <button class="text-indigo-600 font-medium hover:text-indigo-500">View full profile</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        function animate(button) {
            const currentText = button.textContent.trim();

            // Disable the button to prevent multiple clicks
            button.disabled = true;

            if (currentText === "Unsubscribe") {
                button.textContent = 'Unsubscribing...';
                button.classList.remove('bg-red-600', 'hover:bg-red-700');
                button.classList.add('bg-gray-600');

                setTimeout(() => {
                    button.textContent = "Enroll in Course";
                    button.classList.remove('bg-gray-600');
                    button.classList.add('bg-indigo-600', 'hover:bg-indigo-700');
                    showNotification("Successfully Unsubscribed from the Course");

                    // Re-enable the button after the process is complete
                    button.disabled = false;
                }, 1500);
            } else {
                button.textContent = 'Enrolling...';
                button.classList.remove('bg-indigo-600', 'hover:bg-indigo-700');
                button.classList.add('bg-green-600');

                setTimeout(() => {
                    button.textContent = "Unsubscribe";
                    button.classList.remove('bg-green-600');
                    button.classList.add('bg-red-600', 'hover:bg-red-700');
                    showNotification("Successfully Subscribed to the Course");

                    // Re-enable the button after the process is complete
                    button.disabled = false;
                }, 1500);
            }
        }


        // Notification system
        function showNotification(message) {
            const notification = document.createElement('div');
            notification.className = 'notification';
            notification.textContent = message;

            // Add notification styles dynamically
            const style = document.createElement('style');
            style.textContent = `
            .notification {
                position: fixed;
                top: 20px;
                right: 20px;
                background: 	#BEBEBE;
                color: white;
                padding: 1rem 2rem;
                border-radius: 0.75rem;
                box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
                z-index: 1000;
                animation: slideIn 0.4s ease-out forwards;
            }

            @keyframes slideIn {
                from {
                    transform: translateX(100%);
                    opacity: 0;
                }
                to {
                    transform: translateX(0);
                    opacity: 1;
                }
            }
        `;
            document.head.appendChild(style);

            document.body.appendChild(notification);

            // Remove notification after 3 seconds
            setTimeout(() => {
                notification.style.animation = 'slideOut 0.3s ease-in forwards';
                setTimeout(() => notification.remove(), 300);
            }, 3000);
        }

        document.addEventListener('DOMContentLoaded', () => {
            const player = new Plyr('#course-video', {
                controls: [
                    'play',
                    'progress',
                    'current-time',
                    'mute',
                    'volume',
                    'captions',
                    'settings',
                    'fullscreen'
                ],
                settings: ['speed', 'quality'],
            });
        });

        function enroll(studentId, courseId, button) {
            console.log(courseId, studentId);

            fetch(`/enroll`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify({ studentId: studentId, courseId: courseId })
            })
                .then(async response => {
                    const data = await response.json();
                    if (response.status === 200) {
                        animate(button)
                    } else {
                        showNotification(data.message + 'dwada' || "An error occurred while enrolling course.");
                    }

                    console.log('Status:', response.status);
                    console.log('Data:', data);
                })
                .catch(error => {
                    showNotification("An error occurred while enrolling course.");
                    console.error('Error:', error);
                });
        }

    </script>
@endsection
