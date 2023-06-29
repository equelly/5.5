<?php $__env->startSection('content'); ?>

<title>добавить продукт</title>
</head>
<body>
    <H1>продукты</H1>
    <p>количество: <?php echo e($products->total()); ?></p>
   
     <div>
        <a href="<?php echo e(route('admin.product.create')); ?>" class="btn btn-primary mb-3">добавить новый продукт</a>
     
   <div class="col-4">
    <div id="list-example" class="list-group-flush sticky-top ">
    <h3>категории</h3>
      <div class="table-responsive">
            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div>
            <a href ="<?php echo e(route('admin.product.showByCategory', $category->id)); ?> "> <?php echo e($category->id); ?>. <?php echo e($category->title); ?></a>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
           
            <div class="col-7">	 
        <h3>каталог</h3>   
    <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div>
    <a href ="<?php echo e(route('admin.product.show', $product->id)); ?> "> 
        
        <?php echo e($product->id); ?>. <?php echo e($product->name); ?> = <?php echo e($product->carb); ?></a>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
    </div>
        </div>
    </div>
   </div>
   
   
        </div>
        <div>
        <?php echo e($products->links()); ?>

        </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/first_project/resources/views/admin/product/index.blade.php ENDPATH**/ ?>