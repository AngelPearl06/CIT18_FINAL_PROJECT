<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>desserts List</title>
</head>
<body>
    <h1>Desserts Menu</h1>

    @if (session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    @if (session('error'))
        <p style="color: red;">{{ session('error') }}</p>
    @endif

    <table border="1">
        <thead>
            <tr>
                <th>Name</th>
                <th>Category</th>
                <th>Description</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($dessertstore as $item)
                <tr>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->category }}</td>
                    <td>{{ $item->description }}</td>
                    <td>{{ $item->quantity }}</td>
                    <td>${{ number_format($item->price, 2) }}</td>
                    <td>
                        <form action="{{ str_replace(':8000', '', config('app.url')) . '/desserts/' . $item->id }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                        <a href="{{ str_replace(':8000', '', config('app.url')) . '/desserts/' . $item->id }}">Edit Item</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <a href="{{ str_replace(':8000', '', config('app.url')) . '/desserts/create' }}">Add New Item</a>
</body>
</html>