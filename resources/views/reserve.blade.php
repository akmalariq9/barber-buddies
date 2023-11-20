<!DOCTYPE html>
<html>
<head>
    <title>Form Reservasi</title>
</head>
<body>

    <h1>Form Reservasi</h1>

    <form action="{{ route('reservasi.store') }}" method="POST">
        @csrf

        <label for="nama">Nama:</label>
        <input type="text" name="nama" required>

        <label for="barbershop">Barber Shop:</label>
        <select name="barbershop" id="barbershop" required>
            <option value="" disabled selected>Pilih Barber Shop</option>
            @foreach($barberShops as $barberShop)
                <option value="{{ $barberShop->id }}">{{ $barberShop->name }}</option>
            @endforeach
        </select>

        <label for="capster">Capster:</label>
        <select name="capster" id="capster" required>
            <!-- Options will be dynamically populated based on the selected barber shop using JavaScript -->
        </select>

        <button type="submit">Reservasi</button>
    </form>

    <script>
        // AJAX to populate capster dropdown based on selected barber shop
        document.getElementById('barbershop').addEventListener('change', function() {
            var selectedBarberShopId = this.value;

            // Fetch capsters based on selected barber shop
            fetch('/get-capsters/' + selectedBarberShopId)
                .then(response => response.json())
                .then(data => {
                    var capsterDropdown = document.getElementById('capster');
                    capsterDropdown.innerHTML = '<option value="" disabled selected>Pilih Capster</option>';

                    data.capsters.forEach(function(capster) {
                        var option = document.createElement('option');
                        option.value = capster.id;
                        option.text = capster.name;
                        capsterDropdown.add(option);
                    });
                });
        });
    </script>

</body>
</html>
