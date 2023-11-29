@php
$statusOptions = [
    'Pending' => 'Pending', 
    'Confirmed' => 'Confirmed',
    'Canceled' => 'Canceled', 
    'Completed' => 'Completed',
];
@endphp

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Reservation - BarberBuddies</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="font-sans antialiased bg-gray-100">
    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Edit Reservation') }}
            </h2>
        </x-slot>
    
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                    <form method="POST" action="{{ route('reservasi.update', ['barbershop' => $barbershop, 'reservasi' => $reservasi]) }}">
                        @csrf
                        @method('PUT')
    
                        <div class="mb-4">
                            <x-label for="status" :value="__('Status')" />
                            <x-select id="status" class="block mt-1 w-full" name="status" :options="$statusOptions" :selected="$reservasi->status" required />
                            <x-input-error :messages="$errors->get('status')" class="mt-2" />
                        </div>
    
                        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-700 focus:outline-none focus:shadow-outline-blue">
                            Update Status
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </x-app-layout>
</body>
</html>