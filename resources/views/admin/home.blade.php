<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin</title>
    <link rel="stylesheet" href="/css/ad-home.css" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" rel="stylesheet"
        type="text/css" />
</head>

<body>
    <div class="horizontal-"></div>
    <div class="wrapper">
        <!-- Navbar -->
        <div class="navbar">
            <a href=""><img src="{{ asset('images/logo-nobg.png') }}" alt="" style="width: 30%" /></a>
            <br />
            <a href="/admin"><strong>Home</strong></a>
            <a href="/admin/product">Product</a>
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
            <div>
                <h1>ADMIN HOME PAGE</h1>
            </div>
        </main>
    </div>
</body>

</html>
