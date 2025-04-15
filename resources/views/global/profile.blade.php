<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Profile - UpCours</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50">
    <div class="min-h-screen py-8">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Header -->
            <div class="flex justify-between items-center mb-8 animate-fadeIn">
                <h1 class="text-2xl font-bold text-gray-900">My Profile</h1>
                <a href="/" class="text-sm text-indigo-600 hover:text-indigo-500 transition-colors duration-200">
                    ← Back to Home
                </a>
            </div>

            <!-- Profile Section -->
            <div class="bg-white shadow-lg rounded-lg p-6 mb-8 animate-fadeIn">
                <h2 class="text-lg font-semibold text-gray-900 mb-4">Personal Information</h2>
                <div class="flex items-center space-x-4">
                    <div class="relative group">
                        <img src="/placeholder.svg" alt="Profile Picture" class="w-20 h-20 rounded-full object-cover border-2 border-gray-200 transition-transform duration-200 group-hover:scale-105">
                        <button class="absolute inset-0 bg-black bg-opacity-40 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity rounded-full">
                            <span class="text-white text-xs">Edit</span>
                        </button>
                    </div>
                    <div>
                        <h3 class="text-lg font-medium text-gray-900">Thomas Dupont</h3>
                        <p class="text-sm text-gray-500">thomas.dupont@example.com</p>
                    </div>
                </div>
                <form class="mt-6 space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Full Name</label>
                        <input type="text" value="Thomas Dupont" class="mt-1 block w-full rounded-md p-2 focus:outline-none border-2 border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Email Address</label>
                        <input type="email" value="thomas.dupont@example.com" class="mt-1 block w-full rounded-md p-2 focus:outline-none border-2 border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Phone Number</label>
                        <input type="tel" value="+33 6 12 34 56 78" class="mt-1 block w-full rounded-md p-2 focus:outline-none border-2 border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200">
                    </div>
                    <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-all duration-200">
                        Save Changes
                    </button>
                </form>
            </div>

            <!-- Change Password Section -->
            <div class="bg-white shadow-lg rounded-lg p-6 mb-8 animate-fadeIn">
                <h2 class="text-lg font-semibold text-gray-900 mb-4">Change Password</h2>
                <form class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Current Password</label>
                        <input type="password" class="mt-1 block w-full rounded-md p-2 focus:outline-none border-2 border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">New Password</label>
                        <input type="password" class="mt-1 block w-full rounded-md p-2 focus:outline-none border-2 border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Confirm New Password</label>
                        <input type="password" class="mt-1 block w-full rounded-md p-2 focus:outline-none border-2 border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200">
                    </div>
                    <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-all duration-200">
                        Update Password
                    </button>
                </form>
            </div>

            <!-- Danger Zone -->
            <div class="bg-white shadow-lg rounded-lg p-6 animate-fadeIn">
                <h2 class="text-lg font-semibold text-red-800 mb-4">Danger Zone</h2>
                <p class="text-sm text-gray-700 mb-4">
                    Deleting your account is irreversible and will remove all your data.
                </p>
                <button class="inline-flex items-center justify-center px-4 py-2 border border-transparent font-medium rounded-md text-red-700 bg-red-100 hover:bg-red-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 transition-all duration-200">
                    Delete My Account
                </button>
            </div>
        </div>
    </div>

    <!-- Success Notification -->
    <div class="fixed bottom-4 right-4 bg-white shadow-lg rounded-lg p-4 animate-fadeIn">
        <div class="flex items-center">
            <span class="text-green-500 mr-2">✓</span>
            <p class="text-sm text-gray-700">Changes saved successfully!</p>
        </div>
    </div>
</body>
</html>
