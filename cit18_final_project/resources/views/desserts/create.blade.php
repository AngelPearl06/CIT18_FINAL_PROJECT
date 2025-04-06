<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Create Dessert</title>
</head>

<body>
    <h1>Create a New Dessert</h1>

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

    <form method="POST" action="{{ route('dessert.store') }}">
        @csrf

        <label for="name">Name:</label>
        <input type="text" name="name" value="{{ old('name') }}" required>

        <label for="description">Description:</label>
        <textarea name="description" required> {{ old('description') }}</textarea>

        <label for="price">Price:</label>
        <input type="number" name="price" value="{{ old('price') }}" required>

        <!-- Category Selection -->
        <label for="category_id">Category:</label>
        <select name="category_id" required>
            <option value="">Select Category</option>
            <option value="1" {{ old('category_id') == 1 ? 'selected' : '' }}>Cake</option>
            <option value="2" {{ old('category_id') == 2 ? 'selected' : '' }}>Pies</option>
            <option value="3" {{ old('category_id') == 3 ? 'selected' : '' }}>Cookies</option>
            <option value="4" {{ old('category_id') == 4 ? 'selected' : '' }}>Custards</option>
        </select>

        <button type="submit">Create Dessert</button>
    </form>

    <a href="{{ route('desserts.index') }}">Back to Menu</a>

</body>

</html>
