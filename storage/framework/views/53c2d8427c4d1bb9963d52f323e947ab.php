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
<body class="d-flex flex-column min-vh-100">
    
    <?php $__env->startSection('navbarItem1', 'Login'); ?>
    <?php $__env->startSection('navbarItem2', 'Register'); ?>

    <?php if(auth()->guard()->check()): ?>

        <?php $__env->startSection('content'); ?>
        <main class="text-center w-100 d-flex flex-column align-items-center justify-content-center mt-5">

            <form action="<?php echo e(route('add.submit')); ?>" id="form-new" method="POST">
                <?php echo csrf_field(); ?>
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


            <?php if($errors->any()): ?>
            <div style="color: red;">
                <ul>
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><?php echo e($error); ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
            <?php endif; ?>
            
        </main>    
        <?php $__env->stopSection(); ?>


    <?php else: ?>
        <!-- User is not authenticated -->
        <p style="color:red">Error: You must be logged in to view this page.</p>
    <?php endif; ?>



    <?php $__env->startSection('footer'); ?>
        <p class="mt-2">&copy; 2025 Dish Delight. All rights reserved.</p>
    <?php $__env->stopSection(); ?>

    <script src="<?php echo e(asset('bootstrapFiles/js/bootstrap.min.js')); ?>"></script>
</body>
</html>

<script>

    const form = document.getElementById('form-new');

    form.addEventListener('submit', function (e) {
        e.preventDefault();
    })
    
    const addIngredientButton = document.getElementById('addInputIngredient');
    addIngredientButton.addEventListener('click', function (e) {
        e.preventDefault();
        const lastInputIngredientContainer = document.getElementById('ingredientInputContainer');

        const inputIngredient = document.getElementById('inputIngredient');
        const newInputIngredient = inputIngredient.cloneNode(true);
        newInputIngredient.value = '';
        const currentCount = lastInputIngredientContainer.querySelectorAll('input').length;
        newInputIngredient.name = 'ingredient' + currentCount;

        if (currentCount < 15) {
            lastInputIngredientContainer.appendChild(newInputIngredient);
        }
    });

    const removeIngredientButton = document.getElementById('removeInputIngredient');
    removeIngredientButton.addEventListener('click', function (e) {
        e.preventDefault();
        const lastInputIngredientContainer = document.getElementById('ingredientInputContainer');
        const inputs = lastInputIngredientContainer.querySelectorAll('input');

        if (inputs.length > 1) {
            lastInputIngredientContainer.removeChild(inputs[inputs.length - 1]);
        }
    });


</script>



<?php echo $__env->make('layouts.layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Simone\recipe-sharing\resources\views/recipe/add.blade.php ENDPATH**/ ?>