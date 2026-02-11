<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Product</title>
</head>
<body>

@if ($errors->any())
    <div style="color:red; border:1px solid red; padding:10px; width:300px; margin-bottom:10px;">
        <ul style="margin:0; padding-left:20px;">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form 
    action="{{ route('products.store') }}" 
    method="POST"
    style="border:1px solid #ccc; padding:15px; margin-bottom:15px; width:300px;"
>
    @csrf

    <h3>
        <input 
            type="text" 
            name="name" 
            value="{{ old('name') }}"
            placeholder="Product name"
            style="width:100%;"
            required
        >
    </h3>

    <p>
        Price:
        <input 
            type="number" 
            name="price" 
            value="{{ old('price') }}"
            placeholder="Price"
            style="width:100%;"
            required
        >
    </p>

    <p>
        Premium:
        <select name="is_premium">
            <option value="0" {{ old('is_premium') == "0" ? 'selected' : '' }}>No</option>
            <option value="1" {{ old('is_premium') == "1" ? 'selected' : '' }}>Yes</option>
        </select>
    </p>

    <button type="submit">
        Add Product
    </button>
</form>

</body>
</html>
