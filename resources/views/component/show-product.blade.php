<div id="info-product">
    <h1 class="text-4xl font-bold text-gray-800">{{ $product->name }}</h1>
    <h4>${{ $product->price }}</h4>
    <div>
        <ul>
            <li>
                <strong>Color :</strong>
                <span>{{ $product->color }}</span>
            </li>
            <li>
                <strong>Brand :</strong>
                <span>{{ $product->brand }}</span>
            </li>
        </ul>
    </div>
</div>
<form id="form-size" action="/cart/add/{{ $product->id }}" method="post">
    @csrf
    <div id="size-picker">
        <div><Strong>Size</Strong> : {{ $product->size }}</div>
        <input type="hidden" name="size" value="{{ $product->size }}">
    </div>
    <button class="bg-black text-white hover:bg-gray-500" type="submit">Add to cart</button>
</form>
<div id="product-des">
    <p>
        {{ $product->description }}
    </p>
</div>
