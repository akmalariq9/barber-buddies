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
    <!-- Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-800 text-white flex flex-col items-center justify-center h-screen" style="background-image: url('{{ asset("storage/bg-form2.png") }}');">
    <div class="flex gap-6 w-fit h-fit items-center p-8 rounded-2xl shadow-xl bg-white">
        <div class="h-96">
            <img src="{{ asset('storage/reservation-01.png')}}" alt="Halo" class="h-full rounded-lg">
        </div>
        
        <div class="h-96">
            <form action="{{ route('reservasi.store') }}" method="POST" class="bg-inherit w-full h-full max-w-md flex flex-col justify-between">
            @csrf

            <label for="barber_shop_id" class="text-black font-inter font-bold text-sm" >Barber Shop:</label>

            <select name="barber_shop_id" id="barber_shop_id" required class="w-full px-4 py-2 rounded-md border bg-gray-100 text-gray-500 border-none">
                <option value="" disabled selected>Pilih Barber Shop</option>
                @foreach($barberShops as $barberShop)
                    <option value="{{ $barberShop->id }}">{{ $barberShop->name }}</option>
                @endforeach
            </select>

            <label for="reservation_datetime" class="text-black font-inter font-bold text-sm">Reservation Datetime:</label>
            <input type="datetime-local" name="reservation_datetime" required class="w-full px-4 py-2 rounded-md border bg-gray-100 text-gray-500 border-none">

            <label for="service_id" class="text-black font-inter font-bold text-sm">Service:</label>
            <select name="service_id" id="service_id" required disabled class="w-full px-4 py-2 rounded-md border bg-gray-100 text-gray-500 border-none">
                <option value="" disabled selected>Pilih Service</option>
                @foreach($services as $service)
                    <option value="{{ $service->id }}" data-barbershop="{{ $service->barber_shop_id }}">{{ $service->name }}</option>
                @endforeach
            </select>

            <label for="additional_notes" class="text-black font-inter font-bold text-sm">Additional Notes:</label> 
            <textarea name="additional_notes" required class="w-full px-4 py-2 rounded-md border bg-gray-100 text-gray-500 border-none"></textarea>

            <div class="flex justify-center">
                <button type="submit" class="bg-gray-800 text-white px-4 py-2 mt-4 rounded-md w-full hover:bg-gray-700 focus:outline-none focus:shadow-outline-blue">
                    Reservasi
                </button>
            </div>
        </div>
    </form>
    </div>

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