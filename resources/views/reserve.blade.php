<!DOCTYPE html>
<html>
<head>
    <title>Form Reservasi</title>
</head>
<body>

    <h1>Form Reservasi</h1>

    <form action="{{ route('reservasi.store') }}" method="POST">
        @csrf

        <label for="barber_shop_id">Barber Shop:</label>
        <select name="barber_shop_id" id="barber_shop_id" required>
            <option value="" disabled selected>Pilih Barber Shop</option>
            @foreach($barberShops as $barberShop)
                <option value="{{ $barberShop->id }}">{{ $barberShop->name }}</option>
            @endforeach
        </select>

        {{-- Make status dropdown from database --}}
        {{-- <label for="status">Status:</label>
        <select name="status" id="status" required>
            <option value="" disabled selected>Pilih Status</option>
            @foreach($statuses as $status)
                <option value="{{ $status }}">{{ $status }}</option>
            @endforeach
        </select> --}}

        {{-- Make reservation datetime --}}
        <label for="reservation_datetime">Reservation Datetime:</label>
        <input type="datetime-local" name="reservation_datetime" required>

        {{-- Select service --}}
        <label for="service_id">Service:</label>
        <select name="service_id" id="service_id" required disabled>
            <option value="" disabled selected>Pilih Service</option>
            @foreach($services as $service)
                <option value="{{ $service->id }}" data-barbershop="{{ $service->barber_shop_id }}">{{ $service->name }}</option>
            @endforeach
        </select>
        
        {{-- Make Additional Notes --}}
        <label for="additional_notes">Additional Notes:</label>
        <textarea name="additional_notes" required></textarea>

        <button type="submit">Reservasi</button>
    </form>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Get references to the barber shop and service dropdowns
            var barberShopDropdown = document.getElementById('barber_shop_id');
            var serviceDropdown = document.getElementById('service_id');

            // Store the original service options HTML for later use
            var originalServiceOptions = serviceDropdown.innerHTML;

            // Add an event listener to the barber shop dropdown
            barberShopDropdown.addEventListener('change', function () {
                // Get the selected barber shop ID
                var selectedBarberShopId = barberShopDropdown.value;

                // Filter the service options based on the selected barber shop
                if (selectedBarberShopId) {
                    // Reset the service dropdown to its original options
                    serviceDropdown.innerHTML = originalServiceOptions;

                    // Show only the options related to the selected barber shop
                    var options = serviceDropdown.querySelectorAll('option');
                    options.forEach(function (option) {
                        var associatedBarberShopId = option.getAttribute('data-barbershop');
                        if (associatedBarberShopId !== selectedBarberShopId) {
                            option.remove();
                        }
                    });

                    // Enable the service dropdown
                    serviceDropdown.disabled = false;
                } else {
                    // If no barber shop is selected, reset the service dropdown
                    serviceDropdown.innerHTML = originalServiceOptions;
                    // Disable the service dropdown
                    serviceDropdown.disabled = true;
                }
            });
        });
    </script>
</body>
</html>