<!DOCTYPE html>
<html lang="en">

<head>
    <script src="https://cdn.tailwindcss.com"></script>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Search</title>
    <link rel="stylesheet" href="../css/product.css" />
    <link rel="stylesheet" href="../css/navigator.css" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" rel="stylesheet"
        type="text/css" />
</head>

<body>
    <div class="wrapper">
        <!-- Navbar -->
        @include('component.navigator')

        <!-- Main -->
        <main class="content">
            <div class="link-page">
                <span>
                    <a href="/">Home</a>
                </span>
                /
                <span> Search </span>
            </div>
            <div class="title">
                <span>Search for "{{ request('search') }}"</span>
            </div>
            <div class="main-content">
                <div class="filter">
                    <div class="filter-heading">
                        <span>SHOP BY</span>
                    </div>
                    @include('component.filter-price')
                    @include('component.filter-color')
                    @include('component.filter-size')
                    @include('component.filter-brand')
                </div>
                <div class="product">
                    <div class="sorting-dropdown align-center">
                        <div id="dropdown-name">
                            <span>Sort By:</span>
                        </div>
                        <div style="width: 160px" id="dropdown-filter">
                            <div>
                                <div>
                                    <select name="drop-filter" id="">
                                        <option selected value>Please select</option>
                                        <option valu="name">Best seller</option>
                                        <option value="price">Price high to low</option>
                                        <option value="price">Price low to high</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="main-product">
                        <div class="grid-product">
                            @if (count($products) == 0)
                                <p>No product found</p>
                            @endif
                            @foreach ($products as $product)
                                <div class="listing-item">
                                    <div>
                                        <a href="/product/ {{ $product->id }}">
                                            <img src="{{ $product->image ? asset('storage/' . $listing->image) : asset('images/plv7632-Green-single.png') }}"
                                                alt="" style="width: 100%" />
                                        </a>
                                    </div>
                                    <div>
                                        <a href="/product/ {{ $product->id }}">
                                            <span>{{ $product->name }}</span>
                                        </a>
                                    </div>
                                    <div class="item-price">
                                        <span>${{ $product->price }}</span>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div>
                        {{ $products->links() }}
                    </div>
                </div>
            </div>
        </main>

        <!-- Footer -->
        @include('component.footer')
    </div>
</body>

</html>
