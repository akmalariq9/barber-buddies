<!DOCTYPE html>
<html>
<head>
    <title>Edit {{ $barberShop->name }} - Barber Shop Profile</title>
</head>
<body>

    <h1>Edit {{ $barberShop->name }} - Barber Shop Profile</h1>

    <form action="{{ route('barbershop.update', $barberShop) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="name">Name:</label>
        <input type="text" name="name" value="{{ $barberShop->name }}" required>

        <label for="description">Description:</label>
        <textarea name="description" required>{{ $barberShop->description }}</textarea>

        <label for="address">Address:</label>
        <input type="text" name="address" value="{{ $barberShop->address }}" required>

        {{-- worker --}}
        <label for="worker">Worker:</label>
        <input type="text" name="worker" value="{{ $barberShop->worker }}" required>
        
        <button type="submit">Update Profile</button>
    </form>

</body>
</html>
