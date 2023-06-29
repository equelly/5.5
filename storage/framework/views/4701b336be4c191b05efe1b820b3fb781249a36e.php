<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card m-10">
                <div class="card-header" style="font-size: 18px;"><?php echo e(__('Панель входа')); ?></div>

                <div class="card-body">
                    <?php if(session('status')): ?>
                        <div class="alert alert-success" role="alert">
                            <?php echo e(session('status')); ?>

                        </div>
                    <?php endif; ?>

                    <p><?php echo e(Auth::user() == null ? 'Nemo': Auth::user()->name); ?>!
                    <?php
                        $t = date("H");

                        if ($t < "10") {
                            echo "Доброе утро!";
                        } elseif ($t < "20") {
                            echo "Добрый день!";
                        } else {
                            echo "Доброй ночи!";
                        }
                        ?>
                    </p><hr>
                    <div class="row justify-content-center">
                    <a class="btn btn-outline-primary w-75" href="<?php echo e(route('post.index')); ?>" style="float: center;">вход на личную страницу</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/5.5/resources/views/home.blade.php ENDPATH**/ ?>