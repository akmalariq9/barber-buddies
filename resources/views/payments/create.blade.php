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
<body class="h-screen flex items-center justify-center bg-cover" style="background-image: url('{{ asset("storage/bg-form2.png") }}');">
    <div class="flex gap-6 w-fit h-fit items-center p-8 rounded-2xl shadow-xl bg-white">

        <div class="h-96">
            <img src="{{ asset('storage/barber.png') }}" alt="hai" class="h-full rounded-lg">
        </div>

        <div class="h-96">
        <form action="{{ route('payments.store') }}" method="post" class="bg-inherit w-full h-full max-w-md flex flex-col justify-between">
        @csrf

        {{-- Show the total amount --}}
        <div>
            <label for="total_amount" class="text-black font-inter font-bold text-sm">Total Amount:</label>
            <input type="text" name="total_amount" value="{{ $reservation->total_amount }}" readonly class="w-full px-4 py-2 rounded-md border bg-gray-800 text-white focus:outline-none cursor-not-allowed opacity-50">
        </div>

        <div>
            <label for="payment_method" class="text-black font-inter font-bold text-sm">Payment Method:</label>
            <select name="payment_method" required class="w-full px-4 py-2 rounded-md border bg-gray-100 text-gray-500 border-none">
                <option value="" disabled selected>Select Payment Method</option>
                @foreach ($availablePayments as $payment)
                    <option value="{{ $payment->payment_method}}">{{ $payment->payment_method }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label for="payment_date" class="text-black font-inter font-bold text-sm">Payment Date:</label>
            <input type="date" name="payment_date" required class="w-full px-4 py-2 rounded-md border bg-gray-100 text-gray-500 border-none">
        </div>

        <div>
            <label for="account_number" class="text-black font-inter font-bold text-sm">Account Number:</label>
            <input type="text" name="account_number" required class="w-full px-4 py-2 rounded-md border bg-gray-100 text-gray-500 border-none">
        </div>

        <input type="hidden" name="reservation_id" value="{{ $reservation->id }}">

        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-700 focus:outline-none focus:shadow-outline-blue">
            Pay Now
        </button>
        </form>
        </div>
    </div>

</body>
</html>


{{-- 
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Edit {{ $barberShop->name }} - Barber Shop Profile</title>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap');
    </style>

    <!-- Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="h-screen flex items-center justify-center bg-cover" style="background-image: url('{{ asset("storage/bg-form2.png") }}');">
    <div class="flex gap-6 w-fit h-fit items-center p-8 rounded-2xl shadow-xl bg-white">
        
        <div class="h-96">
            <img src="{{ asset('storage/barber.png' . $barberShop->image) }}" alt="{{ $barberShop->name }}" class="h-full rounded-lg">
        </div>

        <div class="h-96">
            <form action="{{ route('barbershop.update', $barberShop) }}" method="POST" class="bg-inherit w-full h-full max-w-md flex flex-col justify-between">
                @csrf
                @method('PUT')
                
                <div>
                    <label for="name" class="text-black font-inter font-bold text-sm">Name:</label>
                    <input type="text" name="name" value="{{ $barberShop->name }}" required class="w-full px-4 py-2 rounded-md border bg-gray-100 text-gray-500 border-none">
                </div>
            
                <div>
                    <label for="description" class="text-black font-inter font-bold text-sm">Description:</label>
                    <textarea name="description" required class="w-full px-4 py-2 rounded-md border bg-gray-100 text-gray-500 border-none">{{ $barberShop->description }}</textarea>
                </div>
            
                <div>
                    <label for="address" class="text-black font-inter font-bold text-sm">Address:</label>
                    <input type="text" name="address" value="{{ $barberShop->address }}" required class="w-full px-4 py-2 rounded-md border bg-gray-100 text-gray-500 border-none">
                </div>
            
                <div>
                    <label for="worker" class="text-black font-inter font-bold text-sm">Worker:</label>
                    <input type="text" name="worker" value="{{ $barberShop->worker }}" required class="w-full px-4 py-2 rounded-md border bg-gray-100 text-gray-500 border-none">
                </div>
            
                <div class="flex justify-center">
                    <button type="submit" class="bg-gray-800 text-white px-4 py-2 rounded-md hover:bg-gray-700 focus:outline-none focus:shadow-outline-blue">
                        Update Profile
                    </button>
                </div>
    
            </form>
        </div>
    </div>
    

</body>
</html>
 --}}