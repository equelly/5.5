<?php $__env->startSection('content'); ?>

<body>

  
  <section class="home">
    
    <h1 class="title"> Категории <span>продуктов</span> </h1>
    <!-- Slider main container -->
    <div class="swiper">
      <!-- Additional required wrapper -->
      <div class="preview-list swiper-wrapper">
        <!-- Slides -->
        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="preview-item swiper-slide">
          <div class="text mt-4">
            <a href="<?php echo e(route('product.showByCategory', $category->id)); ?> " class="btn-slide"><?php echo e($category->title); ?></a>
          </div>
          <img src="/dist/img/foto<?php echo e($category->id); ?>.jpg" alt='' width="50" height="10" style="border-radius: 10px;">
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </div>
      <div class="swiper-pagination"></div>

      <!-- If we need navigation buttons -->
      <div class="swiper-button-prev"></div>
      <div class="swiper-button-next"></div>

      <div class="swiper-scrollbar"></div>

    </div>

    <!-- Slider main container -->
    <div class="subswiper">
      <!-- Additional required wrapper -->
      <div class="swiper-wrapper">
        <!-- Slides -->
        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="swiper-slide">
          <a href="<?php echo e(route('product.showByCategory', $category->id)); ?> " class="btn-slide" style="background:#94bda3; width: 15rem; height: 7rem;"><?php echo e($category->title); ?> </a>

        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </div>
    </div>
  </section>
  <section class="home mt-1">
   
    <?php if(auth()->user() && auth()->user()->role == 'admin'): ?> 
    <div  style="display: flex; flex-wrap: wrap; align-content: center; font-size: 2rem;" class="card m-4 w-75">
    <H1>добавление продукта в БД</H1>
    
    
    
          <form action =  "<?php echo e(route('product.store')); ?>" method = "POST">
          <!-- токен для безопасной передачи данных всеми методами кроме get-->    
          <?php echo csrf_field(); ?>
        <div class="w-90">
          <label for="name" class="form-label">наименование</label>
          <input type="text" name = "name" value ="<?php echo e(old('name')); ?>" class="form-control" 
          id="title" placeholder = "введите название" required style="font-size: 2rem;">
          
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
        <div class="w-50">
          <label for="fat" class="form-label">жиры</label>
          <input type="text" name = "fat" class="form-control" value ="<?php echo e(old('fat')); ?>"
          id="fat" placeholder = "введите..." required style="font-size: 2rem;">
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
        <div class="w-50">
          <label for="carb" class="form-label">углеводы</label>
          <input type="text" name = "carb" class="form-control" value ="<?php echo e(old('carb')); ?>"
          id="carb" placeholder = "введите..." required style="font-size: 2rem;">
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
        <div class="w-50">
          <label for="prot" class="form-label">белки</label>
          <input type="text" name = "prot" class="form-control" value ="<?php echo e(old('prot')); ?>"
          placeholder = "введите..." required style="font-size: 2rem;">
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
          <div class="w-50">
          <label for="fat" class="form-label">G-индекс</label>
          <input type="text" name = "G" class="form-control" value ="<?php echo e(old('G')); ?>"
          id="G" placeholder = "введите..." style="font-size: 2rem;">
        </div>
        <?php $__errorArgs = ['G'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            <p class="text-danger"><?php echo e($message); ?></p>

          <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        <div class="form-group w-50">
            <label for="category">Категория</label>
              <select class="form-select" id = "category" name = 'category_id' style="font-size: 2rem;">
                
              <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>  
                <option  
                <?php echo e(old ('category_id') == $category->id ? 'selected' : 'выбрать категорию'); ?>

                value="<?php echo e($category->id); ?>"><?php echo e($category->title); ?></option>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </select>
          </div>
        <button type="submit" class="btn btn-primary m-3">добавить</button>
      </form>
    
    <?php $__errorArgs = ['category'];
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
    <?php endif; ?>
    <div class="col">
    <h2>Найдите продукты для Вашего рецепта в поле поиска <br>или из каталога</h2>
        <div id="searchproduct">
            <searchproduct-component></searchproduct-component>
        </div>
     <h3>Для рецепта 
      <?php if(isset($productsCart)): ?> выбрано продуктов-<?php echo e(count($productsCart)); ?>

      
      <form action = "" method = "POST">
        <!-- токен для безопасной передачи данных всеми методами кроме get-->    
        <?php echo csrf_field(); ?>
        <input type="hidden" name="user_id" value="<?php echo e(Auth::user() == null ? '': Auth::user()->id); ?>">
          <div class="card m-4 w-75">
            <div class="card-header" style="background: #99eb917d">
            <input type="text" name = "title" value ="<?php echo e(old('title')); ?>" class="form-control w-75 m-4" style="font-size: 18px;" 
        id="title" placeholder = "Название вашего рецепта..." >
        
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
              <div class="card-body">
                <p class="card-title">необходимые продукты: 
                <?php $__currentLoopData = $productsCart; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $element): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                
                  <div class="btn btn m-2 p-2" style = "width: auto;font-size: 1.4rem"><?php echo e($element->name); ?>/
                  
                   <?php for($i = 0; $i < count($totalMassa); ++$i){
                          if($element['name'] == $totalMassa[$i]['name']){
                            echo ($totalMassa[$i]['massa']);
                          }
                      }?> грамм</div>
                       
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </p>
                <p>Общая масса:<?php echo e($sumMass); ?> гр. Содержание в граммах: </p> 
                <input type="text" name = "carb" value ="<?php echo e($totalCarb); ?>" style="width: 10rem; border-bottom: 2px solid #bdf5b0" placeholder = "<?php echo e($totalCarb); ?>"> углеводов<br>
                <input type="text" name = "prot" value ="<?php echo e($totalProt); ?>" style="width: 10rem; border-bottom: 2px solid #bdf5b0" placeholder = "<?php echo e($totalProt); ?>"> белков<br>
                <input type="text" name = "fat" value ="<?php echo e($totalFat); ?>" style="width: 10rem; border-bottom: 2px solid #bdf5b0" placeholder = "<?php echo e($totalFat); ?>"> жиров<br>
               <h3>Итого хлебных ед. - 
               <input type="text" name = "" value ="<?php echo e($totalXE); ?>" class="" style="width: 10rem; border-bottom: 2px solid #bdf5b0" placeholder = "<?php echo e($totalXE); ?>" >
                
                </h3> 
                <h3>B 100 граммах - 
               <input type="text" name = "carbpercent" value ="<?php echo e($carbpercent); ?>" class="" style="width: 10rem; border-bottom: 2px solid #bdf5b0" placeholder = "<?php echo e($carbpercent); ?>" >
                
                </h3> 
                <hr>
                
                <div class="mb-3">
                  <label for="content" class="form-label">Способ приготовления</label>
                  <textarea rows="5" name = "content" class="form-control" 
                  id="content" placeholder = "<?php echo e(old('content')); ?>" style="font-size: 14px;" ></textarea>
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
                <hr>
                <?php if(auth()->user()): ?>
                <button type="submit" name="action" value="добавить рецепт"class="btn btn-primary m-3 w-95">добавить рецепт</button>
                <?php endif; ?>
                <button type="submit" name="action" value="Очистить" class="btn btn-primary m-3 w-95">удалить продукты</button>
              </div>
          </div>
      </form>
      <?php else: ?>
         ничего не выбрано</h3>
      <?php endif; ?>


      <h1 class="title">Каталог <span>продуктов</span></h1>
      <h3>Всего продуктов: <?php echo e($products->count()); ?></h3>
     
      <?php $__currentLoopData = $sorted; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <div class="card m-4 w-75">
        <div class="card-header" style="background: #99eb917d">
          
          <!-- ссылка <a href ="<?php echo e(route('product.show', $product->id)); ?> " style = "color: green"></a>-->
          <form action="/session" method="POST">
          <?php echo csrf_field(); ?>
          <H1><?php echo e($product->name); ?>  <span style="font-size: 1.2rem;"> масса-</span>
           
              <input class = "w-25 ml-6" type="text" name = "massa" placeholder="грамм" required>
          </H1> 
        </div>
        
            <div class="card-body">
              <h5 class="card-title">содержит: <?php echo e($product->prot); ?>бел./<?php echo e($product->fat); ?>жир./<?php echo e($product->carb); ?>угл.</h5>
              <p class="card-text"></p>
              
                <input type="hidden" name="action" value="добавить" >
              <div style="align-content: center;">
                <button class="btn btn-card w-90 m-3" name= "product_id" type= 'submit' value ='<?php echo e($product->id); ?>'>добавить к рецепту</button>
              </div>
            </div>
          </div>
        </form>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
  </section>




  <div>
    <?php echo e($sorted->links()); ?>

  </div>
  <?php $__env->stopSection(); ?>
  
<?php echo $__env->make('layouts.guest', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/5.5/resources/views/product/index.blade.php ENDPATH**/ ?>