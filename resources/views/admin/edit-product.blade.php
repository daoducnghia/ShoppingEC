<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin</title>
    <link rel="stylesheet" href="/css/edit-product.css" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" rel="stylesheet"
        type="text/css" />
</head>

<body>
    <div class="wrapper">
        <!-- Navbar -->

        <div class="navbar">
            <a href=""><img src="{{ asset('images/logo-nobg.png') }}" alt="" style="width: 30%" /></a>
            <br />
            <a href="/admin">Home</a>
            <a href="/admin/product"><strong>Product</strong></a>
            <a href="/admin/user">User</a>
            <form class="inline logout" action="/logout" method="POST">
                @csrf
                <button type="submit">
                    Logout
                </button>
            </form>
        </div>

        <!-- Main -->
        <main class="content">
            <h1>EDIT PRODUCT</h1>
            <form class="form-add" action="/admin/edited/product/{{ $product->id }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="clm-left">
                    <div>
                        <label for="">Name</label>
                        <input type="text" id="name" name="name" placeholder="Name product"
                            value="{{ $product->name }}" />
                    </div>
                    @error('name')
                        <p class="error">{{ $message }}</p>
                    @enderror
                    <div>
                        <label for="">Price $</label>
                        <input type="text" id="price" name="price" placeholder="Price product"
                            value="{{ $product->price }}" />
                    </div>
                    @error('price')
                        <p class="error">{{ $message }}</p>
                    @enderror
                    <div>
                        <label for="">Color</label>
                        <input type="text" id="color" name="color" placeholder="Color product"
                            value="{{ $product->color }}" />
                    </div>
                    @error('color')
                        <p class="error">{{ $message }}</p>
                    @enderror
                    <div>
                        <label for="">Brand</label>
                        <input type="text" id="brand" name="brand" placeholder="Brand"
                            value="{{ $product->brand }}" />
                    </div>
                    @error('brand')
                        <p class="error">{{ $message }}</p>
                    @enderror
                    <div>
                        <label for="">Size</label>
                        <select name="size" id="size">
                            <option value="S" {{ $product->size == 'S' ? 'selected' : '' }}>S</option>
                            <option value="M" {{ $product->size == 'M' ? 'selected' : '' }}>M</option>
                            <option value="L" {{ $product->size == 'L' ? 'selected' : '' }}>L</option>
                            <option value="XL" {{ $product->size == 'XL' ? 'selected' : '' }}>XL</option>
                            <option value="XXL" {{ $product->size == 'XXL' ? 'selected' : '' }}>XXL</option>
                        </select>
                    </div>
                    @error('size')
                        <p class="error">{{ $message }}</p>
                    @enderror
                </div>
                <div class="clm-right">
                    <div>
                        <label for="">Type</label>
                        <select name="category" id="category">
                            <option value="men" {{ $product->category == 'men' ? 'selected' : '' }}>Men</option>
                            <option value="women" {{ $product->category == 'women' ? 'selected' : '' }}>Women</option>
                            <option value="kids" {{ $product->category == 'kids' ? 'selected' : '' }}>Kids</option>
                        </select>
                    </div>
                    @error('category')
                        <p class="error">{{ $message }}</p>
                    @enderror
                    <div>
                        <label for="">Image</label>
                        <input type="file" name="image" id="image">
                        <img class="w-48 mr-6 mb-6"
                            src="{{ $product->image ? asset('storage/' . $product->image) : asset('/images/plv7632-Green-single.png') }}"
                            alt="" style="width: 30%; display:block;" />
                    </div>
                    @error('image')
                        <p class="error">{{ $message }}</p>
                    @enderror
                    <div>
                        <label for="">Description</label>
                        <textarea name="description" id="description" cols="50" rows="10" style="display: block">{{ $product->description }}</textarea>
                    </div>
                    @error('description')
                        <p class="error">{{ $message }}</p>
                    @enderror
                    <div class="btn-submit">
                        <button type="submit">Update Product</button>
                    </div>
                </div>
            </form>
        </main>
        <!-- Footer -->
    </div>
</body>

</html>
