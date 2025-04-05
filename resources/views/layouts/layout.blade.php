<header>
    <nav class="navbar navbar-expand-lg navbar-primary bg-primary">
        <div class="container-fluid">
            <a class="navbar-brand text-dark" href="#">DishDelight</a>
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
    <div class="container-fluid">
        @yield('content')
    </div>
    <footer class="container-fluid bg-primary text-center">
        @yield('footer')
    </footer>
</header>
