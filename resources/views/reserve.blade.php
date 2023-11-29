<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Form Reservasi</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Styles -->
    <style>
        body {
            font-family: 'figtree', sans-serif;
            background-color: #1f2937;
            color: #fff;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
        }
    </style>

    <!-- Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-800 text-white flex flex-col items-center justify-center h-screen">

    <h1 class="text-3xl font-bold mb-6">Form Reservasi</h1>

    <form action="{{ route('reservasi.store') }}" method="POST" class="bg-gray-700 p-8 rounded-md shadow-md w-full max-w-2xl">
        @csrf

        <label for="barber_shop_id" class="block mb-2">Barber Shop:</label>
        <select name="barber_shop_id" id="barber_shop_id" required class="w-full p-2 mb-4 bg-gray-800 text-white border border-gray-600 rounded-md">
            <option value="" disabled selected>Pilih Barber Shop</option>
            @foreach($barberShops as $barberShop)
                <option value="{{ $barberShop->id }}">{{ $barberShop->name }}</option>
            @endforeach
        </select>

        <label for="reservation_datetime" class="block mb-2">Reservation Datetime:</label>
        <input type="datetime-local" name="reservation_datetime" required class="w-full p-2 mb-4 bg-gray-800 text-white border border-gray-600 rounded-md">

        <label for="service_id" class="block mb-2">Service:</label>
        <select name="service_id" id="service_id" required disabled class="w-full p-2 mb-4 bg-gray-800 text-white border border-gray-600 rounded-md">
            <option value="" disabled selected>Pilih Service</option>
            @foreach($services as $service)
                <option value="{{ $service->id }}" data-barbershop="{{ $service->barber_shop_id }}">{{ $service->name }}</option>
            @endforeach
        </select>

        <label for="additional_notes" class="block mb-2">Additional Notes:</label>
        <textarea name="additional_notes" required class="w-full p-2 mb-4 bg-gray-800 text-white border border-gray-600 rounded-md"></textarea>

        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md cursor-pointer transition duration-300 hover:bg-blue-700">Reservasi</button>
    </form>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var barberShopDropdown = document.getElementById('barber_shop_id');
            var serviceDropdown = document.getElementById('service_id');
            var originalServiceOptions = serviceDropdown.innerHTML;

            barberShopDropdown.addEventListener('change', function () {
                var selectedBarberShopId = barberShopDropdown.value;

                if (selectedBarberShopId) {
                    serviceDropdown.innerHTML = originalServiceOptions;
                    var options = serviceDropdown.querySelectorAll('option');
                    options.forEach(function (option) {
                        var associatedBarberShopId = option.getAttribute('data-barbershop');
                        if (associatedBarberShopId !== selectedBarberShopId) {
                            option.remove();
                        }
                    });
                    serviceDropdown.disabled = false;
                } else {
                    serviceDropdown.innerHTML = originalServiceOptions;
                    serviceDropdown.disabled = true;
                }
            });
        });
    </script>
</body>
</html>