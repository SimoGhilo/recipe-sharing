@php use Illuminate\Support\Facades\Auth; @endphp
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
    <main class="text-center w-100 d-flex flex-column align-items-center justify-content-center">
        <h1>Hello, {{Auth::user()->name}}!</h1>
        <p>{{Auth::user()->email}}</p>
        <!-- TODO: Pull all recipes for user -->
        <div class="d-flex flex-column align-items-center justify-content-center">
            <h3>Your recipes</h3>

        </div>
        <a class="btn btn-danger" href="{{ route('logout') }}">Logout</a>
    </main>    
    @endsection

    @section('footer')
        <p class="mt-2">&copy; 2025 Dish Delight. All rights reserved.</p>
    @endsection

    <script src="{{ asset('bootstrapFiles/js/bootstrap.min.js') }}"></script>
</body>
</html>
<style>
    img{
        transition: opacity 0.3s ease; 
    }
    img:hover{
        opacity: 0.7;
        cursor: pointer;
    }
</style>

