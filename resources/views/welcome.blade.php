<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BarberBuddies</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="font-sans antialiased bg-transparent">
    <!-- Section: Welcome -->
    <section class="relative text-white h-screen bg-cover bg-center" style="background-image: url('{{ asset("storage/hero.png") }}');">
        <div class="absolute top-0 left-0 right-0 text-center">
            <div class="flex justify-between items-center p-4">
                <div>
                    <h1 class="text-2xl font-bold bg-inherit px-4 text-white">BarberBuddies.</h1>
                </div>
                <div class="px-4">
                    @guest
                        <a href="/login" class="text-white hover:underline">Login</a>
                        <a href="/register" class="text-white hover:underline ml-4">Register</a>
                    @endguest
    
                    <!-- Include links to view and edit profile -->
                    @if(auth()->check() && auth()->user()->role == 'Barbershop')
                        {{-- <a href="{{ route('barbershop.show', auth()->user()->barberShop) }}" class="text-white hover:underline ml-4">View Profile</a> --}}
                        <a href="{{ route('dashboardz', auth()->user()->barberShop) }}" class="text-white hover:underline ml-4">Dashboard</a>
                        <form action="/logout" method="POST" class="inline">
                            @csrf
                            <button type="submit" class="text-white hover:underline ml-4">Logout</button>
                        </form>
                    @endif
    
                    {{-- i want to dashboard and logout if role == client --}}
                    @if(auth()->check() && auth()->user()->role == 'Client')
                        <a href="{{ route('reservasi.store') }}" class="text-white hover:underline ml-4">Make a Reservation</a>
                        <a href="{{ route('dashboard') }}" class="text-white hover:underline ml-4">Our Partner</a>
                        <a href="{{ route('dashboardz') }}" class="text-white hover:underline ml-4">Dashboard</a>
                        <form action="/logout" method="POST" class="inline">
                            @csrf
                            <button type="submit" class="text-white hover:underline ml-4">Logout</button>
                        </form>
                    @endif
                </div>
            </div>
        </div>
        <div class="flex flex-col items-center justify-center h-full">
            <h1 class="text-6xl font-bold mb-4 text-center">Welcome to BarberBuddies!</h1>
            <p class="text-sm text-center">Effortless Booking, Expert Precision - Styled to Perfection, Booked with Ease, Your Look Defined.</p>
        </div>
    </section>    
    
    <!-- Section: Features -->
    <section class="py-16 bg-black">
        <div class="container mx-auto text-center">
            <h2 class="text-4xl font-bold mb-12 text-white">Discover BarberBuddies Features</h2>

            <!-- Feature Cards -->
            <div class="flex flex-wrap justify-center">
                <!-- Feature Card 1 -->
                <div class="w-full md:w-1/3 p-4">
                    <div class="bg-inherit rounded-lg p-8 shadow-md transition transform hover:scale-105 flex flex-col items-center">              
                        <h3 class="text-2xl font-bold mb-4 text-white">Online Booking System</h3>
                        <p class="text-white text-center">Seamlessly schedule appointments online anywhere.</p>
                    </div>
                </div>

                <!-- Feature Card 2 -->
                <div class="w-full md:w-1/3 p-4">
                    <div class="bg-inherit rounded-lg p-8 shadow-md transition transform hover:scale-105 flex flex-col items-center">
                        <h3 class="text-2xl font-bold mb-4 text-white">Style Gallery</h3>
                        <p class="text-white text-center">Explore a visual showcase of our barbers' amazing  work.</p>
                    </div>
                </div>

                <!-- Feature Card 3 -->
                <div class="w-full md:w-1/3 p-4">
                    <div class="bg-inherit rounded-lg p-8 shadow-md transition transform hover:scale-105 flex flex-col items-center">
                        <h3 class="text-2xl font-bold mb-4 text-white">Virtual Tours</h3>
                        <p class="text-white text-center">Giving clients a sneak peek into the ambiance.</p>
                    </div>
                </div>
            </div>

            <div class="flex flex-wrap justify-center">
                <!-- Feature Card 1 -->
                <div class="w-full md:w-1/3 p-4">
                    <div class="bg-inherit rounded-lg p-8 shadow-md transition transform hover:scale-105 flex flex-col items-center">
                        <h3 class="text-2xl font-bold mb-4 text-white">Newsletter Subscription</h3>
                        <p class="text-white text-center">Keep clients informed about the latest trends.</p>
                    </div>
                </div>

                <!-- Feature Card 2 -->
                <div class="w-full md:w-1/3 p-4">
                    <div class="bg-inherit rounded-lg p-8 shadow-md transition transform hover:scale-105 flex flex-col items-center">
                        <h3 class="text-2xl font-bold mb-4 text-white">Feedback Forms</h3>
                        <p class="text-white text-center">Gather valuable feedback through easy-to-use forms.</p>
                    </div>
                </div>

                <!-- Feature Card 3 -->
                <div class="w-full md:w-1/3 p-4">
                    <div class="bg-inherit rounded-lg p-8 shadow-md transition transform hover:scale-105 flex flex-col items-center">
                        <h3 class="text-2xl font-semibold mb-4 text-white">Online Payments</h3>
                        <p class="text-white text-center">Simplify the payment using online payment options.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Section: About Us -->
    <section class="bg-cover py-20 text-center " style="background-image: url('{{ asset("storage/aboutus.png") }}');">
        <h2 class="text-4xl font-bold mb-8 text-white">About Us</h2>
        <p class="text-lg text-white px-80">
            BarberBuddies is dedicated to creating a seamless connection between barbers and clients.
            Our platform allows clients to discover barbershops, book appointments, and leave reviews.
            For barbershops, BarberBuddies provides tools for managing appointments and services.
        </p>
    </section>
    </body>
</html>
