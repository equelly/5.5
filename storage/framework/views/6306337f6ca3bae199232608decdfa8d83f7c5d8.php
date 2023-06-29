<?php $__env->startSection('content'); ?>

<body>
<section class="home">  
    <div class="container mt-10">
   <br>
   <br>
   <br>
        <div class="ml-4 pl-4">
            <div id = "searchpost" class="container mt-10">
                <searchpost-component></searchpost-component>
            </div>
            <h1 class="title">Каталог <span>рецептов</span></h1>
                <h3>Всего рецептов: <?php echo e($posts->total()); ?></h3>
            
        </div>
        <div class="ml-5">
            <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="card m-4 w-75">
                <div class="card-header" style="background: #99eb917d">

                    <div class="callout mb-1 w-90"><a href ="<?php echo e(route('post.show', $post->id)); ?> ">
                        <h3 class="fw-light text-muted"><?php echo e($post->title); ?></h3></a>
                    </div>
                </div>
            
            <div class="card-body">

            <p>
                 необходимые продукты
            </p>
                    <?php $__currentLoopData = $postproducts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $postproduct): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($post->id ==$postproduct['post_id']): ?>
                        
                            <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            
                            <?php if($postproduct['product_id'] == $product->id ): ?>
                            <a href ="<?php echo e(route('product.show', $product->id)); ?> "> 
        
                            <div class="btn btn-outline-primary m-2 p-1" style = "width: auto;font-size: 1.2rem"><?php echo e($product->name); ?>/<?php echo e($postproduct['massa']); ?>гр.</div>
                            </a>
                            <?php endif; ?>
                           
                        
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <hr>
                <p class="text-muted">рецепт: <?php echo e($post->content); ?></p>
            </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            
        </div>
<!-- пагинация-->
        <div>
            <?php echo e($posts->withQueryString()->links()); ?>

        </div>
    </section>
        
        
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view', auth()->user())): ?>
        <div id = "post">
        <post-component></post-component>
        </div>
        <?php endif; ?>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.guest', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/first_project/resources/views/post/index.blade.php ENDPATH**/ ?>