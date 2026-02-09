@foreach ($products as $product)
    <div style="border:1px solid #ca1212; padding:10px; margin-bottom:10px;">

        {{-- UPDATE FORM --}}
        <form action="{{ route('products.update', $product->id) }}" method="POST">
            @csrf
            @method('PUT')

            <h4>
                <input name="name" value="{{ $product->name }}">
            </h4>

            <p>
                Price:
                <input type="number" name="price" value="{{ $product->price }}">
            </p>

            <p>
                Premium:
                <select name="is_premium">
                    <option value="0" {{ !$product->is_premium ? 'selected' : '' }}>No</option>
                    <option value="1" {{ $product->is_premium ? 'selected' : '' }}>Yes</option>
                </select>
            </p>

            <button type="submit">Update</button>
        </form>

        {{-- DELETE FORM --}}
        <form action="{{ route('products.destroy', $product->id) }}" method="POST"
              onsubmit="return confirm('Are you sure you want to delete this product?');"
              style="margin-top:5px;">
            @csrf
            @method('DELETE')

            <button type="submit" style="color:red;">
                Delete
            </button>
        </form>

        <p>Created at: {{ $product->created_at }}</p>
    </div>
@endforeach
