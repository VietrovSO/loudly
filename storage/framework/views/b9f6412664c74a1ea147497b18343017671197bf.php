<!DOCTYPE html>
<html>
<head>
    <title>Loudly</title>
    <link href="<?php echo e(asset('css/app.css')); ?>" rel="stylesheet">
</head>
<body>
    
<div class="bg-neutral-900 z-10 h-24 flex items-center fixed w-full top-0">
    <div class="container text-white py-6 flex justify-between items-center mx-auto w-full">
        <div>
            <a class="text-4xl font-semibold" href="/">Loudly</a>
        </div>    

        <ul class="flex items-center ml-auto">
            <?php if(auth()->guard()->guest()): ?>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo e(route('register')); ?>">Sign In</a>
                </li>
                <li class="nav-item ml-3">
                    <a href="<?php echo e(route('login')); ?>" class="bg-white text-black px-6 py-3 rounded-full font-semibold">
                        Log In
                    </a>
                </li>
            <?php else: ?>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo e(route('logout')); ?>">Logout</a>
                </li>
            <?php endif; ?>
        </ul>
  
    </div>
</div>

<?php if (! empty(trim($__env->yieldContent('content')))): ?>
    <div class="container mx-auto pt-32">
        <?php echo $__env->yieldContent('content'); ?>
    </div>
<?php endif; ?>

<?php if (! empty(trim($__env->yieldContent('content-fluid')))): ?>
    <?php echo $__env->yieldContent('content-fluid'); ?>
<?php endif; ?>
    
</body>
</html><?php /**PATH C:\xampp\Loudly\resources\views/layout.blade.php ENDPATH**/ ?>