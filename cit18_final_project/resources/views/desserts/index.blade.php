<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="UTF-8">

    <title>Dessert Menu</title>

</head>

<body>

    <h1>Dessert List</h1>



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

                <th>Quantity</th>

                <th>Price</th>

                <th>Category</th>

                <th>Description</th>

                <th>Actions</th>

            </tr>

        </thead>

        <tbody>

            @foreach ($desserts as $dessert)

                <tr>

                    <td>{{ $dessert->name }}</td>

                    <td>{{ $dessert->quantity }}</td>

                    <td>${{ number_format($dessert->price, 2) }}</td>
                    
                    <td>{{ $dessert->category->name }}</td>

                    <td>{{ $dessert->description }}</td>

                    <td>

                    <form action="{{ str_replace(':8000', '', config('app.url')) . '/dessert/' . $dessert->id }}" method="POST">



                        @csrf

                        @method('DELETE')

                        <button type="submit" onclick="return confirm('Are you sure?')">Delete</button>

                    </form>

                    <a href="{{ str_replace(':8000', '', config('app.url')) . '/dessert/' . $dessert->id }}">Edit Item</a>

                    </td>

                </tr>

            @endforeach

        </tbody>

    </table>



    <a href="{{ str_replace(':8000', '', config('app.url')) . '/dessert/create' }}">Add New Item</a>

</body>

</html>
