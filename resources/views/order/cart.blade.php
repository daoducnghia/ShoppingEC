<!DOCTYPE html>
<html lang="en">

<head>
    <script src="https://cdn.tailwindcss.com"></script>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Cart</title>
    <link rel="stylesheet" href="{{ asset('/css/cart.css') }}" />
    <link rel="stylesheet" href="/css/navigator.css" />
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
                <span> Cart </span>
            </div>
            <div id="main-content">
                <div class="grid">
                    <div class="product-grid">
                        <div class="table-cart">
                            <table class="item-table border-separate">
                                <thead>
                                    <tr>
                                        <td>PRODUCT</td>
                                        <td class="tbl-title">PRICE</td>
                                        <td class="tbl-title">QUANTITY</td>
                                        <td class="tbl-title">TOTAL</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($products as $product)
                                        <tr>
                                            <td>
                                                <div class="product-item">
                                                    <div class="item-img">
                                                        <img src="{{ $product[0]->image ? asset('storage/' . $product[0]->image) : asset('images/plv7632-Green-single.png') }}"
                                                            alt="" style="width: 100%" />
                                                    </div>
                                                    <div class="item-des">
                                                        <a href="">{{ $product[0]->name }}</a>
                                                        <div>
                                                            <ul>
                                                                <li>
                                                                    <span class="att-name">Size:</span>
                                                                    <span>{{ $product[0]->size }}</span>
                                                                </li>
                                                                <li>
                                                                    <span class="att-name">Color:</span>
                                                                    <span>{{ $product[0]->color }}</span>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <div class="remove">
                                                            <form action="/remove/{{ $product[0]->id }}" method="post">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit">
                                                                    <a href="">
                                                                        <span>Remove</span>
                                                                    </a>
                                                                </button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="item-price text-center">
                                                <span>${{ $product[0]->price }}</span>
                                            </td>
                                            <td class="item-quant text-center"><span>1</span></td>
                                            <td class="item-total text-center">
                                                <span>${{ $product[0]->price * 1 }}</span>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="promo-code"></div>
                    </div>
                    <div class="order-summary">
                        <h4 class="text-xl font-bold">Order summary</h4>
                        <div class="sub-total">
                            <div class="sub-title">Sub total</div>
                            <div class="sub-price">$
                                @php
                                    $total = 0;
                                    foreach ($products as $product) {
                                        $total += $product[0]->price;
                                    }
                                @endphp
                                {{ $total }}
                            </div>
                        </div>
                        <div class="mb-4">
                            <p>Taxes and shipping calculated at checkout</p>
                        </div>
                        <a class="mt-4 px-4 py-2 text-white bg-black rounded hover:bg-gray-500"
                            href="/checkout">CHECKOUT</a>
                    </div>
                </div>
            </div>
        </main>
        <!-- Footer -->
        @include('component.footer')
    </div>
</body>

</html>
