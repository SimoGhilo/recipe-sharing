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

    @auth

        @section('content')
        <main class="text-center w-100 d-flex flex-column align-items-center justify-content-center mt-5">

            <form action="{{route('add.submit')}}" id="form-new" method="POST">
                @csrf
                  <h1>New recipe</h1>
                  <div class="mb-2">
                    <label for="inputName" class="form-label">Name</label>
                    <input type="text" class="form-control" id="inputName" name="name" aria-describedby="name" required>
                  </div>
                  <div class="mb-2" id="ingredientInputContainer">
                    <label for="inputIngredient" class="form-label">Ingredients</label>
                    <input type="text" class="form-control" id="inputIngredient" name="ingredient" aria-describedby="ingredient" required>
                  </div>
                  <div class="m-1">
                    <button class="btn btn-success" id="addInputIngredient">+</button>
                    <button class="btn btn-danger" id="removeInputIngredient">-</button>
                  </div>
                  <button type="submit" class="btn btn-primary">Submit</button>
                </form>


            @if ($errors->any())
            <div style="color: red;">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            
        </main>    
        @endsection


    @else
        <!-- User is not authenticated -->
        <p style="color:red">Error: You must be logged in to view this page.</p>
    @endauth



    @section('footer')
        <p class="mt-2">&copy; 2025 Dish Delight. All rights reserved.</p>
    @endsection

    <script src="{{ asset('bootstrapFiles/js/bootstrap.min.js') }}"></script>
</body>
</html>

<script>

    //TODO: add and remove inputs dynamically, add recipe by user


</script>


