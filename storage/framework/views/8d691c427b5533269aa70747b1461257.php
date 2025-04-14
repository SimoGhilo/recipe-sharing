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

    <?php $__env->startSection('content'); ?>
    <main class="text-center w-100 d-flex flex-column align-items-center justify-content-center min-vh-100 mb-4 mt-1">
        <h1 class="m-2"><?php echo e($recipe->name); ?></h1>
        <div class="d-flex flex-column justify-content-evenly align-items-center flex-md-row gap-4 flex-wrap w-100"> 
            <div style="max-width: 300px;">
                <img src="<?php echo e(asset($recipe->image_url)); ?>" alt="" class="img-fluid" />
            </div>
            <div class="d-flex text-center flex-column justify-content-evenly align-items-center">
                <h2>ingredients required:</h2>
                <ul>
                    <?php $__currentLoopData = explode(',', $recipe->ingredients); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ingredient): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><?php echo e($ingredient); ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
            <div class="d-flex text-center flex-column justify-content-evenly align-items-center">
                <h2>Steps:</h2>
                <ul class="custom d-flex flex-column justify-content-center align-items-center w-100 mb-5">
                    <?php $__currentLoopData = explode('.', $recipe->instructions); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $instruction): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><?php echo e($instruction); ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
        </div>
    </main>
    <?php $__env->stopSection(); ?>
    

    <?php $__env->startSection('footer'); ?>
        <p class="mt-2">&copy; 2025 Dish Delight. All rights reserved.</p>
    <?php $__env->stopSection(); ?>

    <script src="<?php echo e(asset('bootstrapFiles/js/bootstrap.min.js')); ?>"></script>
</body>
</html>
<style>
    .custom{
        list-style: none;
    }
</style>

<?php echo $__env->make('layouts.layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Simone\recipe-sharing\resources\views/recipe/show.blade.php ENDPATH**/ ?>