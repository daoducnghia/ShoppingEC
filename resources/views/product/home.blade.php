<!DOCTYPE html>
<html lang="en">

<head>
    <script src="https://cdn.tailwindcss.com"></script>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Home</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/home.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/navigator.css') }}" />

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" rel="stylesheet"
        type="text/css" />
</head>

<body>

    <!-- Navbar -->
    @include('component.navigator')
    <!-- Main -->

    <main class="content">
        <div class="content1">
            <div id="content1" class="content-slide">
                <div class="mySlides fade">
                    <div class="numbertext">1 / 3</div>
                    <img src="{{ asset('images/img_mountains_wide.jpg') }}" style="width: 100%" />
                </div>

                <div class="mySlides fade">
                    <div class="numbertext">2 / 3</div>
                    <img src="{{ asset('images/img_nature_wide.jpg') }}" style="width: 100%" />
                </div>

                <div class="mySlides fade">
                    <div class="numbertext">3 / 3</div>
                    <img src="{{ asset('images/img_snow_wide.jpg') }}" style="width: 100%" />
                </div>

                <!-- Next and previous buttons -->
                <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                <a class="next" onclick="plusSlides(1)">&#10095;</a>
            </div>
            <br />

            <div style="text-align: center">
                <span class="dot"></span>
                <span class="dot"></span>
                <span class="dot"></span>
            </div>
        </div>
        <div id="content2">
            <div class="cate">
                <div class="cate-img">
                    <img src="{{ asset('images/men-shoes.jpeg') }}" alt="" style="width: 100%" />
                </div>
                <h3>MEN SHOE COLLECTION</h3>
                <div class="cate-p">
                    <p>
                        Constructed from luxury nylons, leathers, and custom hardware,
                        featuring sport details such as hidden breathing vents,
                        waterproof + antimicrobial linings, and more.
                    </p>
                </div>
                <br>
                <a href="/product/men">SHOP MEN</a>
            </div>
            <div class="cate">
                <div class="cate-img">
                    <img src="{{ asset('images/women-shoes.jpeg') }}" alt="" style="width: 100%" />
                </div>
                <h3>WOMEN SHOE COLLECTION</h3>
                <div class="cate-p">
                    <p>
                        Constructed from luxury nylons, leathers, and custom hardware,
                        featuring sport details such as hidden breathing vents,
                        waterproof + antimicrobial linings, and more.
                    </p>
                </div>
                <br>
                <a href="/product/women">SHOP WOMEN</a>
            </div>
            <div class="cate">
                <div class="cate-img">
                    <img src="{{ asset('images/kid-shoes.jpeg') }}" alt="" style="width: 100%" />
                </div>
                <h3>KIDS SHOE COLLECTION</h3>
                <div class="cate-p">
                    <p>
                        Constructed from luxury nylons, leathers, and custom hardware,
                        featuring sport details such as hidden breathing vents,
                        waterproof + antimicrobial linings, and more.
                    </p>
                </div>
                <br>
                <a href="/product/kids">SHOP KIDS</a>
            </div>
        </div>
        <div id="content3">
            <p id="title">FEATURED PRODUCTS</p>
            <div class="grid-product">
                @if (count($products) == 0)
                    <p>No product found</p>
                @endif
                @foreach ($products as $product)
                    <div class="prd-item">

                        <div>
                            <a href="/product/ {{ $product->id }}">
                                <img src=" {{ $product->image ? asset('storage/' . $listing->image) : asset('images/plv7632-Green-single.png') }}"
                                    alt="" style="width: 100%" />
                            </a>
                        </div>
                        <div class="prd-name">
                            <a href="/product/ {{ $product->id }}">
                                <span>{{ $product->name }}</span>
                            </a>
                        </div>
                        <div class="prd-price">
                            <span>${{ $product->price }}</span>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </main>

    <!-- Footer -->
    @include('component.footer')

</body>
<script>
    let slideIndex = 0;
    showSlides();

    function showSlides() {
        let i;
        let slides = document.getElementsByClassName("mySlides");
        let dots = document.getElementsByClassName("dot");
        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
        }
        slideIndex++;
        if (slideIndex > slides.length) {
            slideIndex = 1;
        }
        for (i = 0; i < dots.length; i++) {
            dots[i].className = dots[i].className.replace(" active", "");
        }
        slides[slideIndex - 1].style.display = "block";
        dots[slideIndex - 1].className += " active";
        setTimeout(showSlides, 5000);
    }
</script>

</html>
