<?php $__env->startSection('content'); ?>

<body>
<section class="home">
<h1 class="title"> Карточка <span>рецепта</span></h1>
  <H1>Редактировать рецепт:</H1>
    <div class="ml-5">
      <div class="card m-4 w-75">
        <div class="card-header" style="background: #99eb917d">
          <div class="callout mb-1 w-90">
            <form action =  "<?php echo e(route('post.update', $post->id)); ?>" method = "POST">
              <!-- токен для безопасной передачи данных всеми методами кроме get-->    
              <?php echo csrf_field(); ?>
              <!--токен для редактирования, т.к. в html нет метода put/patch -->
              <?php echo method_field('patch'); ?>
            <input type="text" name = "title" value ="<?php echo e(old('title')); ?>" class="form-control w-75 m-4" style="font-size: 18px;" id="title" placeholder = '<?php echo e($post->title); ?>' >
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
                    <label for="content" class="form-label">Способ приготовления</label>
                      <textarea rows="5" name = "content" class="form-control" 
                      id="content" placeholder = '<?php echo e($post->content); ?>' style="font-size: 14px;" ></textarea>
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
          </div>
            <div>
              <a href="<?php echo e(route('post.index')); ?>" class="btn btn-primary m-3" style="width: 95%;">вернуться к рецептам</a>
            </div>
              <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view', auth()->user())): ?>
            <div>
            <!--оборачиваем в форму т.к. в html нет метода delete -->
              <form action="<?php echo e(route('post.delete', $post->id)); ?>" method="post">
                <?php echo csrf_field(); ?>
                  <?php echo method_field('delete'); ?>
                    <input type="submit" value = "удалить!" class="btn btn-primary m-3" style="width: 95%;">
              </form>
                    
            </div>
                <?php endif; ?>

        </form>
      </div>
    </div>
              
</section>
    
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.guest', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/first_project/resources/views/post/edit.blade.php ENDPATH**/ ?>