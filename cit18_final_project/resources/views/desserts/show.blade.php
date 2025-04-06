<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="UTF-8">

    <title>Dessert Menu</title>

</head>

<body>

    <h1>Dessert Menu: {{ $dessert->name }}</h1>


    <p>Quantity: {{ $dessert->quantity }}</p>

    <p>Price: ${{ $dessert->price }}</p>



    <a href="{{ route('desserts.index') }}">Back to Menu</a>

</body>

</html>