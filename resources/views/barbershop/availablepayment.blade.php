{{-- <form action="{{ url('/barbershop/add-service') }}" method="post"> --}}
    <form method="POST" action="{{ route('add-payment') }}">
        @csrf

        <label for="payment_method">Payment Method:</label>
        <textarea name="payment_method" required></textarea>

        <label for="account_number">Payment Method:</label>
        <textarea name="account_number" required></textarea>     
        
        <button type="submit">Register</button>
    </form>
    