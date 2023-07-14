<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    @if (Route::currentRouteName() === 'home')
        <title>newhouse.</title>
    @elseif (Route::currentRouteName() === 'search')
        <title>newhouse. - szukaj</title>
    @endif
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="@yield('meta_desc')" />
    <title>@yield('meta_name')</title>
    <meta name="robots" content="@yield('metarobots')">
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/favicon.ico') }}" />
    <!-- Font Awesome icons (free version)-->
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet" />
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet" />
    @if (Route::currentRouteName() === 'search')
        <link rel="stylesheet" href="{{ asset('css/card.css') }}">
        <link rel="stylesheet" href="{{ asset('css/searchview-style.css') }}">
    @elseif(Route::currentRouteName() === 'property')
        <link rel="stylesheet" href="{{ asset('css/property-style.css') }}">
        <link href="{{ asset('css/lightbox.css') }}" rel="stylesheet" />
    @endif
    @livewireStyles
</head>

<body id="page-top">
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
        <div class="container px-4 px-lg-5">
            <a class="navbar-brand" href="/">newhouse.</a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false"
                aria-label="Toggle navigation">
                Menu
                <i class="fas fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="#about">O nas</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('search') }}">Nasza oferta</a></li>
                    <li class="nav-item"><a class="nav-link" href="#signup">Kontakt</a></li>
                </ul>
            </div>
        </div>
    </nav>

    @yield('content')
    <section class="signup-section" id="signup">
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5">
                <div class="col-md-10 col-lg-8 mx-auto text-center">
                    @livewire('tidings', ['immovable' => $immovable])
                </div>
            </div>
        </div>
    </section>
    <!-- Footer-->
    <footer class="footer bg-black small text-center text-white-50">
        <div class="container px-4 px-lg-5">Copyright &copy; .newhouse 2023</div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        @if (Route::currentRouteName() === 'property')
            <script src="{{ asset('js/lightbox.js') }}" crossorigin="anonymous"></script>
            <script src="{{ asset('js/text-cut.js') }}"></script>
        @elseif (Route::currentRouteName() === 'home')
            <script src="https://unpkg.com/typeit@8.7.1/dist/index.umd.js"></script>
            <script src="{{ asset('js/nav.js') }}"></script>
            <script src="{{ asset('js/home-anim.js') }}"></script>
            <script src="{{ asset('js/type.js') }}"></script>
        @elseif (Route::currentRouteName() === 'search')
            <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
            <script src="{{ asset('js/search-anim.js') }}"></script>
        @endif
    </footer>
    @livewireScripts
</body>

</html>
