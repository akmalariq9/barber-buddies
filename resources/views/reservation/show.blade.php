<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Reservations</title>
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('storage/favicon-01-01.png') }}">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="font-sans antialiased bg-gray-100">
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-100 leading-tight">
            {{ __('Reservations') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <h3 class="text-2xl font-inter font-bold mb-4">Reservations for Your Barbershop</h3>

                @if($reservations->count() > 0)
                    <table class="min-w-full divide-y divide-gray-200 table-fixed">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date and Time</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Notes</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">User Rating</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Delete</th>

                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200 table-fixed">
                            @foreach($reservations as $reservation)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $reservation->user->name }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $reservation->status }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $reservation->reservation_datetime }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $reservation->additional_notes }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $reservation->review ? $reservation->review->rating : 'No rating'}}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <a href="{{ route('reservasi.edit', ['barbershop' => $reservation->barber_shop_id, 'reservasi' => $reservation->id]) }}" class="text-blue-500 hover:text-blue-700">Edit</a>
                                    </td>
                                    <!-- Add a new column for Delete with a link or button -->
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <form action="{{ route('reservasi.destroy', ['barbershop' => $reservation->barber_shop_id, 'reservasi' => $reservation->id]) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-500 hover:text-red-700">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <p>No reservations available.</p>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
</body>
</html>