{{-- <form action="{{ url('/barbershop/add-service') }}" method="post"> --}}
<form method="POST" action="{{ route('add-service') }}">
    @csrf

    <label for="name">Servrice Name:</label>
    <input type="text" name="name" required>
    
    <label for="description">Description:</label>
    <textarea name="description" required></textarea>

    <label for="price">Price:</label>
    <input type="number" name="price" required>

    <label for="duration">Duration:</label>
    <input type="number" name="duration" required>

    <button type="submit">Register</button>
</form>
