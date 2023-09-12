<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin</title>
    <link rel="stylesheet" href="/css/edit-product.css" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" rel="stylesheet"
        type="text/css" />
    <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
</head>

<body>
    <div class="horizontal-"></div>
    <div class="wrapper">
        <!-- Navbar -->

        <div class="navbar">
            <a href=""><img src="{{ asset('images/logo-nobg.png') }}" alt="" style="width: 30%" /></a>
            <br />
            <a href="/admin">Home</a>
            <a href="/admin/product">Product</a>
            <a href="/admin/user"><strong>User</strong></a>
            <form class="inline logout" action="/logout" method="POST">
                @csrf
                <button type="submit">
                    Logout
                </button>
            </form>
        </div>

        <!-- Main -->
        <main class="content">
            <h1>EDIT USER</h1>
            <form action="/admin/user/edited/{{ $user->id }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div>
                    <label for="">Name</label>
                    <input type="text" name='name' id="name" placeholder="Name"
                        value="{{ $user->name }}" />
                </div>
                @error('name')
                    <p class="error">{{ $message }}</p>
                @enderror

                <div>
                    <label for="">Email</label>
                    <input type="text" name="email" id="email" placeholder="Email"
                        value="{{ $user->email }}" />
                </div>
                @error('email')
                    <p class="error">{{ $message }}</p>
                @enderror

                <div>
                    <label for="">Password</label>
                    <input type="text" name="password" id="password" placeholder="Password" />
                </div>
                @error('password')
                    <p class="error">{{ $message }}</p>
                @enderror

                <div class="btn-submit">
                    <button type="submit">Update User</button>
                </div>
            </form>
        </main>
    </div>
</body>

</html>
