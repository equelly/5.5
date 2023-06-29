<?php $__env->startSection('content'); ?>
    <title>Posts</title>
</head>
<body>
    <H1>Посты</H1>
    <p><h3>всего постов:  <?php echo e($posts->count()); ?></h3></p>
    <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div>
    <?php echo e($post->id); ?>. <?php echo e($post->title); ?>____<?php echo e($post->content); ?>

    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/first_project/resources/views/posts.blade.php ENDPATH**/ ?>