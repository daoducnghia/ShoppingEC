<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin</title>
    <link rel="stylesheet" href="/css/ad-product.css" />
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
        <main class="content scrollable">
            <h1>PRODUCT</h1>
            <div class="add-product ">
                <a href="/admin/add/product">Add product</a>
            </div>
            <div class="listing-product">
                <table>
                    <thead>
                        <tr>
                            <td>Name</td>
                            <td>Quantity</td>
                            <td>Price</td>
                            <td>Sold</td>
                            <td></td>
                            <td></td>
                        </tr>
                    </thead>
                    <tbody class="">
                        @foreach ($products as $product)
                            <tr>
                                <td>
                                    <div>{{ $product->name }}</div>
                                </td>
                                <td>1000</td>
                                <td>${{ $product->price }}</td>
                                <td>100</td>
                                <td>
                                    <a href="/admin/edit/product/{{ $product->id }}"><i
                                            class="fa-solid fa-pencil"></i></a>
                                </td>
                                <td>
                                    <form action="/admin/delete/product/{{ $product->id }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button>
                                            <i class="fa-solid fa-trash-can"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </main>
    </div>
</body>

</html>
