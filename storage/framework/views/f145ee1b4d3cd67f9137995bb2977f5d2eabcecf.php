<?php $__env->startSection('content'); ?>
<H1>рецепты</H1>
    <div>
    <H1>новый рецепт</H1>
    <p><h3>всего рецептов:  <?php echo e($posts->count()); ?></h3></p>
    
    <div>
    <form action =  "<?php echo e(route('admin.post.store')); ?>" method = "POST">
    <!-- токен для безопасной передачи данных всеми методами кроме get-->    
    <?php echo csrf_field(); ?>
  <div class="mb-3 w-25">
    <label for="title" class="form-label">Title</label>
    <input type="text" name = "title" class="form-control" value ="<?php echo e(old('title')); ?>"
    id="title" placeholder = "title">
    
    <?php $__errorArgs = ['title'];
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
  <div class="mb-3 w-75">
    <label for="content" class="form-label">Content</label>
    <textarea name = "content" class="form-control" 
    id="content" placeholder = "content"><?php echo e(old('content')); ?></textarea>
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
  <div class="mb-3 w-25">
    <label for="image" class="form-label">Image</label>
    <input type="text" name = "image" class="form-control" value ="<?php echo e(old('image')); ?>"
    id="image" placeholder = "image.jpeg">
    <?php $__errorArgs = ['image'];
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
  <div class="form-group">
    <label for="products">продукты</label>
    <select multiple class = "form-control" name = "products[]" id="products">
      <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <option 
        <?php echo e((is_array(old('products')) and in_array($product->id, old('products'))) ? ' selected' : ''); ?>

      value="<?php echo e($product->id); ?>"><?php echo e($product->name); ?></option>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </select>

  </div>
    <div>
        <button type="submit" class="btn btn-primary mb-3">добавить </button>
  
        <a href="<?php echo e(route('admin.post.index')); ?>" class="btn btn-primary mb-3">вернуться</a>
    </div>
</form>
    
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/first_project/resources/views/admin/post/create.blade.php ENDPATH**/ ?>