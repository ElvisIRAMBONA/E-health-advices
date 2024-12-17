<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Health</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body>
    <form action="{{ route('products.store') }}" method="POST">
        @csrf
        <input type="text" name="namep" placeholder="Product Name" required>
        <textarea name="description" placeholder="Product Description"></textarea>
        <input type="number" name="price" placeholder="Product Price" step="0.01" required>

        <!-- Champ category_id -->
        <select name="category_id" required>
            <option value="">Select Category</option>
            <!-- Remplacez ces valeurs par les catégories disponibles -->
            <option value="1">Hypertension</option>
            <option value="2">Cancer</option>
            <option value="3">Diabetes</option>
        </select>

        <button type="submit">Add product</button>
    </form>
</body>

</html>