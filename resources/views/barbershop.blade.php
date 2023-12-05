<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Barbershop List</title>
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('storage/favicon-01-01.png') }}">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-black text-white font-sans">
    
    <!-- Hero Section -->
    <div class="flex items-center justify-center h-screen" style="background-image: url('{{ asset("storage/all-barber3.png") }}'); background-size: cover;">
        <div class="text-center">
            <h1 class="text-4xl font-bold text-white mb-2 px-64">One Destination, Barbershop Wonderland!</h1>
            <p class="text-base text-gray-300 px-72 mt-4">Immerse yourself in the artistry of grooming with our exclusive All Barbershop Edition. Each barbershop featured is a canvas of creativity, 
                waiting for you to explore and appreciate the unique art each master of the shears brings to the table.</p>
        
            <div class="mt-8">
                <a href="{{ route('landing') }}" class="text-white bg-inherit border-2 py-2 px-4 rounded-md mx-2 hover:bg-white hover:text-black">Home</a>
                <a href="{{ route('reservasi.store') }}" class="text-white bg-inherit border-2 py-2 px-4 rounded-md mx-2 hover:bg-white hover:text-black">Make a Reservation</a>
            </div>
        </div>
    </div>
    

    <div class="container mx-auto p-8">
        <h1 class="text-3xl mb-4 text-center text-white font-inter font-bold">Our Magnificent Partner</h1>
        <p class="text-center text-gray-400 mb-8 px-56">Uncover the realm of shear excellence by meeting the masters of the craft—every barber featured on our platform is a testament to skill and precision. Your grooming experience reaches new heights with the touch of these masters.</p>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($pelanggan as $p)
                <a href="{{ route('barbershop.show', ['barberShop' => $p->id]) }}" class="hover:underline focus:outline-none focus:ring focus:border-blue-300">
                    <div class="bg-zinc-900 p-6 rounded-lg">
                        <p class="text-lg font-bold text-red-500 mb-4">{{ $p->name }}</p>
                        <p class="text-gray-400 mb-2">{{ $p->address }}</p>
                        <p class="text-gray-400">{{ $p->description }}</p>
                    </div>
                </a>
            @endforeach
        </div>
    </div>

</body>
</html>
