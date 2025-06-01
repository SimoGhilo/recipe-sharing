<?php use Illuminate\Support\Facades\Auth; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/x-icon" href="<?php echo e(asset('img/icon.png')); ?>">
    <title>Dish Delight</title>
    <link rel="stylesheet" href="<?php echo e(asset('bootstrapFiles/css/bootstrap.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/header.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/footer.css')); ?>">
</head>
    
    <?php $__env->startSection('navbarItem1', 'Login'); ?>
    <?php $__env->startSection('navbarItem2', 'Register'); ?>
<body class="d-flex flex-column min-vh-100">

    <?php $__env->startSection('content'); ?>
    <main class="text-center w-100 d-flex flex-column align-items-center justify-content-center">

        <span class="text-success d-none" id="feedback"></span>

        <h1>Hello, <?php echo e(Auth::user()->name); ?>!</h1>
        <p><?php echo e(Auth::user()->email); ?></p>
        <a class="btn btn-danger" href="<?php echo e(route('logout')); ?>">Logout</a>
        <div class="d-flex flex-column align-items-center justify-content-center text-center">
            <h3>Your recipes</h3>
            <?php if(count($recipes) == 0): ?>
                <p class="text-secondary">You do not have any recipes</p>
            <?php endif; ?>
            <ul class="mb-5">
                <?php $__currentLoopData = $recipes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $recipe): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="card h-100 shadow-sm mb-2">
                        <img 
                            src="<?php echo e(asset($recipe->image_url)); ?>" 
                            alt="Recipe image" 
                            class="card-img-top img-fluid object-fit-cover" 
                            style="height: 200px; width: 100%;"
                        >
                        <div class="card-body">
                            <a class="btn btn-primary" href="/recipe/<?php echo e($recipe->id); ?>"><h5 class="card-title"><?php echo e($recipe->name); ?></h5></a>
                            <a class="btn btn-danger delete" id="<?php echo e($recipe->id); ?>"><h5 class="card-title">Delete recipe</h5></a>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    </main>    
    <?php $__env->stopSection(); ?>

    <?php $__env->startSection('footer'); ?>
        <p class="mt-2">&copy; 2025 Dish Delight. All rights reserved.</p>
    <?php $__env->stopSection(); ?>

    <script src="<?php echo e(asset('bootstrapFiles/js/bootstrap.min.js')); ?>"></script>
    <script>
    document.addEventListener("DOMContentLoaded", function () {
        const deleteButtons = document.getElementsByClassName('delete');
        Array.from(deleteButtons).forEach((button) => {
            button.addEventListener('click', function (){
                fetch("<?php echo e(route('recipe.delete')); ?>", {
                        method: "POST",
                        headers: {
                            "Content-Type": "application/json",
                            "X-CSRF-TOKEN": "<?php echo e(csrf_token()); ?>"
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




<?php echo $__env->make('layouts.layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Simone\recipe-sharing\resources\views/auth/profile.blade.php ENDPATH**/ ?>