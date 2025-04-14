
<?php use Illuminate\Support\Facades\Auth; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<header>
    <nav class="navbar navbar-expand-lg navbar-primary bg-primary w-100">
        <div class="container-fluid">
            <a class="navbar-brand" href="/"><img id="logo" class="img-fluid" src="<?php echo e(asset('img/logo.png')); ?>"/></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fas fa-bars text-black"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">


                <?php if(Auth::check()): ?>
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link text-dark" href="/profile"><?php echo e(Auth::user()->name); ?></a>
                    </li>
                </ul>
                <?php else: ?> 
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link text-dark" href="/login"><?php echo $__env->yieldContent('navbarItem1'); ?></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-dark" href="/register"><?php echo $__env->yieldContent('navbarItem2'); ?></a>
                        </li>
                    </ul>
                <?php endif; ?>

                <form class="d-flex ms-auto" onsubmit="return false;">
                    <div class="position-relative w-100" style="max-width: 300px;">
                        <input id="search" class="form-control me-2 w-100" type="search" placeholder="Search a recipe" aria-label="Search">
                        <div id="search-results" style="display: none;"></div>
                    </div>
                    <button class="btn btn-outline-dark" type="submit">Go</button>
                </form>                
            </div>
        </div>
    </nav>
</header>

        <?php echo $__env->yieldContent('content'); ?>

    <footer class="bg-primary text-center w-100 position-fixed">
        <?php echo $__env->yieldContent('footer'); ?>
    </footer>

<style>
    #logo{
        height:2.5rem;
    }
    #search-results {
    position: absolute;
    top: 100%;
    left: 0;
    right: 0;
    background: white;
    border: 1px solid #ccc;
    z-index: 999;
    max-height: 200px;
    overflow-y: auto;
    border-top: none;
    }

    #search-results div {
        padding: 8px;
        cursor: pointer;
    }

    #search-results div:hover {
        background-color: #f0f0f0;
    }

</style>
<script>

document.getElementById('search').addEventListener('input', function (event) {
    event.preventDefault();

    const query = this.value;
    const resultsDiv = document.getElementById('search-results');

    if (query.length > 1) {
        fetch(`/preview?query=${query}`)
            .then(res => res.json())
            .then(data => {
                let html = '';
                if (data.length > 0) {
                    data.forEach(item => {
                        html += `<div><a style="text-decoration: none" href=/recipe/${item.id}>${item.name}</a></div>`;
                    });
                } else {
                    html = '<div>No results</div>';
                }
                resultsDiv.innerHTML = html;
                resultsDiv.style.display = 'block';
            });
    } else {
        resultsDiv.innerHTML = '';
        resultsDiv.style.display = 'none';
    }
});
</script>
<?php /**PATH C:\Users\Simone\recipe-sharing\resources\views/layouts/layout.blade.php ENDPATH**/ ?>