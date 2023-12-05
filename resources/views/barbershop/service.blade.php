<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('storage/favicon-01-01.png') }}">
    <title>Add Service</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="h-screen flex items-center justify-center bg-cover" style="background-image: url('{{ asset("storage/bg-barber-2.png") }}');">
    <div class="flex gap-6 w-fit h-fit items-center p-8 rounded-2xl shadow-xl bg-white">
        <div class="h-96">
            <img src="{{ asset('storage/service-01.png') }}" alt="Hi" class="h-full rounded-lg">
        </div>
        <div class="h-96">
    <form method="POST" action="{{ route('add-service') }}" class="bg-inherit w-full h-full max-w-md flex flex-col justify-between">
        @csrf

        <div>
            <label for="name" class="text-black font-inter font-bold text-sm">Service Name:</label>
            <input type="text" name="name" required class="w-full px-4 py-2 rounded-md border bg-gray-100 text-gray-500 border-none">
        </div>

        <div>
            <label for="description" class="text-black font-inter font-bold text-sm">Description:</label>
            <textarea name="description" required class="w-full px-4 py-2 rounded-md border bg-gray-100 text-gray-500 border-none"></textarea>
        </div>

        <div>
            <label for="price" class="text-black font-inter font-bold text-sm">Price:</label>
            <input type="number" name="price" required class="w-full px-4 py-2 rounded-md border bg-gray-100 text-gray-500 border-none">
        </div>

        <div>
            <label for="duration" class="text-black font-inter font-bold text-sm">Duration:</label>
            <input type="number" name="duration" required class="w-full px-4 py-2 rounded-md border bg-gray-100 text-gray-500 border-none">
        </div>

        <button type="submit" class="bg-gray-800 text-white px-4 py-2 rounded-md hover:bg-gray-700 focus:outline-none focus:shadow-outline-blue">
            Add Service
        </button>
    </form>
</body>
</html>