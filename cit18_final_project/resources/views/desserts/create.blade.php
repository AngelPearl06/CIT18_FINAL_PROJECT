<!-- resources/views/desserts/create.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create desserts Item</title>
</head>
<body>
    <h1>Create a New desserts Item</h1>

    <!-- Display validation errors if any -->
    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ str_replace(':8000', '', config('app.url')) . '/desserts' }}">
        @csrf

        <label for="name">Name:</label>
        <input type="text" name="name" value="{{ old('name') }}" required>

        <label for="category">Category:</label>
        <select name="category" required>
            <option value="" disabled selected>Select</option>
            <option value="Cakes" {{ old('category') == 'Cakes' ? 'selected' : '' }}>Cakes</option>
            <option value="Pies" {{ old('category') == 'Pies' ? 'selected' : '' }}>Pies</option>
            <option value="Cookies" {{ old('category') == 'Cookies' ? 'selected' : '' }}>Cookies</option>
            <option value="Breads" {{ old('category') == 'Breads' ? 'selected' : '' }}>Breads</option>
        </select>

        <label for="description">Description:</label>
        <textarea name="description">{{ old('description') }}</textarea>

        <label for="quantity">Quantity:</label>
        <input type="number" name="quantity" value="{{ old('quantity') }}" required>

        <label for="price">Price:</label>
        <input type="number" step="0.01" name="price" value="{{ old('price') }}" required>

        <button type="submit">Create Item</button>
    </form>

    <a href="{{ str_replace(':8000', '', config('app.url')) . '/desserts' }}">Back to desserts</a>
</body>
</html>