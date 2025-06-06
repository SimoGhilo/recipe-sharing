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
    @extends('layouts.layout')
    @section('navbarItem1', 'Login')
    @section('navbarItem2', 'Register')
<body class="d-flex flex-column min-vh-100">

    @section('content')
    <main class="text-center w-100 d-flex flex-column align-items-center justify-content-center">

        <span class="text-success d-none" id="feedback"></span>

        <h1>Hello, {{Auth::user()->name}}!</h1>
        <p>{{Auth::user()->email}}</p>
        <a class="btn btn-danger" href="{{ route('logout') }}">Logout</a>
        <div class="d-flex flex-column align-items-center justify-content-center text-center">
            <h3>Your recipes</h3>
            @if (count($recipes) == 0)
                <p class="text-secondary">You do not have any recipes</p>
            @endif
            <ul class="mb-5">
                @foreach($recipes as $recipe)
                    <div class="card h-100 shadow-sm mb-2">
                        <img 
                            src="{{ asset($recipe->image_url) }}" 
                            alt="Recipe image" 
                            class="card-img-top img-fluid object-fit-cover" 
                            style="height: 200px; width: 100%;"
                        >
                        <div class="card-body">
                            <a class="btn btn-primary" href="/recipe/{{$recipe->id}}"><h5 class="card-title">{{ $recipe->name }}</h5></a>
                            <a class="btn btn-danger delete" id="{{$recipe->id}}"><h5 class="card-title">Delete recipe</h5></a>
                        </div>
                    </div>
                @endforeach
            </ul>
        </div>
    </main>    
    @endsection

    @section('footer')
        <p class="mt-2">&copy; 2025 Dish Delight. All rights reserved.</p>
    @endsection

    <script src="{{ asset('bootstrapFiles/js/bootstrap.min.js') }}"></script>
    <script>
    document.addEventListener("DOMContentLoaded", function () {
        const deleteButtons = document.getElementsByClassName('delete');
        Array.from(deleteButtons).forEach((button) => {
            button.addEventListener('click', function (){
                fetch("{{ route('recipe.delete') }}", {
                        method: "POST",
                        headers: {
                            "Content-Type": "application/json",
                            "X-CSRF-TOKEN": "{{ csrf_token() }}"
                        },
                        body: JSON.stringify({
                            id: button.id
                        })
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            // Remove the card element
                            const span = document.getElementById("feedback");
                            span.textContent = "Recipe deleted successfully";
                            span.classList.remove('d-none');
                            const card = button.closest('.card');
                            if(card) card.remove();
                        } else {
                            alert(data.message || 'Delete failed');
                        }
                    })
                    .catch(error => {
                        console.error("Error deleting recipe:", error);
                    });
            });

        })

    });

    </script>
</body>
</html>



