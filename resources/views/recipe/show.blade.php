
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/x-icon" href="{{ asset('img/icon.png') }}">
    <title>Dish Delight</title>
    <link rel="stylesheet" href="{{ asset('bootstrapFiles/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/header.css') }}">
    <link rel="stylesheet" href="{{ asset('css/footer.css') }}">
</head>
<body class="d-flex flex-column min-vh-100">
    @extends('layouts.layout')
    @section('navbarItem1', 'Login')
    @section('navbarItem2', 'Register')

    @section('content')
    <main class="text-center w-100 d-flex flex-column align-items-center justify-content-center min-vh-100 mb-1 mt-5">
        <h1 class="mb-2">{{$recipe->name}}</h1>
        <div class="d-flex w-100 text-center  align-items-center justify-content-center gap-2"> 
            <div style="max-width: 250px;">
                <img src="{{ asset($recipe->image_url) }}" alt="" class="img-fluid" />
            </div>
            <div>
                <h5>ingredients required:</h5>
                <ul>
                    @foreach(explode(',', $recipe->ingredients) as $ingredient)
                        <li>{{ $ingredient }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    </main>
    @endsection


    

    @section('footer')
        <p class="mt-2">&copy; 2025 Dish Delight. All rights reserved.</p>
    @endsection

    <script src="{{ asset('bootstrapFiles/js/bootstrap.min.js') }}"></script>
</body>
</html>
<style>
    /* main{
        overfl
    } */
</style>
