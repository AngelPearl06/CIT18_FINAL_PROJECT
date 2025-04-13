<!-- resources/views/desserts/edit.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit desserts Item</title>
</head>
<body>
    <h1>Edit Item: {{ $dessertstores->name }}</h1>

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

    <form method="POST" action="{{ str_replace(':8000', '', config('app.url')) . '/desserts' . $dessertstores->id }}">
        @csrf
        @method('PUT')

        <label for="name">Name:</label>
        <input type="text" name="name" value="{{ old('name', $dessertstores->name) }}" required>

        <label for="category">Category:</label>
        <select name="category" required>
            <option value="" disabled selected>Select</option>
            <option value="Cakes" {{ old('category', $dessertstores->category) == 'Cakes' ? 'selected' : '' }}>Cakes</option>
            <option value="Pies" {{ old('category', $dessertstores->category) == 'Pies' ? 'selected' : '' }}>Pies</option>
            <option value="Cookies" {{ old('category', $dessertstores->category) == 'Cookies' ? 'selected' : '' }}>Cookies</option>
            <option value="Breads" {{ old('category', $dessertstores->category) == 'Breads' ? 'selected' : '' }}>Breads</option>
        </select>

        <label for="description">Description:</label>
        <textarea name="description">{{ old('description', $dessertstores->description) }}</textarea>

        <label for="quantity">Quantity:</label>
        <input type="number" name="quantity" value="{{ old('quantity', $dessertstores->quantity) }}" required>

        <label for="price">Price:</label>
        <input type="number" step="0.01" name="price" value="{{ old('price', $dessertstores->price) }}" required>

        <button type="submit">Update Item</button>
    </form>

    <a href="{{ str_replace(':8000', '', config('app.url')) . '/desserts' }}">Back to desserts</a>
</body>
</html>