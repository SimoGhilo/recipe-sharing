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
    <main class="text-center w-100 d-flex flex-column align-items-center justify-content-center mt-5">
        <form>
            <h1>Register</h1>
            <div class="mb-2">
                <label for="InputName" class="form-label">Full Name</label>
                <input type="text" class="form-control" id="InputName" aria-describedby="email">
            </div>
            <div class="mb-2">
              <label for="InputEmail" class="form-label">Email address</label>
              <input type="email" class="form-control" id="InputEmail" aria-describedby="email">
              <div id="email" class="form-text">We'll never share your email with anyone else.</div>
            </div>
            <div class="mb-2">
              <label for="password" class="form-label">Password</label>
              <input type="password" class="form-control" id="password">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
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

