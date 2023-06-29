<?php $__env->startSection('content'); ?>
   
</head>
<body>
<br>
<br>

    <br>
    <H1>каталог</H1>
    <h1 class="title">Категория<span>
    
    
    
    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      
    <?php echo e($category->id == $product->id ? $category->title:''); ?>

      
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </span></h1>
        
       
        <?php $__currentLoopData = $product_cat; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <div class="card m-4 w-75">
        <div class="card-header" style="background: #99eb917d">
          
          <!-- ссылка <a href ="<?php echo e(route('product.show', $product->id)); ?> " style = "color: green"></a>-->
          <form action="/session" method="POST">
          <?php echo csrf_field(); ?>
          <p><H1><?php echo e($product->name); ?></H1> масса-
           
              <input class = "w-25 ml-6" type="text" name = "massa" placeholder="грамм" required>
          </p>
        </div>
        
            <div class="card-body">
              <h5 class="card-title">содержит: <?php echo e($product->prot); ?>бел./<?php echo e($product->fat); ?>жир./<?php echo e($product->carb); ?>угл.</h5>
              <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
              
                <input type="hidden" name="action" value="добавить" >
              <div style="align-content: center;">
                <button class="btn btn-card w-50 m-3" name= "product_id" type= 'submit' value ='<?php echo e($product->id); ?>'>добавить к рецепту</button>
              </div>
            </div>
          </div>
        </form>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <div>
        <a href="<?php echo e(route('product.index')); ?>" class="btn btn-primary mt-3">вернуться к списку продуктов</a>
    </div>
    


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.guest', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/first_project/resources/views/admin/product/showByCategory.blade.php ENDPATH**/ ?>