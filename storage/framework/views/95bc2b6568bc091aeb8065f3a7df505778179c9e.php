<?php $__env->startSection('content'); ?>

<body>
<section class="home">  
    <div class="container mt-10">
   <br>
   <br>
   <br>
        <h1 class="m-3">Поиск рецепта в каталоге</h1>
        <div id="searchpost" style="margin: auto; max-width:75%">
            <searchpost-component></searchpost-component>
        </div>
        </div>
            <?php if(auth()->user() && (auth()->user()->role=='user'|| auth()->user()->role=='admin') && $userLikedPost->count() != 0): ?>
    
    
            <h1 class="title">Любимые <span>рецепты(<?php echo e($userLikedPost->count()); ?>)</span></h1>
            <div class="ml-5">
                <?php $__currentLoopData = $userLikedPost; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="card">
                    <div class="card-header " style="background: #99eb917d">
                        <div class="callout mb-1 w-90 d-flex justify-content-between">
                            <div><a href ="<?php echo e(route('post.show', $post->id)); ?> "><h3 class="fw-light text-muted"><?php echo e($post->title); ?></h3></a></div>
                            <div  style="color:#63c34e;">
                                <form action="<?php echo e(route('post.like.store', $post->id)); ?>" method="POST">
                                    <?php echo csrf_field(); ?>
                                    <span><?php echo e(($post->liked_users_count) > 0 ? $post->liked_users_count : ''); ?></span>
                                    <button type="submit" class="border-0 bg-transparent">
                                        <?php if(auth()->guard()->check()): ?>
                                       
                                        <?php if(auth()->user()->likedPosts->contains($post->id)): ?>
                                    <i class="fas fa-heart" style="font-size:1.5em;color:#63c34e;"></i>
                                    <?php else: ?>
                                    <i class="far fa-heart" style="font-size:1.5em;color:#63c34e;"></i>
                                    <?php endif; ?>
                                <?php endif; ?>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>    
                <div class="card-body">
                    <p>необходимые продукты</p>
                    <?php $__currentLoopData = $postproducts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $postproduct): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($post->id ==$postproduct['post_id']): ?>
                        
                            <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            
                            <?php if($postproduct['product_id'] == $product->id ): ?>
                            <a href ="<?php echo e(route('product.show', $product->id)); ?> "> 
        
                            <div class="btn m-2 p-1" style = "width: auto;font-size: 1.5rem"><?php echo e($product->name); ?>/<?php echo e($postproduct['massa']); ?>гр.</div>
                            </a>
                            <?php endif; ?>
                           
                        
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <hr>
                    <?php $__currentLoopData = $cut_posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cut_post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($post->id == $cut_post['id']): ?>
                        <p class="text-muted">Способ приготовления: <?php echo e($cut_post['content']); ?></p>
                        <a href ="<?php echo e(route('post.show', $post['id'])); ?> " style ="color:#63c34e">подробнее...</a>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            
        </div>
    <?php endif; ?> 
    <h1 class="title">Топ <span>рецептов</span></h1>
            <div class="m-1">
                <?php $__currentLoopData = $likedPosts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="card mb-3">
                        <div class="card-header " style="background: #99eb917d">
                   
                            <div class="callout mb-1 w-90 d-flex justify-content-between">
                                <div><a href ="<?php echo e(route('post.show', $post->id)); ?> "><h3><?php echo e($post->title); ?></h3></a></div>
                                <div style="color:#63c34e;">
                                <form action="<?php echo e(route('post.like.store', $post->id)); ?>" method="POST">
                                    <?php echo csrf_field(); ?>
                                    <?php if(($post->liked_users_count) > 0): ?>
                                    
                                    <span class="text-nowrap"><?php echo e($post->liked_users_count); ?>

                                    <?php if(auth()->guard()->check()): ?>
                                    <button type="submit" class="border-0 bg-transparent">
                                            <?php if(auth()->user()->likedPosts->contains($post->id)): ?>
                                            <i class="fas fa-heart" style="font-size:1.5em;color:#63c34e;"></i>
                                            <?php else: ?>
                                            <i class="far fa-heart" style="font-size:1.5em;color:#63c34e;"></i>
                                            <?php endif; ?>
                                    </button>        
                                        <?php else: ?>
                                    <button>
                                        <a href="/home" class="far fa-heart" style="font-size:1.5em;color:#63c34e;"></a>
                                    </button>
                                    <?php endif; ?>
                                    </span>
                                    <?php endif; ?>
                                    
                                    
                                    
                                </form>
                                </div>
                            </div>
                        
                    </div>
                    <div class="card-body">
                    <p>необходимые продукты</p>
                    <?php $__currentLoopData = $postproducts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $postproduct): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($post->id ==$postproduct['post_id']): ?>
                        
                            <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            
                            <?php if($postproduct['product_id'] == $product->id ): ?>
                            <a href ="<?php echo e(route('product.show', $product->id)); ?> "> 
        
                            <div class="btn m-2 p-1" style = "width: auto;"><?php echo e($product->name); ?>/<?php echo e($postproduct['massa']); ?>гр.</div>
                            </a>
                            <?php endif; ?>
                           
                        
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <hr>
                    <?php $__currentLoopData = $cut_posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cut_post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($post->id == $cut_post['id']): ?>
                        <p class="text-muted">Способ приготовления: <?php echo e($cut_post['content']); ?></p>
                        <a href ="<?php echo e(route('post.show', $post['id'])); ?> " style ="color:#63c34e">подробнее...</a>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            
        </div>
        <h1 class="title">Каталог <span>рецептов</span></h1>
            <h3>Всего рецептов: <?php echo e($posts->total()); ?></h3>
            <div class="m-1">
            <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="card mb-3">
                <div class="card-header " style="background: #99eb917d">
                    <div class="callout mb-1 w-90 d-flex justify-content-between">
                        
                            <div><a href ="<?php echo e(route('post.show', $post->id)); ?> "><h3 class="fw-light text-muted"><?php echo e($post->title); ?></h3></a></div>
                            <div style="color:#63c34e;">
                                <form action="<?php echo e(route('post.like.store', $post->id)); ?>" method="POST">
                                    <?php echo csrf_field(); ?>
                                    <span><?php echo e(($post->liked_users_count) > 0 ? $post->liked_users_count : ''); ?></span>
                                    <button type="submit" class="border-0 bg-transparent">
                                        <?php if(auth()->guard()->check()): ?>
                                        <?php if(auth()->user()->likedPosts->contains($post->id)): ?>
                                    <i class="fas fa-heart" style="font-size:1.5em;color:#63c34e;"></i>
                                    <?php else: ?>
                                    <i class="far fa-heart" style="font-size:1.5em;color:#63c34e;"></i>
                                    <?php endif; ?>
                                <?php endif; ?>
                                    </button>
                                </form>
                            </div>
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
        
                            <div class="btn m-2 p-1" style = "width: auto;font-size: 1.2rem"><?php echo e($product->name); ?>/<?php echo e($postproduct['massa']); ?>гр.</div>
                            </a>
                            <?php endif; ?>
                           
                        
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <hr>
                    <?php $__currentLoopData = $cut_posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cut_post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($post->id == $cut_post['id']): ?>
                        <p class="text-muted">Способ приготовления: <?php echo e($cut_post['content']); ?></p>
                        <a href ="<?php echo e(route('post.show', $post['id'])); ?> " style ="color:#63c34e">подробнее...</a>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            
        </div>
<!-- пагинация-->
        <div class="d-flex justify-content-center">
        <div class="text-success" style="font-size: 20px"><?php echo e($posts->withQueryString()->links()); ?></div>
        </div>
</section>
        
        
        
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.guest', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/5.5/resources/views/post/index.blade.php ENDPATH**/ ?>