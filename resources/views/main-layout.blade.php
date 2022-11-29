<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"  rel="stylesheet" >
</head>
<body class="text-white bg-dark">

<div class="container py-3">
    <header>
        <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-dark text-white border-bottom shadow-sm">
            <a href="/" class="d-flex align-items-center text-white text-decoration-none">
                <i class="fa-solid fa-bus-simple me-2" style="font-size:36px;color:cadetblue"></i>
                <span class="fs-4">IISBUS</span>
            </a>

            <nav class="d-inline-flex mt-2 mt-md-0 ms-md-auto">
                <a class="me-3 py-2 text-white text-decoration-none" href="/">About</a>
                <a class="me-3 py-2 text-white text-decoration-none" href="/search">Search route</a>
                @guest
                    <a class="me-3 py-2 text-white text-decoration-none" href="/login">Sign In</a>
                @else
                    <a class="me-3 py-2 text-white text-decoration-none" href="/logout">Log Out</a>
                @endguest
                <a class="me-3 py-2 text-white text-decoration-none" href="/bus-list">Buses</a>
                <a class="me-3 py-2 text-white text-decoration-none" href="/stop-list">Stops</a>
                <a class="me-3 py-2 text-white text-decoration-none" href="/route-list">Routes</a>
                <a class="me-3 py-2 text-white text-decoration-none" href="/delete-all">Delete All</a>
                <a class="me-3 py-2 text-white text-decoration-none" href="/create-buses">Create All</a>
            </nav>
        </div>
    </header>

    @yield('main_content')
</div>



</body>
</html>
