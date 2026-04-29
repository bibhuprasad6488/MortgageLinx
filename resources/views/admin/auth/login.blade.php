<!DOCTYPE html>
<html>

<head>
    <title>Admin Login</title>
    <!-- Favicon -->
    <link rel="icon" href="{{ asset('admin/img/favicon.png') }}" type="image/x-icon" />
    <link rel="stylesheet" href="{{ asset('admin/css/bootstrap.min.css') }}" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="flex items-center justify-center min-h-screen bg-[#d8d2d2]">
    <form method="POST" action="{{ route('admin.login.submit') }}" class="bg-[#FFFFFF] p-6 rounded-xl shadow-lg w-96">
        @csrf

        <h2 class="text-2xl font-bold mb-6 text-center text-gray-800">
            Admin Login
        </h2>

        <!-- Email -->
        <input type="email" name="email" placeholder="Email"
            class="w-full mb-4 p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
            required>

        <!-- Password -->
        <input type="password" name="password" placeholder="Password"
            class="w-full mb-4 p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
            required>

        <!-- Remember Me -->
        <label class="flex items-center mb-4 text-sm text-gray-600">
            <input type="checkbox" name="remember" class="mx-2">
            Remember Me
        </label>

        <!-- Submit Button -->
        <button type="submit"
            class=" bg-blue-600 text-white p-2 rounded font-semibold hover:bg-blue-700 transition duration-200 btn-sm btn btn-primary">
            Login
        </button>
    </form>
</body>

</html>
