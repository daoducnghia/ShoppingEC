<!DOCTYPE html>
<html lang="en">

<head>
    <script src="https://cdn.tailwindcss.com"></script>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Account details</title>
    <link rel="stylesheet" href="../css/detail-account.css" />
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
                <span> Account details </span>
            </div>
            <div id="main-content">
                <h1>My Account</h1>
                <div class="grid grid-col-3 gap-3">
                    <div id="order-history">
                        <h2>Order History</h2>
                        <hr />
                        <div>
                            @php
                                $number = 0;
                            @endphp
                            @foreach ($orders as $order)
                                <div
                                    class="flex justify-center items-center flex-row gap-20 pl-10 p-10 rounded hover:bg-gray-200">
                                    <div>{{ $number++ }}</div>
                                    <div>
                                        <div>Items: {{ $order->items }}</div>
                                        <div>Order date: {{ $order->order_date }}</div>
                                        <div>Total: ${{ $order->order_total }}</div>
                                    </div>
                                    <div>
                                        <div>Fullname: {{ $order->fullname }}</div>
                                        <div>Telephone: {{ $order->telephone }}</div>
                                        <div>Status: Ordered</div>
                                    </div>
                                </div>
                                <hr>
                            @endforeach
                        </div>
                    </div>
                    <div id="account-detail">
                        <div id="title-ad">
                            <h2>Account Details</h2>
                            <hr />
                        </div>
                        <div id="account">
                            <ul>
                                <li>
                                    <i class="fa-regular fa-user"></i>
                                    <span>{{ auth()->user()->name }}</span>
                                </li>
                                <li>
                                    <i class="fa-regular fa-envelope"></i>
                                    <span>{{ auth()->user()->email }}</span>
                                </li>
                            </ul>
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
