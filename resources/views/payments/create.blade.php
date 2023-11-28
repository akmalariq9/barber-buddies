<!-- resources/views/payments/create.blade.php -->

<form action="{{ route('payments.store') }}" method="post">
    @csrf
    <input type="hidden" name="reservation_id" value="{{ $reservation->id }}">

    <label for="payment_method">Payment Method:</label>
    <input type="text" name="payment_method" required>

    <label for="payment_date">Payment Date:</label>
    <input type="datetime-local" name="payment_date" required>

    <button type="submit">Submit Payment</button>
</form>