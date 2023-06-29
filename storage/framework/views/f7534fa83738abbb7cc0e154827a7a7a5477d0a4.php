<?php $__env->startSection('content'); ?>
    <title>Posts</title>
</head>
<body>
    <H1>Редактировать рецепт №<?php echo e($post->id); ?>.</H1>
    <p><h3>всего рецептов:  <?php echo e($posts->count()); ?></h3></p>
    
    <div>
    <form action =  "<?php echo e(route('admin.post.update', $post->id)); ?>" method = "post">
    <!-- токен для безопасной передачи данных всеми методами кроме get-->    
    <?php echo csrf_field(); ?>
    <!--токен для редактирования, т.к. в html нет метода put/patch -->
    <?php echo method_field('patch'); ?>
  <div class="mb-3">
    <label for="title" class="form-label">Title</label>
    <input type="text" name = "title" class="form-control" id="title" placeholder = "title" value = "<?php echo e($post->title); ?>">
    
  </div>
  <div class="mb-3">
    <label for="content" class="form-label">Content</label>
    <textarea name = "content" class="form-control" id="content" placeholder = "content"><?php echo e($post->content); ?></textarea>
    
  </div>
  <div class="mb-3">
    <label for="image" class="form-label">Image</label>
    <input type="text" name = "image" class="form-control" id="image" placeholder = "image.jpeg" value = "<?php echo e($post->image); ?>">
    
  </div>
  <div class="form-group">
    <label for="products">продукты</label>
    <select multiple class = "form-control" name = "products[]" id="products">
      <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

      <option 
        <?php $__currentLoopData = $postProducts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $postProduct): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php echo e($product->id === $postProduct->product_id && $post->id === $postProduct->post_id ? 'selected' : ''); ?>

        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        value="<?php echo e($product->id); ?>"><?php echo e($product->name); ?>

        
      </option>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      
    </select>
     
  </div><div>
        <button type="submit" class="btn btn-primary mb-3">обновить </button>
  
        <a href="<?php echo e(route('admin.post.index')); ?>" class="btn btn-primary mb-3">вернуться</a>
    </div>
</form>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/first_project/resources/views/admin/post/edit.blade.php ENDPATH**/ ?>