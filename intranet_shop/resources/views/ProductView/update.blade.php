@foreach ($products as $product)
    <form 
        action="{{ route('products.update', $product->id) }}" 
        method="POST"
        style="border:1px solid #ccc; padding:15px; margin-bottom:15px; width:300px;"
    >
        @csrf
        @method('PUT')

        <h3>
            <input 
                type="text" 
                name="name" 
                value="{{ $product->name }}" 
                style="width:100%;"
            >
        </h3>

        <p>
            Price:
            <input 
                type="number" 
                name="price" 
                value="{{ $product->price }}" 
                style="width:100%;"
            >
        </p>

        <p>
            Premium:
            <select name="is_premium">
                <option value="0" {{ !$product->is_premium ? 'selected' : '' }}>No</option>
                <option value="1" {{ $product->is_premium ? 'selected' : '' }}>Yes</option>
            </select>
        </p>

        <p>
            Created at:<br>
            {{ $product->created_at->format('Y-m-d H:i:s') }}
        </p>

        <button type="submit">
            Update
        </button>
    </form>
@endforeach
