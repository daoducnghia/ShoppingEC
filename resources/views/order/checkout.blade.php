<!DOCTYPE html>
<html lang="en">

<head>
    <script src="https://cdn.tailwindcss.com"></script>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Checkout</title>
    <link rel="stylesheet" href="../css/navigator.css" />
    <link rel="stylesheet" href="../css/checkout.css" />
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
                    <a href="home.html">Home</a>
                </span>
                /
                <span> Checkout </span>
            </div>
            <div id="main-content">
                <div id="account-info">
                    <div id="contact">
                        <span>Contact</span>
                        <span>{{ auth()->user()->email }}</span>
                    </div>

                    <form id="shipping-add" action="/ckeckout/order" method="POST">
                        @csrf
                        <h3 class="text-2xl font-medium">Shipping address</h3>
                        <div id="fullname" class="input-text">
                            <label for="">Fullname</label>
                            <input type="text" name="fullname" placeholder="Fullname" />
                        </div>
                        {{-- @error('fullname')
                            <p class="error">{{ $message }}</p>
                        @enderror --}}
                        <div id="telephone" class="input-text">
                            <label for="">Telephone</label>
                            <input type="text" name="telephone" placeholder="Telephone" />
                        </div>
                        {{-- @error('telephone')
                            <p class="error">{{ $message }}</p>
                        @enderror --}}
                        <div id="address" class="input-text">
                            <label for="">Address</label>
                            <input type="text" name="address" placeholder="Address" />
                        </div>
                        @error('address')
                            <p class="error">{{ $message }}</p>
                        @enderror
                        <div id="country" class="input-text">
                            <label for="">Country</label>
                            <input type="text" name="country" placeholder="Country" />
                        </div>
                        @error('country')
                            <p class="error">{{ $message }}</p>
                        @enderror
                        <div id="province" class="input-text">
                            <label for="">Province</label>
                            <input type="text" name="province" placeholder="Province" />
                        </div>
                        @error('province')
                            <p class="error">{{ $message }}</p>
                        @enderror
                        @php
                            $total = 0;
                            foreach ($products as $product) {
                                $total += $product[0]->price;
                        } @endphp
                        <input type="hidden" name="total" value="{{ $total + 8 }}">

                        <input type="hidden" name="date" value="{{ date('Y-m-d H:i:s') }}">
                        <h3 class="text-2xl font-medium">Shipping Method</h3>

                        <input type="radio" id="" name="ShippingMethod" value="COD" checked />
                        <label for="option1">Cash on delivery (COD)</label>

                        <button class="block mt-4 px-4 py-2 text-white bg-black rounded hover:bg-black"
                            type="submit">CHECKOUT</button>
                    </form>
                </div>
                <div id="cart-info">
                    <div id="products">
                        <table id="item">
                            <tbody>
                                @foreach ($products as $product)
                                    <tr>
                                        <td>
                                            <div class="item-img">
                                                <img src="{{ $product[0]->image ? asset('storage/' . $product[0]->image) : asset('images/plv7632-Green-single.png') }}"
                                                    alt="" style="width: 100%" />
                                            </div>
                                        </td>
                                        <td>
                                            <div class="item-detail">
                                                <div>
                                                    <span>{{ $product[0]->name }}</span>
                                                </div>
                                                <div>
                                                    <ul>
                                                        <li>Size: {{ $product[0]->size }}</li>
                                                        <li>Color: {{ $product[0]->color }}</li>
                                                        <li>Type: {{ ucfirst($product[0]->category) }}</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="item-price">
                                                <span>${{ $product[0]->price }}</span>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div id="total">
                        <div class="summary-row">
                            <span>Sub total</span>
                            <div>
                                <div>{{ count($products) }} items</div>
                                <div>$ @php
                                    $total = 0;
                                    foreach ($products as $product) {
                                        $total += $product[0]->price;
                                    }
                                @endphp
                                    {{ $total }}</div>
                            </div>
                        </div>

                        <div class="summary-row">
                            <span>Tax</span>
                            <div>
                                <div></div>
                                <div>$8.00</div>
                            </div>
                        </div>
                        <div class="summary-row">
                            <span>Discount</span>
                            <div>
                                <div></div>
                                <div>$0.00</div>
                            </div>
                        </div>
                        <hr />
                        <div class="summary-row">
                            <strong>Total</strong>
                            <div>
                                <div></div>
                                <div>${{ $total + 8 }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        <!-- Footer -->
        @include('component.footer')
    </div>
</body>

</html>
