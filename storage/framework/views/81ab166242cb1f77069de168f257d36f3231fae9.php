<?php $__env->startSection('content'); ?>
    
</head>
<body>
<section class="home">
    <div class="container p-5">
        <H1 class="title">Рецепт <span>№<?php echo e($post->id); ?>.</span></H1>
        <p><h3>всего рецептов:  <?php echo e($posts->count()); ?></h3></p>
        <div class="ml-5">
           
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
                    <p>содержание (в %-x):  <?php echo e($post->carb); ?> угл./ <?php echo e($post->prot); ?> белков/<?php echo e($post->fat); ?> жиров</p>
               <h3>хлебных ед. - 
               <input type="text" class="" style="width: 10rem; border-bottom: 2px solid #bdf5b0" placeholder = "<?php echo e($post->carbpercent); ?>">
                
                </h3> 
                
                    <hr>
                <p class="text-muted">рецепт: <?php echo e($post->content); ?></p>
                </div>
                <hr>
                <div>
                    <a href="<?php echo e(route('post.index')); ?>" class="btn btn-primary m-3" style="width: 95%;">вернуться к рецептам</a>
                </div>
                <?php if((auth()->user() && auth()->user()->role == 'admin') || (auth()->user() && auth()->user()->id == $post->user_id)): ?>
      
     
                <div>
                    <a href="<?php echo e(route('post.edit', $post->id)); ?>" class="btn btn-primary m-3" style="width: 95%;">редактировать</a>
                </div>
                
                <div>
                    <!--оборачиваем в форму т.к. в html нет метода delete -->
                    <form action="<?php echo e(route('post.delete', $post->id)); ?>" method="post">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('delete'); ?>
                        <input type="submit" value = "удалить!" class="btn btn-primary m-3" style="width: 95%;">
                    </form>
                    
                </div>
                <?php endif; ?>
            </div>
        </div>
         
            
        </div>
    </section>
  
   
    
    
    


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.guest', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/5.5/resources/views/post/show.blade.php ENDPATH**/ ?>