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

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased bg-gray-800 h-screen flex items-center justify-center">

    <form action="{{ route('payments.store') }}" method="post" class="bg-gray-700 p-6 rounded-lg shadow-md w-full max-w-md">
        @csrf

        <div class="mb-4">
            <label for="payment_method" class="text-white block mb-1">Payment Method:</label>
            <select name="payment_method" required class="w-full px-4 py-2 rounded-md border bg-gray-800 text-white focus:outline-none focus:border-blue-500">
                <option value="" disabled selected>Select Payment Method</option>
                @foreach ($availablePayments as $payment)
                    <option value="{{ $payment->payment_method }}">{{ $payment->payment_method }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label for="payment_date" class="text-white block mb-1">Payment Date:</label>
            <input type="date" name="payment_date" required class="w-full px-4 py-2 rounded-md border bg-gray-800 text-white focus:outline-none focus:border-blue-500">
        </div>

        <div class="mb-4">
            <label for="account_number" class="text-white block mb-1">Account Number:</label>
            <input type="text" name="account_number" required class="w-full px-4 py-2 rounded-md border bg-gray-800 text-white focus:outline-none focus:border-blue-500">
        </div>

        <input type="hidden" name="reservation_id" value="{{ $reservation->id }}">

        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-700 focus:outline-none focus:shadow-outline-blue">
            Register
        </button>
    </form>

</body>
</html>