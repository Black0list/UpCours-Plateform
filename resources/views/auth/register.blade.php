@extends('layouts.app')

@section('title', 'Register')
@section('meta_description', 'Create an account on UpCours to access our online courses.')

@section('content')
    <div class="min-h-screen bg-gray-50 flex flex-col justify-center py-12 sm:px-6 lg:px-8">
        <div class="sm:mx-auto sm:w-full sm:max-w-md">
            <a href="/" class="flex justify-center">
                <span class="text-3xl font-bold text-indigo-600">UpCours</span>
            </a>
            <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">Create an account</h2>
            <p class="mt-2 text-center text-sm text-gray-600">
                Or
                <a href="{{ route('login') }}" class="font-medium text-indigo-600 hover:text-indigo-500">
                    log in to your account
                </a>
            </p>
        </div>

        <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-md">
            <div class="bg-white py-8 px-4 shadow sm:rounded-lg sm:px-10">
                @error('password')
                <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                @enderror

                <form class="space-y-6" action="{{ route('register') }}" method="POST">
                    @csrf

                    <div>
                        <label for="firstname" class="block text-sm font-medium text-gray-700">First name</label>
                        <div class="mt-1">
                            <input id="firstname" name="firstname" type="text" required class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm sm:text-sm">
                        </div>
                        @error('firstname')
                        <div class="text-sm text-red-600 mt-1">{{ $message }}</div>
                        @enderror
                        <div id="firstname-error" class="text-sm text-red-600 mt-1"></div>
                    </div>

                    <div>
                        <label for="lastname" class="block text-sm font-medium text-gray-700">Last name</label>
                        <div class="mt-1">
                            <input id="lastname" name="lastname" type="text" required class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm sm:text-sm">
                        </div>
                        @error('lastname')
                        <div class="text-sm text-red-600 mt-1">{{ $message }}</div>
                        @enderror
                        <div id="lastname-error" class="text-sm text-red-600 mt-1"></div>
                    </div>

                    <div>
                        <label for="phone" class="block text-sm font-medium text-gray-700">Phone Number</label>
                        <div class="mt-1">
                            <input id="phone" name="phone" type="tel" required class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm sm:text-sm">
                        </div>
                        @error('phone')
                        <div class="text-sm text-red-600 mt-1">{{ $message }}</div>
                        @enderror
                        <div id="phone-error" class="text-sm text-red-600 mt-1"></div>
                    </div>

                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700">Email address</label>
                        <div class="mt-1">
                            <input id="email" name="email" type="email" required class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm sm:text-sm">
                        </div>
                        @error('email')
                        <div class="text-sm text-red-600 mt-1">{{ $message }}</div>
                        @enderror
                        <div id="email-error" class="text-sm text-red-600 mt-1"></div>
                    </div>

                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                        <div class="mt-1">
                            <input id="password" name="password" type="password" required class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm sm:text-sm">
                        </div>
                        @error('password')
                        <div class="text-sm text-red-600 mt-1">{{ $message }}</div>
                        @enderror
                        <div id="password-error" class="text-sm text-red-600 mt-1"></div>
                    </div>

                    <div>
                        <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Confirm password</label>
                        <div class="mt-1">
                            <input id="password_confirmation" name="password_confirmation" type="password" required class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm sm:text-sm">
                        </div>
                        <div id="password-confirmation-error" class="text-sm text-red-600 mt-1"></div>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Register as</label>
                        <div class="flex items-center space-x-4">
                            <div class="flex items-center">
                                <input id="student" name="role" type="radio" value="student" required class="h-4 w-4 text-indigo-600 border-gray-300">
                                <label for="student" class="ml-2 block text-sm text-gray-900">Student</label>
                            </div>
                            <div class="flex items-center">
                                <input id="teacher" name="role" type="radio" value="teacher" required class="h-4 w-4 text-indigo-600 border-gray-300">
                                <label for="teacher" class="ml-2 block text-sm text-gray-900">Teacher</label>
                            </div>
                        </div>
                        <div id="role-error" class="text-sm text-red-600 mt-1"></div>
                    </div>

                    <div class="flex items-center">
                        <input id="terms" name="terms" type="checkbox" required class="h-4 w-4 text-indigo-600 border-gray-300 rounded">
                        <label for="terms" class="ml-2 block text-sm text-gray-900">
                            I agree to the <a href="#" class="text-indigo-600 hover:text-indigo-500">terms of use</a>
                        </label>
                    </div>
                    <div id="terms-error" class="text-sm text-red-600 mt-1"></div>

                    <div>
                        <button type="submit" class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700">
                            Register
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const form = document.querySelector('form');

            form.addEventListener('submit', function (e) {
                const firstname = form.querySelector('#firstname').value.trim();
                const lastname = form.querySelector('#lastname').value.trim();
                const phone = form.querySelector('#phone').value.trim();
                const email = form.querySelector('#email').value.trim();
                const password = form.querySelector('#password').value;
                const passwordConfirm = form.querySelector('#password_confirmation').value;
                const roleChecked = form.querySelector('input[name="role"]:checked');
                const termsChecked = form.querySelector('#terms').checked;

                let errors = [];

                document.querySelector('#firstname-error').innerHTML = '';
                document.querySelector('#lastname-error').innerHTML = '';
                document.querySelector('#phone-error').innerHTML = '';
                document.querySelector('#email-error').innerHTML = '';
                document.querySelector('#password-error').innerHTML = '';
                document.querySelector('#password-confirmation-error').innerHTML = '';
                document.querySelector('#role-error').innerHTML = '';
                document.querySelector('#terms-error').innerHTML = '';

                const nameRegex = /^[A-Za-z\s\-']+$/;

                if (firstname.length < 3) {
                    errors.push('Firstname must be at least 3 characters.');
                } else if (!nameRegex.test(firstname)) {
                    errors.push('Firstname must contain only letters.');
                }

                if (lastname.length < 3) {
                    errors.push('Lastname must be at least 3 characters.');
                } else if (!nameRegex.test(lastname)) {
                    errors.push('Lastname must contain only letters.');
                }

                if (phone.replace(/\D/g, '').length < 10) errors.push('Phone number must contain at least 10 digits.');
                if (!/^\S+@\S+\.\S+$/.test(email)) errors.push('Email is not valid.');
                if (password.length < 6) errors.push('Password must be at least 6 characters.');
                if (password !== passwordConfirm) errors.push('Passwords do not match.');
                if (!roleChecked) errors.push('You must choose a role.');
                if (!termsChecked) errors.push('You must agree to the terms.');

                if (errors.length > 0) {
                    e.preventDefault();
                    errors.forEach(error => {
                        if (error.includes('First')) document.querySelector('#firstname-error').innerText = error;
                        if (error.includes('Last')) document.querySelector('#lastname-error').innerText = error;
                        if (error.includes('Phone')) document.querySelector('#phone-error').innerText = error;
                        if (error.includes('Email')) document.querySelector('#email-error').innerText = error;
                        if (error.includes('Password') && !error.includes('match')) document.querySelector('#password-error').innerText = error;
                        if (error.includes('match')) document.querySelector('#password-confirmation-error').innerText = error;
                        if (error.includes('role')) document.querySelector('#role-error').innerText = error;
                        if (error.includes('terms')) document.querySelector('#terms-error').innerText = error;
                    });
                }
            });
        });
    </script>
@endsection
