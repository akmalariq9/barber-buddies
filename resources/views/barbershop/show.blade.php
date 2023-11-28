<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $barberShop->name }} - Barber Shop Profile</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased bg-gray-900 text-white h-screen flex">

    <!-- Sidebar -->
    <aside class="w-1/4 bg-gray-800 p-8">
        <!-- Add any sidebar content here -->
        <p class="text-lg font-semibold">{{ $barberShop->name }}</p>
        <p>{{ $barberShop->address }}</p>
        <p>{{ $barberShop->description }}</p>
        <p>{{ $barberShop->worker }}</p>
    </aside>

    <!-- Main Content -->
    <main class="flex-1 p-8">
        <div class="max-w-md mx-auto bg-gray-800 rounded-lg shadow-md text-center">
            <h1 class="text-3xl font-bold mb-4">{{ $barberShop->name }}</h1>

            <p class="mb-4">{{ $barberShop->address }}</p>
            <p class="mb-4">{{ $barberShop->description }}</p>
            <p class="mb-6">{{ $barberShop->worker }}</p>
            
            <a href="{{ route('barbershop.edit', $barberShop) }}" class="text-blue-500 hover:underline">Edit Profile</a>
        </div>
    </main>

</body>
</html>
