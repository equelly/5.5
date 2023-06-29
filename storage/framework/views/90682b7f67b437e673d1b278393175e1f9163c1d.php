<?php $__env->startSection('content'); ?>
<H1>рецепты</H1>
    <div>
        <p><h3>всего Pецептов:  <?php echo e($posts->total()); ?></h3></p>
        <div>
            <a href="<?php echo e(route('admin.post.create')); ?>" class="btn btn-primary mb-3">добавить новый рецепт</a>
        </div>
        <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div>
        <a href ="<?php echo e(route('admin.post.show', $post->id)); ?> "> <?php echo e($post->id); ?>. <?php echo e($post->title); ?>____<?php echo e($post->content); ?></a>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
        <!-- пагинация-->
        <div>
            <?php echo e($posts->withQueryString()->links()); ?>

           
        </div>
      
        <div id = "post">
        <post-component></post-component>
        </div>
    </div>
   
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/first_project/resources/views/admin/post/index.blade.php ENDPATH**/ ?>