@extends('layouts.app')

@section('title', 'Quiz - Test your knowledge')
@section('meta_description', 'Test your knowledge with our interactive quizzes. Earn badges and certificates based on your results.')

@section('content')
    <!-- Quiz Header -->
    <section class="bg-gradient-to-r from-indigo-600 to-purple-600 text-white py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <h1 class="text-3xl font-extrabold sm:text-4xl">{{ $quiz->course->title }} <span class="text-blue-200">Quiz</span>
                </h1>
            </div>
        </div>
    </section>

    <!-- Quiz Content -->
    <section class="py-12" id="quiz_section">
    </section>

    <!-- Quiz Result (Hidden by default) -->
    <section class="py-12 hidden" id="result_section">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white rounded-lg shadow-md p-6">
                <div class="text-center mb-6">
                    <div
                        class="inline-flex items-center justify-center h-24 w-24 rounded-full bg-green-100 text-green-600 mb-4">
                        <svg class="h-12 w-12" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                             stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                    <h2 class="text-2xl font-bold text-gray-900 mb-2">Congratulations!</h2>
                    <p class="text-gray-600 text-lg">You have completed <strong>{{ $quiz->course->title }}</strong> Quiz
                    </p>
                </div>

                <div class="bg-gray-50 rounded-lg p-6 mb-6">
                    <div class="flex justify-between items-center mb-4">
                        <h3 class="text-lg font-medium text-gray-900">Your Score</h3>
                        <span id="Score" class="text-2xl font-bold text-indigo-600"></span>
                    </div>
                    <div class="w-full bg-gray-200 rounded-full h-2.5 mb-4">
                        <div id="ScoreBar" class="bg-indigo-600 h-2.5 rounded-full" style="width: 80%"></div>
                    </div>
                    <div class="grid grid-cols-2 gap-4 text-sm text-gray-600">
                        <div class="flex items-center">
                            <svg class="w-5 h-5 text-green-500 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none"
                                 viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M5 13l4 4L19 7"/>
                            </svg>
                            <span id="CorrectAnswers">Correct answers: 8</span>
                        </div>
                        <div class="flex items-center">
                            <svg class="w-5 h-5 text-red-500 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none"
                                 viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M6 18L18 6M6 6l12 12"/>
                            </svg>
                            <span id="WrongAnswers">Incorrect answers: 2</span>
                        </div>
                        <div class="flex items-center">
                            <svg class="w-5 h-5 text-indigo-500 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none"
                                 viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                            <span>Total time: 12:45</span>
                        </div>
                        <div class="flex items-center">
                            <svg class="w-5 h-5 text-yellow-500 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none"
                                 viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"/>
                            </svg>
                            <span id="badge">Badge earned: JavaScript Expert</span>
                        </div>
                    </div>
                </div>

                <div class="mb-6">
                    <h3 class="text-lg font-medium text-gray-900 mb-4">Badge Earned</h3>
                    <div class="flex items-center justify-center">
                        <div class="text-center" id="badge_section">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            let quizId = {{ $quiz->id }};
            let savedAnswers = JSON.parse(localStorage.getItem(`Quiz_${quizId}_answers`)) || [];
            let questionsArray = @json($quiz->questions);
            let quizDuration = {{ $quiz->duration ?? 15 }} * 60;

            const quizSection = document.querySelector("#quiz_section");
            const resultSection = document.querySelector("#result_section");
            let remainingTime;
            let timerInterval;
            let startTime;
            let timeSpent = 0;

            let answeredQuestionIds = savedAnswers.map(a => a.question);
            let remainingQuestions = [];

            for (let i = 0; i < questionsArray.length; i++) {
                if (!answeredQuestionIds.includes(i)) {
                    remainingQuestions.push({
                        id: questionsArray[i].id,
                        index: i,
                        question: questionsArray[i]
                    });
                }
            }
            console.log(questionsArray)
            console.log(remainingQuestions.length)

            let currentQuestionIndex = 0;

            function initTimer() {
                const savedEndTime = localStorage.getItem(`Quiz_${quizId}_endTime`);
                startTime = Date.now();

                const savedTimeSpent = localStorage.getItem(`Quiz_${quizId}_timeSpent`);
                if (savedTimeSpent) {
                    timeSpent = parseInt(savedTimeSpent);
                }

                if (savedEndTime) {
                    const now = Date.now();
                    const endTime = parseInt(savedEndTime);
                    remainingTime = Math.max(0, Math.floor((endTime - now) / 1000));
                } else {
                    remainingTime = quizDuration;
                    const endTime = Date.now() + (remainingTime * 1000);
                    localStorage.setItem(`Quiz_${quizId}_endTime`, endTime);
                }

                timerInterval = setInterval(() => {
                    remainingTime--;

                    timeSpent = Math.floor((Date.now() - startTime) / 1000) + (parseInt(savedTimeSpent) || 0);
                    localStorage.setItem(`Quiz_${quizId}_timeSpent`, timeSpent);

                    const timerDisplay = document.getElementById('timer_display');
                    if (timerDisplay) {
                        const minutes = Math.floor(remainingTime / 60);
                        const seconds = remainingTime % 60;
                        timerDisplay.textContent = `${minutes}:${seconds < 10 ? '0' + seconds : seconds}`;

                        if (remainingTime < 60) {
                            timerDisplay.classList.add('text-red-600', 'font-bold');
                        }
                    }

                    if (remainingTime <= 0) {
                        clearInterval(timerInterval);
                        submitQuiz();
                    }
                }, 1000);
            }

            function renderQuiz() {
                if (remainingQuestions.length === 0) {
                    console.log("no remaining questions");
                    submitQuiz();
                    return;
                }

                const currentItem = remainingQuestions[currentQuestionIndex];
                const question = currentItem.question;
                const questionIndex = currentItem.index;
                const questionId = currentItem.id;

                const progress = questionIndex + 1;
                const totalQuestions = questionsArray.length;

                quizSection.innerHTML = `
                <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="mb-8">
                        <div class="flex justify-between items-center mb-2">
                            <span class="text-sm font-medium text-gray-700">Progress: ${progress}/${totalQuestions} questions</span>
                            <span class="text-sm font-medium text-gray-700">Time remaining: <span id="timer_display"></span></span>
                        </div>
                        <div class="w-full bg-gray-200 rounded-full h-2.5">
                            <div class="bg-indigo-600 h-2.5 rounded-full" style="width: ${(progress / totalQuestions) * 100}%"></div>
                        </div>
                    </div>
                    <div class="bg-white rounded-lg shadow-md p-6 mb-8">
                        <div class="mb-6">
                            <h2 class="text-xl font-bold text-gray-900 mb-2">Question ${questionIndex + 1}:</h2>
                            <div class="mt-4 bg-gray-100 p-4 rounded-md">
                                <pre class="text-gray-800 font-mono">${question.title}</pre>
                            </div>
                        </div>
                        <form>
                            <div class="space-y-4" id="choices_section"></div>

                            <div class="mt-8 flex justify-between">
                                <button type="button" id="prevBtn" class="inline-flex items-center px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 ${currentQuestionIndex === 0 ? 'hidden' : ''}">Previous</button>
                                <button type="button" id="nextBtn" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700">
                                    ${currentQuestionIndex === remainingQuestions.length - 1 ? 'Finish' : 'Next'}
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            `;

                const choiceSection = document.querySelector('#choices_section');
                question.choices.forEach((option, i) => {
                    choiceSection.innerHTML += `
                    <div class="flex items-center">
                        <input id="option-${i}" name="answer" value="${option.id}" type="radio" class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-500">
                        <label for="option-${i}" class="ml-3 block text-gray-700">
                            <span class="font-medium">${i + 1}.</span> ${option.text}
                        </label>
                    </div>`;
                });

                const nextBtn = document.querySelector('#nextBtn');
                const prevBtn = document.querySelector('#prevBtn');

                nextBtn.addEventListener('click', () => {
                    const selected = document.querySelector('input[name="answer"]:checked');

                    if (!selected) {
                        alert("Please select an option before continuing.");
                        return;
                    }

                    let answerObj = {
                        question: questionId,
                        answer: parseInt(selected.value)
                    };

                    let foundIndex = savedAnswers.findIndex(el => el.question === answerObj.question)

                    if (foundIndex !== -1) {
                        savedAnswers[foundIndex].answer = answerObj.answer;
                    } else {
                        savedAnswers.push(answerObj);
                    }


                    localStorage.setItem(`Quiz_${quizId}_answers`, JSON.stringify(savedAnswers));

                    if (currentQuestionIndex >= remainingQuestions.length - 1) {
                        submitQuiz();
                        return;
                    }

                    currentQuestionIndex++;
                    renderQuiz();
                });

                prevBtn.addEventListener('click', () => {
                    if (currentQuestionIndex > 0) {
                        currentQuestionIndex--;
                        renderQuiz();
                    }
                });

                const minutes = Math.floor(remainingTime / 60);
                const seconds = remainingTime % 60;
                const timerDisplay = document.getElementById('timer_display');
                timerDisplay.textContent = `${minutes}:${seconds < 10 ? '0' + seconds : seconds}`;
            }

            initTimer();
            renderQuiz();

            function submitQuiz() {
                clearInterval(timerInterval);
                quizSection.innerHTML = '';
                resultSection.classList.remove('hidden');

                const token = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || '{{ csrf_token() }}';

                const minutes = Math.floor(timeSpent / 60);
                const seconds = timeSpent % 60;
                const formattedTime = `${minutes}:${seconds}`;

                const timeDisplay = document.querySelector('#result_section .flex.items-center:nth-child(3) span');
                const correctAnswers = document.querySelector('#CorrectAnswers');
                const wrongAnswers = document.querySelector('#WrongAnswers');
                const score = document.querySelector('#Score');
                const badge = document.querySelector('#badge');
                const scoreBar = document.querySelector('#ScoreBar');
                const badgeSection = document.querySelector('#badge_section');

                if (timeDisplay) {
                    timeDisplay.textContent = `Total time: ${formattedTime}`;
                }

                const answers = JSON.parse(localStorage.getItem(`Quiz_${quizId}_answers`) || '[]');
                const timeTakenValue = parseInt(localStorage.getItem(`Quiz_${quizId}_timeSpent`) || '0');

                fetch(`/quizSubmit/${quizId}/`, {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': token,
                        'Content-Type': 'application/json',
                        'Accept': 'application/json'
                    },
                    body: JSON.stringify({
                        answers: answers,
                        timeTaken: timeTakenValue
                    })
                }).then(async response => {
                    const data = await response.json();
                    if (response.status === 200) {
                        correctAnswers.textContent = `Correct answers: ${data.data[0]}`;
                        wrongAnswers.textContent = `Incorrect answers: ${data.data[1]}`;
                        score.textContent = `Correct answers: ${data.data[0]}/${questionsArray.length}`;
                        badge.textContent = `Badge earned ${data.badge[0]['badge_name']}`
                        scoreBar.style.width = `${(data.data[0] / questionsArray.length) * 100}%`;

                        const baseUrl = "{{ url('/storage') }}";

                        const date = new Date(data.badge[0]['created_at']);
                        const formattedDate = date.toLocaleString('en-US', {
                            year: 'numeric',
                            month: 'long',
                            day: 'numeric',
                            hour: 'numeric',
                            minute: '2-digit',
                            hour12: true
                        });

                        if (data.badge[0]) {
                            badgeSection.innerHTML = `
                            <div
                                class="inline-flex items-center justify-center h-32 w-32 rounded-full bg-yellow-100 mb-3">
                                <img src="${baseUrl}/${data.badge[0]['icon']}" alt="">
                            </div>
                            <h4 class="text-lg font-bold text-gray-900">${data.badge[0]['badge_name']}</h4>
                            <p class="text-sm text-gray-600">Earned on ${formattedDate}</p>`

                            resultSection.innerHTML += `                <form action="/generate" method="POST" class="inline-block">
                    @csrf
                            <input type="hidden" name="course" value="{{ $quiz->course->id }}">
                    <button type="submit" class="bg-blue-500 text-white px-6 py-2 rounded-md hover:bg-blue-600 transition duration-300">
                        Download Certificate
                    </button>
                </form>`
                        } else {
                            badgeSection.innerHTML = `You are failed in The Quiz Test Oops!`
                            badge.textContent = "no Badge Earned"
                        }
                    } else {
                        console.log("An error occurred while enrolling course.");
                    }

                    console.log('Status:', response.status);
                    console.log('Data:', data);
                })
                    .catch(error => {
                        console.log("An error occurred while enrolling course.");
                        console.error('Error:', error);
                    });
            }
        });
    </script>
@endsection
