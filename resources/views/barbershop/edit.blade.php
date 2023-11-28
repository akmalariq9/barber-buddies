<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Edit {{ $barberShop->name }} - Barber Shop Profile</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased bg-gray-800 h-screen flex items-center justify-center">

    <h1 class="text-white text-2xl mb-6">Edit {{ $barberShop->name }} - Barber Shop Profile</h1>

    <form action="{{ route('barbershop.update', $barberShop) }}" method="POST" class="bg-gray-700 p-6 rounded-lg shadow-md w-full max-w-md">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="name" class="text-white">Name:</label>
            <input type="text" name="name" value="{{ $barberShop->name }}" required class="w-full px-4 py-2 rounded-md border bg-gray-800 text-white focus:outline-none focus:border-blue-500">
        </div>

        <div class="mb-4">
            <label for="description" class="text-white">Description:</label>
            <textarea name="description" required class="w-full px-4 py-2 rounded-md border bg-gray-800 text-white focus:outline-none focus:border-blue-500">{{ $barberShop->description }}</textarea>
        </div>

        <div class="mb-4">
            <label for="address" class="text-white">Address:</label>
            <input type="text" name="address" value="{{ $barberShop->address }}" required class="w-full px-4 py-2 rounded-md border bg-gray-800 text-white focus:outline-none focus:border-blue-500">
        </div>

        <div class="mb-4">
            <label for="worker" class="text-white">Worker:</label>
            <input type="text" name="worker" value="{{ $barberShop->worker }}" required class="w-full px-4 py-2 rounded-md border bg-gray-800 text-white focus:outline-none focus:border-blue-500">
        </div>

        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-700 focus:outline-none focus:shadow-outline-blue">
            Update Profile
        </button>
    </form>

</body>
</html>
