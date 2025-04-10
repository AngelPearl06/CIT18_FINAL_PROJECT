<!-- resources/views/desserts/show.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>desserts Item</title>
</head>
<body>
    <h1>desserts Item: {{ $dessertstores->name }}</h1>

    <p><strong>Category:</strong> {{ $dessertstores->category }}</p>
    <p><strong>Description:</strong> {{ $dessertstores->description ?? 'No description provided' }}</p>
    <p><strong>Quantity:</strong> {{ $dessertstores->quantity }}</p>
    <p><strong>Price:</strong> ${{ number_format($dessertstores->price, 2) }}</p>

    <a href="{{ route('desserts.index') }}">Back to desserts</a>
</body>
</html>