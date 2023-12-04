<!-- resources/views/revenues/index.blade.php -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Monthly Revenue</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="font-sans antialiased bg-gray-100">
    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-100 leading-tight">
                {{ __('Total Income') }}
        </x-slot>

            <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <h3 class="text-2xl font-inter font-bold mb-4">Reservations for Your Barbershop</h3>
                    <p class="text-lg mb-4">
                        Total income till {{ now()->format('F Y') }}: {{ number_format($revenue, 2) }}
                    </p>
                </div>
            </div>
    </x-app-layout>
</body>
</body>

</html>
