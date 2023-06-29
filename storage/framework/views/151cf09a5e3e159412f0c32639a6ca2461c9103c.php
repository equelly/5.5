<?php $__env->startSection('content'); ?>
<body>
    <H1>выбран продукт:</H1>
    
   
    <div>

    <p> <?php echo e($product->id); ?>. <?php echo e($product->name); ?></p>
    <p> категория:
    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <?php echo e($category->id == $product->category_id ? $category->title:''); ?>

    
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></p>
    </div>
    <div>
        <a href="<?php echo e(route('admin.product.index')); ?>" class="btn btn-primary mt-3">вернуться к списку продуктов</a>
    </div>
    <div>
        <a href="<?php echo e(route('admin.product.edit', $product->id)); ?>" class="btn btn-primary mt-3">редактировать</a>
    </div>
    <div>
        <!--оборачиваем в форму т.к. в html нет метода delete -->
        <form action="<?php echo e(route('admin.product.delete', $product->id)); ?>" method="post">
            <?php echo csrf_field(); ?>
            <?php echo method_field('delete'); ?>
            <input type="submit" value = "удалить!" class="btn btn-primary mt-3">
        </form>
        
    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/first_project/resources/views/admin/product/show.blade.php ENDPATH**/ ?>