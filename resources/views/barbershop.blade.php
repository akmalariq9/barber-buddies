<!DOCTYPE html>
<html>
<head>
    <title>Barbershop</title>
</head>
<body>

    <h1>Daftar Pelanggan</h1>

    <table border="1">
        <thead>
            <tr>
                <th>id</th>
                <th>name</th>
                <th>address</th>
                <th>phone_number</th>
                <th>operating_hours</th>
                <th>description</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pelanggan as $p)
            <tr>
                <td>{{ $p->id }}</td>
                <td>{{ $p->name }}</td>
                <td>{{ $p->address }}</td>
                <td>{{ $p->phone_number }}</td>
                <td>{{ $p->operating_hours }}</td>
                <td>{{ $p->description }}</td>
                <!-- <td>{{ $p->umur }}</td> -->
            </tr>
            @endforeach
        </tbody>
    </table>

    <h1>Daftar Capster</h1>

    <table border="1">
        <thead>
            <tr>
                <th>id</th>
                <th>name</th>
                <th>phone_number</th>
                <th>description</th>
                <td>barber shop</td>
            </tr>
        </thead>
        <tbody>
            @foreach($capster as $c)
            <tr>
                <td>{{ $c->id }}</td>
                <td>{{ $c->name }}</td>
                <td>{{ $c->phone_number }}</td>
                <td>{{ $c->description }}</td>
                <td>{{ $c->barberShop->name }}</td>
                <!-- <td>{{ $p->umur }}</td> -->
            </tr>
            @endforeach
        </tbody>
    </table>

</body>
</html>
