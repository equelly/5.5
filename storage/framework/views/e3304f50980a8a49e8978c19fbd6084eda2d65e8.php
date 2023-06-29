<?php $__env->startSection('content'); ?>
<H1>каталог</H1>
<H1>добавление продукта в католог </H1>
    
    
    <div>
    <form action =  "<?php echo e(route('admin.product.store')); ?>" method = "POST">
    <!-- токен для безопасной передачи данных всеми методами кроме get-->    
    <?php echo csrf_field(); ?>
  <div class="mb-3">
    <label for="name" class="form-label">Название</label>
    <input type="text" name = "name" value ="<?php echo e(old('name')); ?>" class="form-control" 
    id="title" placeholder = "введите название">
    
    <?php $__errorArgs = ['name'];
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
  <div class="mb-3">
    <label for="fat" class="form-label">жиры</label>
    <input type="text" name = "fat" class="form-control" value ="<?php echo e(old('fat')); ?>"
    id="fat" placeholder = "введите...">
  </div>
  <?php $__errorArgs = ['fat'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
      <p class="text-danger"><?php echo e($message); ?></p>

    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
  <div class="mb-3">
    <label for="carb" class="form-label">углеводы</label>
    <input type="text" name = "carb" class="form-control" value ="<?php echo e(old('carb')); ?>"
    id="carb" placeholder = "введите...">
  </div>
  <?php $__errorArgs = ['carb'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
      <p class="text-danger"><?php echo e($message); ?></p>

    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
  <div class="mb-3">
    <label for="prot" class="form-label">белки</label>
    <input type="text" name = "prot" class="form-control" value ="<?php echo e(old('prot')); ?>"
     placeholder = "введите...">
  </div>
  <?php $__errorArgs = ['prot'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
      <p class="text-danger"><?php echo e($message); ?></p>

    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
  <div class="form-group">
      <label for="category">Категория</label>
        <select class="form-select" id = "category" name = "category_id" >
          
        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>  
          <option  
          <?php echo e(old ('category_id') == $category->id ? 'selected' : 'выбрать категорию'); ?>

           value="<?php echo e($category->id); ?>"><?php echo e($category->title); ?></option>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
    </div>
  <button type="submit" class="btn btn-primary mt-3">добавить</button>
</form>
    </div><?php $__errorArgs = ['category'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
      <p class="text-danger"><?php echo e($message); ?></p>

    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/first_project/resources/views/admin/product/create.blade.php ENDPATH**/ ?>