
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
    <main class="text-center w-100 d-flex flex-column align-items-center justify-content-center min-vh-100 mb-4 mt-1">
        <h1 class="m-2">{{$recipe->name}}</h1>
        <div class="d-flex flex-column justify-content-evenly align-items-center flex-md-row gap-4 flex-wrap w-100"> 
            <div style="max-width: 300px;">
                <img src="{{ asset($recipe->image_url) }}" alt="" class="img-fluid" />
            </div>
            <div class="d-flex text-center flex-column justify-content-evenly align-items-center">
                <h2>ingredients required:</h2>
                <ul>
                    @foreach(explode(',', $recipe->ingredients) as $ingredient)
                        <li>{{ $ingredient }}</li>
                    @endforeach
                </ul>
            </div>
            <div class="d-flex text-center flex-column justify-content-evenly align-items-center">
                <h2>Steps:</h2>
                <ul class="custom d-flex flex-column justify-content-center align-items-center w-100 mb-5">
                    @foreach(explode('.', $recipe->instructions) as $instruction)
                        <li>{{ $instruction }}</li>
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
    .custom{
        list-style: none;
    }
</style>
