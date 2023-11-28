<!DOCTYPE html>
<html>
<head>
    <title>{{ $barberShop->name }} - Barber Shop Profile</title>
</head>
<body>

    <h1>{{ $barberShop->name }} - Barber Shop Profile</h1>

    <p>{{ $barberShop->address }}</p>

    <p>{{ $barberShop->description }}</p>

    <p>{{ $barberShop->worker }}</p>

    <a href="{{ route('barbershop.edit', $barberShop) }}">Edit Profile</a>

</body>
</html>
