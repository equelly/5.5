<?php $__env->startSection('content'); ?>
    
</head>
<body>
<section class="home">
    <div class="container p-1">
        <H1 class="title">Рецепт:  <span> <?php echo e($post->title); ?>.</span></H1>
        <p><h3>всего рецептов:  <?php echo e($posts->count()); ?></h3></p>
        <div class="m-1">
           
            <div class="card" style="width:100%">
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
        
            <div class="">
            
                
            <?php if(auth()->user() && (auth()->user()->role=='user'|| auth()->user()->role=='admin')): ?>              
                <div class="m-5">
                <form action="<?php echo e(route('post.comment.store', $post->id)); ?>" method="POST"> 
                    <?php echo csrf_field(); ?>
                    <label for="content" class="form-label"><i class='far fa-edit' style='font-size:24px;color:#63c34e'></i>оставить комментарий</label>
                    <textarea name = "message" class="form-control" rows="4" cols="50" style="font-size: 1.5rem;"
                    id="content" placeholder = "текст комментария..." required><?php echo e(old('content')); ?></textarea>
                    <?php $__errorArgs = ['content'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <p class="text-danger"><?php echo e($message); ?></p>

                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    <button type="submit" class="btn btn-primary m-4">добавить</button>
                </form>    
                </div>
            <?php endif; ?>
            </div>   
        </div>  
    </div>
    <H1 class="title">Комментарии <span>(<?php echo e($comments->count()); ?>)</span></H1>
    <?php $__currentLoopData = $comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    
        <div class="toast m-4" style="display:block; font-size:1.1em; width: 90%" false role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header">
              
                <strong class="me-auto"><?php echo e($comment->name); ?> </strong>
                <small class="text-body-secondary"><?php echo e($comment->created_at); ?></small>
                <?php if(auth()->user() && (auth()->user()->name == $comment->name)): ?>
                
                <form action="<?php echo e(route('post.comment.delete', [$post->id, $comment->id])); ?>" method="POST"> 
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('DELETE'); ?>
                <button type="submit" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                </form>
                <?php endif; ?>
            </div>
            <div class="toast-body">
            <?php echo e($comment->message); ?>

            </div>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
       

    </section>
  
   
    
    
    


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.guest', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/5.5/resources/views/post/show.blade.php ENDPATH**/ ?>