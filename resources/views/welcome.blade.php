<!-- resources/views/welcome.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BarberBuddies</title>
    <!-- <link href='css/app.css' rel="stylesheet"> -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">

    <!-- Section: Welcome -->
    <section class="bg-blue-500 text-white py-20 text-center">
        <h1 class="text-4xl font-bold mb-4">Welcome to BarberBuddies</h1>
        <p class="text-lg">Connecting Barbers and Clients</p>
    </section>

    <!-- Section: Features -->
    <section class="py-16">
        <div class="container mx-auto text-center">
            <h2 class="text-3xl font-bold mb-8">Discover BarberBuddies Features</h2>

            <!-- Feature Cards -->
            <div class="flex flex-wrap justify-center">
                <!-- Feature Card 1 -->
                <div class="w-full md:w-1/2 lg:w-1/3 p-4">
                    <div class="bg-white rounded-lg p-6 shadow-md">
                        <h3 class="text-xl font-semibold mb-4">Barber Reservations</h3>
                        <p class="text-gray-600">Book appointments with your favorite barbers seamlessly.</p>
                    </div>
                </div>

                <!-- Feature Card 2 -->
                <div class="w-full md:w-1/2 lg:w-1/3 p-4">
                    <div class="bg-white rounded-lg p-6 shadow-md">
                        <h3 class="text-xl font-semibold mb-4">Client Reviews</h3>
                        <p class="text-gray-600">Rate and review your barber after each haircut session.</p>
                    </div>
                </div>

                <!-- Feature Card 3 -->
                <div class="w-full md:w-1/2 lg:w-1/3 p-4">
                    <div class="bg-white rounded-lg p-6 shadow-md">
                        <h3 class="text-xl font-semibold mb-4">Barbershop Management</h3>
                        <p class="text-gray-600">For barbershops: Manage your schedule, services, and more.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Section: About Us -->
    <section class="bg-gray-200 py-20 text-center">
        <h2 class="text-3xl font-bold mb-8">About Us</h2>
        <p class="text-lg text-gray-600">
            BarberBuddies is dedicated to creating a seamless connection between barbers and clients.
            Our platform allows clients to discover barbershops, book appointments, and leave reviews.
            For barbershops, BarberBuddies provides tools for managing appointments and services.
        </p>
    </section>

    <!-- <script src="{{ mix('js/app.js') }}"></script> -->
</body>
</html>
