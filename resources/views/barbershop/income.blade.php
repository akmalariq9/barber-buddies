<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('storage/favicon-01-01.png') }}">
    <title>Monthly Revenue</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="font-sans antialiased bg-gray-100">
    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-100 leading-tight">
                {{ __('Total Income') }}
            </h2>
        </x-slot>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                    <h3 class="text-2xl font-inter font-bold mb-4">Total Income for Your Barbershop</h3>

                    <form action="{{ route('barbershop.income', ['barbershop' => $barbershop]) }}" method="get">
                        @csrf
                        <label for="month" class="block text-sm font-medium text-gray-700">Select Month:</label>
                        <select id="month" name="month" class="mt-1 text-center px-8 justify-center gap-2 border-gray-300 rounded-md">
                            @foreach (range(1, 12) as $month)
                                <option value="{{ $month }}" {{ $month == $selectedMonth ? 'selected' : '' }}>
                                    {{ date('F', mktime(0, 0, 0, $month, 1)) }}
                                </option>
                            @endforeach
                        </select>
                        <button type="submit" class="mt-2 ml-4 py-2 px-6 bg-blue-500 text-white rounded-md">Filter</button>
                    </form>

                    <p class="text-lg mb-4 mt-4">
                        Total income for {{ date('F Y', mktime(0, 0, 0, $selectedMonth, 1)) }}:
                        {{ number_format($revenue, 2) }}
                    </p>
                </div>
            </div>
        </div>
    </x-app-layout>
</body>

</html>
