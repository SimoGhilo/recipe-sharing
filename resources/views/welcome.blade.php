<body class="d-flex flex-column min-vh-100">
    @extends('layouts.layout')
    @section('navbarItem1', 'Login')
    @section('navbarItem2', 'Register')

    @section('content')
    <main class="text-center w-100 d-flex flex-column align-items-center justify-content-center min-vh-100 mb-1 mt-5">
        <h1 class="mb-2">Explore today's specialities</h1>
        <div class="d-flex flex-column justify-content-center align-items-center flex-md-row gap-4 flex-wrap w-100">
            @foreach($recipes as $recipe)
                <div class="m-2" style="max-width: 250px;"> 
                    <a href="{{ url('/recipe/' . $recipe->id) }}"><img src="{{ asset($recipe->image_url) }}" alt="" class="img-fluid" /></a>
                    <p class="text-dark">{{$recipe->name}}</p>
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
<style>
    img{
        transition: opacity 0.3s ease; 
    }
    img:hover{
        opacity: 0.7;
        cursor: pointer;
    }
</style>

