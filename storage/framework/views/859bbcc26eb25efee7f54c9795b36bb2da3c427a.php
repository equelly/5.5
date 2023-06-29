<?php $__env->startSection('content'); ?>
<title>Posts</title>
</head>
<body>
    <H1>Рецепт №<?php echo e($post->id); ?>.</H1>
    <p><h3>всего рецептов:  <?php echo e($posts->count()); ?></h3></p>
   
    <div>
    <?php echo e($post->id); ?>. <?php echo e($post->title); ?>____<?php echo e($post->content); ?>

   
    </div>
    <div>
        <a href="<?php echo e(route('admin.post.index')); ?>" class="btn btn-primary mt-3">вернуться к рецептам</a>
    </div>
    <!-- директива can принимает арументом способность 'view' и пользователя из auth()->user() из объекта класса AdminPolicy-->
    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view', auth()->user())): ?>
    <div>
        <a href="<?php echo e(route('admin.post.edit', $post->id)); ?>" class="btn btn-primary mt-3">редактировать</a>
    </div>
    
    <div>
        <!--оборачиваем в форму т.к. в html нет метода delete -->
        <form action="<?php echo e(route('admin.post.delete', $post->id)); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <?php echo method_field('delete'); ?>
            <input type="submit" value = "удалить!" class="btn btn-primary mt-3">
        </form>
        
    </div>
    <?php endif; ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/first_project/resources/views/admin/post/show.blade.php ENDPATH**/ ?>