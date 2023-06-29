<?php $__env->startSection('content'); ?>
   
<body>
<section class="home">
<h1 class="title"> Категория <span>
     <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php $__currentLoopData = $product_cat; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <?php echo e($category->id == $product->category_id ? $category->title:''); ?>

        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
   </span>  <a href="<?php echo e(route('product.index')); ?>" class="btn">К каталогу продуктов</a></h1>
   
   <?php $__currentLoopData = $product_cat; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
   <div class="card m-4 w-75">
                <div class="card-header" style="background: #99eb917d">

                    <div class="callout mb-1 w-90">
                        <h3 class="fw-light text-muted"><?php echo e($product->name); ?></h3>
                    </div>
                </div>
               
                
                    <div class="m-4">
                        <p class="text-muted">содержит в 100 граммах: <?php echo e($product->carb); ?>углеводов/<?php echo e($product->prot); ?>белков/<?php echo e($product->fat); ?>жиров</p>
                        <p class="text-muted">гикемический индекс: <?php echo e($product->G); ?></p>
                        <p class="text-muted">note: </p>
                    </div>
                <hr>
                   
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

    
    
   
   
       
        
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        
    
</section> 


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.guest', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/first_project/resources/views/product/showByCategory.blade.php ENDPATH**/ ?>