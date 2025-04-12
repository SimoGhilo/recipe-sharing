
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<header>
    <nav class="navbar navbar-expand-lg navbar-primary bg-primary w-100">
        <div class="container-fluid">
            <a class="navbar-brand" href="/"><img id="logo" class="img-fluid" src="{{ asset('img/logo.png') }}"/></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fas fa-bars text-black"></i>
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
</header>

        @yield('content')

    <footer class="bg-primary text-center w-100 position-fixed">
        @yield('footer')
    </footer>

<style>
    #logo{
        height:2.5rem;
    }
</style>
