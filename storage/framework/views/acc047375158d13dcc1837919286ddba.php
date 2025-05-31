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
<body class="d-flex flex-column min-vh-100">
    
    <?php $__env->startSection('navbarItem1', 'Login'); ?>
    <?php $__env->startSection('navbarItem2', 'Register'); ?>

    <?php $__env->startSection('content'); ?>
    <main class="text-center w-100 d-flex flex-column align-items-center justify-content-center">
        <h1>Hello, <?php echo e(Auth::user()->name); ?>!</h1>
        <p><?php echo e(Auth::user()->email); ?></p>
        <div class="d-flex flex-column align-items-center justify-content-center">
            <h3>Your recipes</h3>

        </div>
        <a class="btn btn-danger" href="<?php echo e(route('logout')); ?>">Logout</a>
    </main>    
    <?php $__env->stopSection(); ?>

    <?php $__env->startSection('footer'); ?>
        <p class="mt-2">&copy; 2025 Dish Delight. All rights reserved.</p>
    <?php $__env->stopSection(); ?>

    <script src="<?php echo e(asset('bootstrapFiles/js/bootstrap.min.js')); ?>"></script>
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


<?php echo $__env->make('layouts.layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Simone\recipe-sharing\resources\views/auth/profile.blade.php ENDPATH**/ ?>