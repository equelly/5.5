<?php $__env->startSection('content'); ?>
    <title>Редактор продукта</title>
    <body>
    <H1>редактирование продукта</H1>
    
    <div>
    <form action ="<?php echo e(route('admin.product.update', $product->id)); ?>" method = "POST">
    <!-- токен для безопасной передачи данных всеми методами кроме get-->    
    <?php echo csrf_field(); ?>
    <!--токен для редактирования, т.к. в html нет метода put/patch -->
    <?php echo method_field('patch'); ?>
  <div class="mb-3">
    <label for="title" class="form-label">Title</label>
    <input type="text" name = "name" class="form-control" id="title" placeholder = "title" value = "<?php echo e($product->name); ?>">
  </div>
  <div class="mb-3">
    <label for="fat" class="form-label">жиры</label>
    <input type="text" name = "fat" class="form-control" id="fat" placeholder = "fat" value = "<?php echo e($product->fat); ?>">
  </div>
  <div class="mb-3">
    <label for="carb" class="form-label">углеводы</label>
    <input type="text" name = "carb" class="form-control" id="carb" placeholder = "Углеводы" value = "<?php echo e($product->carb); ?>">
  </div>
  <div class="mb-3">
    <label for="prot" class="form-label">белки </label>
    <input type="text" name = "prot" class="form-control" id="prot" placeholder = "белки" value = "<?php echo e($product->prot); ?>">
  </div>

  

    <div class="form-group">
      <label for="category">Категория</label>
        <select class="form-select" name = "category_id" id="category">
          <option selected>this select menu</option>
        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>  
        
          <option 
            <?php echo e($category->id == $product->category_id ? 'selected' : ''); ?>

          
          value="<?php echo e($category->id); ?>"><?php echo e($category->title); ?></option>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
    </div>
    <button type="submit" class="btn btn-primary mt-3">обновить</button>
</form>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/first_project/resources/views/admin/product/edit.blade.php ENDPATH**/ ?>