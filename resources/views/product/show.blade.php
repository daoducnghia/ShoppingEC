<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Men | Nike air zoom pegasus 35</title>
    <link rel="stylesheet" href="../css/detail-product.css" />
    <link rel="stylesheet" href="../css/navigator.css" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" rel="stylesheet"
        type="text/css" />
    <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>

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
                /
                <span>{{ $product->name }}</span>
            </div>
            <div id="main-content">
                <div id="product-image">
                    <div id="main-img">
                        <img src="{{ $product->image ? asset('storage/' . $product->image) : asset('images/plv7632-Green-single.png') }}"
                            alt="" />
                    </div>
                    <div id="small-img">
                        <img src="../asset/image/plv7632-Green-single.png" alt="" />
                        <img src="../asset/image/plv7632-Green-single.png" alt="" />
                        <img src="../asset/image/plv7632-Green-single.png" alt="" />
                    </div>
                </div>
                <div id="product-detail">
                    @include('component.show-product')
                </div>
            </div>
        </main>
        <!-- Footer -->
        @include('component.footer')
    </div>
</body>

</html>
