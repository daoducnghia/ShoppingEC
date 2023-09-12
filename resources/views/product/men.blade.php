<!DOCTYPE html>
<html lang="en">

<head>
    <script src="https://cdn.tailwindcss.com"></script>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Men</title>
    <link rel="stylesheet" href="{{ asset('/css/product.css') }}" />
    <link rel="stylesheet" href="{{ asset('/css/navigator.css') }}" />
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
                <span> Men </span>
            </div>
            <div class="title">
                <span>MEN</span>
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
                                    <form id="form-filter-drop" action="/product/men/filter-drop" method="GET">
                                        @csrf
                                        <select class="border border-solid border-gray-500" name="drop-filter"
                                            id="drop-filter">
                                            <option selected value>Please select</option>
                                            <option value="best-seller">Best seller</option>
                                            <option value="pricehtol">Price high to low</option>
                                            <option value="priceltoh">Price low to high</option>
                                        </select>
                                    </form>
                                    <script>
                                        document.getElementById('drop-filter').addEventListener('change', function() {
                                            document.getElementById('form-filter-drop').submit();
                                        });
                                    </script>
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
                                @if ($product->category == 'men')
                                    <div class="listing-item">
                                        <div>
                                            <a href="/product/ {{ $product->id }}">
                                                <img src="{{ $product->image ? asset('storage/' . $product->image) : asset('images/plv7632-Green-single.png') }}"
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
                                @endif
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
