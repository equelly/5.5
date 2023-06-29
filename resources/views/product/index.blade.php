@extends('layouts.guest')
@section('content')

<body>

  
  <section class="home">
    
    <h1 class="title"> Категории <span>продуктов</span> </h1>
    <!-- Slider main container -->
    <div class="swiper">
      <!-- Additional required wrapper -->
      <div class="preview-list swiper-wrapper">
        <!-- Slides -->
        @foreach($categories as $category)
        <div class="preview-item swiper-slide">
          <div class="text mt-4">
            <a href="{{route('product.showByCategory', $category->id)}} " class="btn-slide">{{$category->title}}</a>
          </div>
          <img src="/dist/img/foto{{$category->id}}.jpg" alt='' width="50" height="10" style="border-radius: 10px;">
        </div>
        @endforeach
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
        @foreach($categories as $category)
        <div class="swiper-slide">
          <a href="{{route('product.showByCategory', $category->id)}} " class="btn-slide" style="background:#94bda3; width: 15rem; height: 7rem;">{{$category->title}} </a>

        </div>
        @endforeach
      </div>
    </div>
  </section>
  <section class="home mt-1">
   
    @if (auth()->user() && auth()->user()->role == 'admin') 
    <div  style="display: flex; flex-wrap: wrap; align-content: center; font-size: 2rem;" class="card m-4 w-75">
    <H1>добавление продукта в БД</H1>
    
    
    
          <form action =  "{{route('product.store')}}" method = "POST">
          <!-- токен для безопасной передачи данных всеми методами кроме get-->    
          @csrf
        <div class="w-90">
          <label for="name" class="form-label">наименование</label>
          <input type="text" name = "name" value ="{{old('name')}}" class="form-control" 
          id="title" placeholder = "введите название" required style="font-size: 2rem;">
          
          @error('name')
            <p class="text-danger">{{$message}}</p>

          @enderror
        </div>
        <div class="w-50">
          <label for="fat" class="form-label">жиры</label>
          <input type="text" name = "fat" class="form-control" value ="{{old('fat')}}"
          id="fat" placeholder = "введите..." required style="font-size: 2rem;">
        </div>
        @error('fat')
            <p class="text-danger">{{$message}}</p>

          @enderror
        <div class="w-50">
          <label for="carb" class="form-label">углеводы</label>
          <input type="text" name = "carb" class="form-control" value ="{{old('carb')}}"
          id="carb" placeholder = "введите..." required style="font-size: 2rem;">
        </div>
        @error('carb')
            <p class="text-danger">{{$message}}</p>

          @enderror
        <div class="w-50">
          <label for="prot" class="form-label">белки</label>
          <input type="text" name = "prot" class="form-control" value ="{{old('prot')}}"
          placeholder = "введите..." required style="font-size: 2rem;">
        </div>
        @error('prot')
            <p class="text-danger">{{$message}}</p>

          @enderror
          <div class="w-50">
          <label for="fat" class="form-label">G-индекс</label>
          <input type="text" name = "G" class="form-control" value ="{{old('G')}}"
          id="G" placeholder = "введите..." style="font-size: 2rem;">
        </div>
        @error('G')
            <p class="text-danger">{{$message}}</p>

          @enderror
        <div class="form-group w-50">
            <label for="category">Категория</label>
              <select class="form-select" id = "category" name = 'category_id' style="font-size: 2rem;">
                
              @foreach($categories as $category)  
                <option  
                {{ old ('category_id') == $category->id ? 'selected' : 'выбрать категорию'}}
                value="{{$category->id}}">{{$category->title}}</option>
              @endforeach
              </select>
          </div>
        <button type="submit" class="btn btn-primary m-3">добавить</button>
      </form>
    
    @error('category')
      <p class="text-danger">{{$message}}</p>
    @enderror
    </div>    
    @endif
    <div class="col">
    <h2>Найдите продукты для Вашего рецепта в поле поиска <br>или из каталога</h2>
        <div id="searchproduct">
            <searchproduct-component></searchproduct-component>
        </div>
     <h3>Для рецепта 
      @if(isset($productsCart)) выбрано продуктов-{{count($productsCart)}}
      
      <form action = "" method = "POST">
        <!-- токен для безопасной передачи данных всеми методами кроме get-->    
        @csrf
        <input type="hidden" name="user_id" value="{{ Auth::user() == null ? '': Auth::user()->id}}">
          <div class="card m-4 w-75">
            <div class="card-header" style="background: #99eb917d">
            <input type="text" name = "title" value ="{{old('title')}}" class="form-control w-75 m-4" style="font-size: 18px;" 
        id="title" placeholder = "Название вашего рецепта..." >
        
        @error('title')
          <p class="text-danger">{{$message}}</p>

        @enderror
            </div>
              <div class="card-body">
                <p class="card-title">необходимые продукты: 
                @foreach($productsCart as $element)
                
                  <div class="btn btn m-2 p-2" style = "width: auto;font-size: 1.4rem">{{$element->name}}/
                  
                   <?php for($i = 0; $i < count($totalMassa); ++$i){
                          if($element['name'] == $totalMassa[$i]['name']){
                            echo ($totalMassa[$i]['massa']);
                          }
                      }?> грамм</div>
                       
                  @endforeach
                </p>
                <p>Общая масса:{{$sumMass}} гр. Содержание в граммах: </p> 
                <input type="text" name = "carb" value ="{{$totalCarb}}" style="width: 10rem; border-bottom: 2px solid #bdf5b0" placeholder = "{{$totalCarb}}"> углеводов<br>
                <input type="text" name = "prot" value ="{{$totalProt}}" style="width: 10rem; border-bottom: 2px solid #bdf5b0" placeholder = "{{$totalProt}}"> белков<br>
                <input type="text" name = "fat" value ="{{$totalFat}}" style="width: 10rem; border-bottom: 2px solid #bdf5b0" placeholder = "{{$totalFat}}"> жиров<br>
               <h3>Итого хлебных ед. - 
               <input type="text" name = "" value ="{{$totalXE}}" class="" style="width: 10rem; border-bottom: 2px solid #bdf5b0" placeholder = "{{$totalXE}}" >
                
                </h3> 
                <h3>B 100 граммах - 
               <input type="text" name = "carbpercent" value ="{{$carbpercent}}" class="" style="width: 10rem; border-bottom: 2px solid #bdf5b0" placeholder = "{{$carbpercent}}" >
                
                </h3> 
                <hr>
                
                <div class="mb-3">
                  <label for="content" class="form-label">Способ приготовления</label>
                  <textarea rows="5" name = "content" class="form-control" 
                  id="content" placeholder = "{{old('content')}}" style="font-size: 14px;" ></textarea>
                  @error('content')
                    <p class="text-danger">{{$message}}</p>

                  @enderror
                </div>
                <hr>
                @if (auth()->user())
                <button type="submit" name="action" value="добавить рецепт"class="btn btn-primary m-3 w-95">добавить рецепт</button>
                @endif
                <button type="submit" name="action" value="Очистить" class="btn btn-primary m-3 w-95">удалить продукты</button>
              </div>
          </div>
      </form>
      @else
         ничего не выбрано</h3>
      @endif


      <h1 class="title">Каталог <span>продуктов</span></h1>
      <h3>Всего продуктов: {{$products->count()}}</h3>
     
      @foreach($sorted as $product)
      <div class="card m-4 w-75">
        <div class="card-header" style="background: #99eb917d">
          
          <!-- ссылка <a href ="{{route('product.show', $product->id)}} " style = "color: green"></a>-->
          <form action="/session" method="POST">
          @csrf
          <H1>{{$product->name   }}  <span style="font-size: 1.2rem;"> масса-</span>
           
              <input class = "w-25 ml-6" type="text" name = "massa" placeholder="грамм" required>
          </H1> 
        </div>
        
            <div class="card-body">
              <h5 class="card-title">содержит: {{$product->prot}}бел./{{$product->fat}}жир./{{$product->carb}}угл.</h5>
              <p class="card-text"></p>
              
                <input type="hidden" name="action" value="добавить" >
              <div style="align-content: center;">
                <button class="btn btn-card w-90 m-3" name= "product_id" type= 'submit' value ='{{$product->id}}'>добавить к рецепту</button>
              </div>
            </div>
          </div>
        </form>
      @endforeach
    </div>
  </section>




  <div>
    {{$sorted->links()}}
  </div>

  @endsection