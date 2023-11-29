<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased bg-gray-800 h-screen flex items-center justify-center">

    <form method="POST" action="{{ route('add-service') }}" class="bg-gray-700 p-6 rounded-lg shadow-md w-full max-w-md">
        @csrf

        <div class="mb-4">
            <label for="name" class="text-white block mb-1">Service Name:</label>
            <input type="text" name="name" required class="w-full px-4 py-2 rounded-md border bg-gray-800 text-white focus:outline-none focus:border-blue-500">
        </div>

        <div class="mb-4">
            <label for="description" class="text-white block mb-1">Description:</label>
            <textarea name="description" required class="w-full px-4 py-2 rounded-md border bg-gray-800 text-white focus:outline-none focus:border-blue-500"></textarea>
        </div>

        <div class="mb-4">
            <label for="price" class="text-white block mb-1">Price:</label>
            <input type="number" name="price" required class="w-full px-4 py-2 rounded-md border bg-gray-800 text-white focus:outline-none focus:border-blue-500">
        </div>

        <div class="mb-4">
            <label for="duration" class="text-white block mb-1">Duration:</label>
            <input type="number" name="duration" required class="w-full px-4 py-2 rounded-md border bg-gray-800 text-white focus:outline-none focus:border-blue-500">
        </div>

        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-700 focus:outline-none focus:shadow-outline-blue">
            Add Service
        </button>
    </form>

</body>
</html>
