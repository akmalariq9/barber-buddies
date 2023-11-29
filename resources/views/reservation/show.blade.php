<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BarberBuddies</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="font-sans antialiased bg-gray-100">
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Reservations') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <h3 class="text-2xl font-semibold mb-4">Reservations for Your Barbershop</h3>

                {{-- @dd($reservations) --}}
                @if($reservations->count() > 0)
                    <ul>
                    @foreach($reservations as $reservation)
                        <li>{{ $reservation->name}} - {{ $reservation->status}} - {{ $reservation->reservation_datetime}}</li>
                    @endforeach
                    </ul>
                @else
                    <p>No reservations available.</p>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>

