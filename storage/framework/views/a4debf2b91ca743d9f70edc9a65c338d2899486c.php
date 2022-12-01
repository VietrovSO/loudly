
  
<?php $__env->startSection('content-fluid'); ?>
<main class="login-form bg-login h-screen bg-cover relative flex justify-center items-center">
    <div class="w-min relative left-48">
        <div class="bg-white/50 p-10">
            <div class="card-header text-3xl font-semibold mb-6">Login</div>
            <form action="<?php echo e(route('login.post')); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <div class="form-group row">
                    <label for="email_address" class="text-sm">E-Mail</label>
                    <div class="col-md-6">
                        <input type="text" id="email_address" class="w-72 p-2 bg-transparent border border-2 border-black text-base mt-2" name="email" required autofocus>
                        <?php if($errors->has('email')): ?>
                            <span class="text-danger"><?php echo e($errors->first('email')); ?></span>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="mt-3">
                    <label for="password" class="text-sm">Password</label>
                    <div class="col-md-6">
                        <input type="password" id="password" class="w-72 p-2 bg-transparent border border-2 border-black text-base  mt-2" name="password" required>
                        <?php if($errors->has('password')): ?>
                            <span class="text-danger"><?php echo e($errors->first('password')); ?></span>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="mt-2">
                    <div class="col-md-6 offset-md-4">
                        <div class="checkbox">
                            <label>
                                
                            </label>
                        </div>
                    </div>
                </div>

                <div class="mt-6">
                    <button type="submit" class="bg-black text-white px-6 py-3 rounded-full font-semibold">
                        Login
                    </button>
                </div>
            </form>    
  </div>
</main>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\Loudly\resources\views/auth/login.blade.php ENDPATH**/ ?>