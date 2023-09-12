<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login</title>
    <link rel="stylesheet" href="../css/login.css" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" rel="stylesheet"
        type="text/css" />
</head>

<body>
    <!-- Navbar -->
    <nav class="topnav">
        <div class="logo">
            <a href="/">
                <img src="{{ asset('images/logo-nobg.png') }}" alt="" />
            </a>
        </div>
        <div class="menu">
            <ul>
                <li><a href="/product/men">Men</a></li>
                <li><a href="/product/women">Women</a></li>
                <li><a href="/product/kids">Kids</a></li>
            </ul>
        </div>
        <div class="func">
            <ul>
                <li>
                    <a href="/cart">
                        <i class="fa-solid fa-bag-shopping fa-lg"></i>
                    </a>
                </li>
                <li>
                    <a href="/login">
                        <i class="fa-regular fa-user fa-lg"></i>
                    </a>
                </li>
            </ul>
        </div>
    </nav>
    <hr />
    <!-- Main -->
    <main class="content">
        <div class="link-page">
            <span>
                <a href="/">Home</a>
            </span>
            /
            <span> Login </span>
        </div>
        <div class="main-content">
            <div class="box">
                <div class="title">Login</div>
                <form class="form-login" action="/user/authenticate" method="POST">
                    @csrf
                    <div class="item">
                        <input type="text" name="email" id="email" placeholder="Email" />
                    </div>
                    @error('email')
                        <p class="error">{{ $message }}</p>
                    @enderror
                    <div class="item">
                        <input type="password" name="password" id="password" placeholder="Password" />
                    </div>
                    @error('password')
                        <p class="error">{{ $message }}</p>
                    @enderror
                    <button type="submit">SIGN IN</button>
                </form>
                <div class="bottom">
                    <div class="register">
                        <a href="/register">Create an account</a>
                    </div>
                    <div class="fogot">
                        <a href="/fogot">Forgot password?</a>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <!-- Footer -->
    @include('component.footer')
</body>

</html>
