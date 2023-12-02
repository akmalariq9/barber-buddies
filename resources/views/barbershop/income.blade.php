<!-- resources/views/revenues/index.blade.php -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Monthly Revenue</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <!-- Include any other CSS styles if needed -->
</head>

<body class="bg-gray-100">

    <div class="container mx-auto p-8 bg-white shadow-lg rounded-md mt-8">
        <h1 class="text-3xl font-semibold mb-6">Monthly Revenue</h1>

        <p class="text-lg mb-4">
            Total Revenue for {{ now()->format('F Y') }}: {{ number_format($revenue, 2) }}
        </p>
        
        <a href="/dashboard" class="text-blue-500 hover:underline">Back to Dashboard</a>
    </div>
</body>

</html>
