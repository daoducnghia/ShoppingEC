<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Home</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/home.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/navigator.css') }}" />

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" rel="stylesheet"
        type="text/css" />
    <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
</head>

<body>
    <div class="wrapper">
        <!-- Navbar -->
        @include('component.navigator')
        <!-- Main -->

        <!-- Footer -->
        @include('component.footer')
    </div>
</body>

</html>
