<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Barbershop</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-900 text-white font-sans">

    <div class="container mx-auto p-8">
        <h1 class="text-3xl font-bold mb-8 text-red-500">Daftar Barber</h1>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($pelanggan as $p)
                <a href="{{ route('barbershop.show', ['barberShop' => $p->id]) }}" class="hover:underline focus:outline-none focus:ring focus:border-blue-300">
                    <div class="bg-gray-800 p-6 rounded-lg">
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
