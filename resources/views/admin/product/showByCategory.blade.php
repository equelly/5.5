@extends('layouts.guest')
@section('content')
   
</head>
<body>
<br>
<br>

    <br>
    <H1>каталог</H1>
    <h1 class="title">Категория<span>
    
    
    
    @foreach($categories as $category)
      
    {{$category->id == $product->id ? $category->title:''}}
      
    @endforeach
    </span></h1>
        
       
        @foreach($product_cat as $product)
      <div class="card m-4 w-75">
        <div class="card-header" style="background: #99eb917d">
          
          <!-- ссылка <a href ="{{route('product.show', $product->id)}} " style = "color: green"></a>-->
          <form action="/session" method="POST">
          @csrf
          <p><H1>{{$product->name}}</H1> масса-
           
              <input class = "w-25 ml-6" type="text" name = "massa" placeholder="грамм" required>
          </p>
        </div>
        
            <div class="card-body">
              <h5 class="card-title">содержит: {{$product->prot}}бел./{{$product->fat}}жир./{{$product->carb}}угл.</h5>
              <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
              
                <input type="hidden" name="action" value="добавить" >
              <div style="align-content: center;">
                <button class="btn btn-card w-50 m-3" name= "product_id" type= 'submit' value ='{{$product->id}}'>добавить к рецепту</button>
              </div>
            </div>
          </div>
        </form>
      @endforeach
    <div>
        <a href="{{route('product.index')}}" class="btn btn-primary mt-3">вернуться к списку продуктов</a>
    </div>
    


@endsection