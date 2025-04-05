<header>
    <nav class="navbar navbar-expand-lg navbar-primary bg-primary position-fixed w-100">
        <div class="container-fluid">
            <a class="navbar-brand text-dark" href="#"><img src="{{ asset('img/logo.png') }}"/></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link text-dark" href="#">@yield('navbarItem1')</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-dark" href="#">@yield('navbarItem2')</a>
                    </li>
                </ul>
                <form class="d-flex ms-auto">
                    <input class="form-control me-2" type="search" placeholder="Search a recipe" aria-label="Search">
                    <button class="btn btn-outline-dark" type="submit">Go</button>
                </form>
            </div>
        </div>
    </nav>

        @yield('content')

    <footer class="bg-primary text-center w-100 position-fixed">
        @yield('footer')
    </footer>
</header>
