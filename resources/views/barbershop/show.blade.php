<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="h-screen flex items-center justify-center bg-cover" style="background-image: url('{{ asset("storage/bg-form2.png") }}');">
    <div class="flex gap-6 w-fit h-fit items-center p-8 rounded-2xl shadow-xl bg-white">
        <div class="h-96">
            <img src="{{ asset('storage/viewbarber.png')}}" alt="hai" class="h-full rounded-lg">
        </div>

        <div class="h-96">
            <div class="bg-inherit w-full h-full max-w-md flex flex-col justify-between">
                <h1 class="text-4xl font-inter font-bold mb-4">{{ $barberShop->name }}</h1>
                <div>
                    <label for="barbershop_name" class="text-black font-inter font-bold text-sm">Barbershop Name:</label>
                    <p class="w-full px-4 py-2 rounded-md border bg-gray-100 text-gray-500 border-none">
                        {{$barberShop->address}}
                    </p>
                </div>

                <div>
                    <label for="barbershop_description" class="text-black font-inter font-bold text-sm">About:</label>
                    <p class="w-full px-4 py-2 rounded-md border bg-gray-100 text-gray-500 border-none">Barber Description: 
                        {{$barberShop->description}}
                    </p>
                </div>

                <div>
                    <label for="Number of workers" class="text-black font-inter font-bold text-sm">Worker:</label>
                    <p class="w-full px-4 py-2 rounded-md border bg-gray-100 text-gray-500 border-none"> Number of Workers:
                        {{$barberShop->worker}}
                    </p>
                </div>

                @if(auth()->check() && auth()->user()->role == 'Barbershop')
                <a href="{{ route('barbershop.edit', $barberShop) }}" class="text-blue-500 hover:underline">
                    Edit Profile
                </a>
                @endif

                @if(auth()->check() && auth()->user()->role == 'Client')
                <a href="{{ route('reservasi.store') }}" class="text-white bg-gray-700 py-2 rounded-lg font-inter font-semibold text-center hover:bg-gray-500">
                    Make a Reservation
                </a>
                @endif      
            </div>
        </div>
    </main>
</body>
</html>
