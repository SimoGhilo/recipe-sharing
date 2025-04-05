
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dish Delight</title>
    <link rel="stylesheet" href="{{ asset('bootstrapFiles/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/header.css') }}">
    <link rel="stylesheet" href="{{ asset('css/footer.css') }}">
</head>
<body>
    @extends('layouts.layout')
    @section('navbarItem1', 'Login')
    @section('navbarItem2', 'Register')

    @section('content')
    <main class="text-center">
        <h1>Welcome to Dish Delight!</h1>
        <div class="d-flex flex-column justify-center align-center flex-md-row">
            @foreach($recipes as $recipe)
                <div>
                    <img src={{$recipe->image_url}} alt="" class="image-fluid" />
                    <p class="text-dark">{{$recipe->name}}</p>
                    <button class="btn btn-primary">Discover</button>
                </div>
            @endforeach
        </div>
    </main>
    @endsection


    

    @section('footer')
        <p class="mt-2">&copy; 2025 Dish Delight. All rights reserved.</p>
    @endsection

    <script src="{{ asset('bootstrapFiles/js/bootstrap.min.js') }}"></script>
</body>
</html>

