<?php $__env->startSection('content'); ?>

<body>
<section class="home">
<h1 class="title"> Карточка <span>продукта</span></h1>
        <H1>выбран продукт:</H1>
        <div class="card m-4 w-75">
                <div class="card-header" style="background: #99eb917d">

                    <div class="callout mb-1 w-90">
                        <h3 class="fw-light text-muted"><?php echo e($product->name); ?></h3>
                    </div>
                </div>
                <div class="card-body">
                    <p> категория:
                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php echo e($category->id == $product->category_id ? $category->title:''); ?>

                    
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></p>
                </div>
                <hr>
                    <div class="m-4">
                        <p class="text-muted">содержит в 100 граммах: <?php echo e($product->carb); ?>углеводов/<?php echo e($product->prot); ?>белков/<?php echo e($product->fat); ?>жиров</p>
                        <p class="text-muted">гикемический индекс: <?php echo e($product->G); ?></p>
                        <p class="text-muted">note: </p>
                    </div>
                <hr>
                    <div>
                        <a href="<?php echo e(route('product.index')); ?>" class="btn btn-primary m-3">вернуться к списку продуктов</a>
                    </div>
                    <?php if(auth()->user() && auth()->user()->role == 'admin'): ?>
                        <div>
                            <a href="<?php echo e(route('product.edit', $product->id)); ?>" class="btn btn-primary m-3">редактировать</a>
                        </div>
                        <div>
                            <!--оборачиваем в форму т.к. в html нет метода delete -->
                            <form action="<?php echo e(route('product.delete', $product->id)); ?>" method="POST">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('delete'); ?>
                                <input type="submit" value = "удалить!" class="btn btn-primary m-3">
                            </form>
                            
                        </div>
                    <?php endif; ?>
        </div>
    </div>
</section>
<br>
<br>
  <br>
    <H1>редактирование продукта</H1>
    
    <div>
    <form action ="<?php echo e(route('product.update', $product->id)); ?>" method = "post">
    <!-- токен для безопасной передачи данных всеми методами кроме get-->    
    <?php echo csrf_field(); ?>
    <!--токен для редактирования, т.к. в html нет метода put/patch -->
    <?php echo method_field('patch'); ?>
  <div class="mb-3">
    <label for="title" class="form-label">Title</label>
    <input type="text" name = "name" class="form-control w-25" id="title" placeholder = "title" value = "<?php echo e($product->name); ?>">
  </div>
  <div class="mb-3">
    <label for="fat" class="form-label">жиры</label>
    <input type="text" name = "fat" class="form-control w-25" id="fat" placeholder = "fat" value = "<?php echo e($product->fat); ?>">
  </div>
  <div class="mb-3">
    <label for="carb" class="form-label">углеводы</label>
    <input type="text" name = "carb" class="form-control w-25" id="carb" placeholder = "Углеводы" value = "<?php echo e($product->carb); ?>">
  </div>
  <div class="mb-3">
    <label for="prot" class="form-label w-25">белки </label>
    <input type="text" name = "prot" class="form-control" id="prot" placeholder = "белки" value = "<?php echo e($product->prot); ?>">
  </div>

  

  <div class="form-group">
      <label for="category">Категория</label>
        <select class="form-select w-25" name = "category_id" id="category">
          <option selected>this select menu</option>
        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>  
        
          <option 
            <?php echo e($category->id == $product->category_id ? 'selected' : ''); ?>

          
          value="<?php echo e($category->id); ?>"><?php echo e($category->title); ?></option>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
    </div>

  <button type="submit" class="btn btn-primary mt-3  w-25">обновить</button>
</form>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.guest', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/first_project/resources/views/product/edit.blade.php ENDPATH**/ ?>