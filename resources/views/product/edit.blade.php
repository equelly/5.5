@extends('layouts.guest')
@section('content')

<body>
<section class="home">
<h1 class="title"> Карточка <span>продукта</span></h1>
        <H1>выбран продукт:</H1>
        <div class="card m-4 w-75">
                <div class="card-header" style="background: #99eb917d">

                    <div class="callout mb-1 w-90">
                        <h3 class="fw-light text-muted">{{$product->name}}</h3>
                    </div>
                </div>
                <div class="card-body">
                    <p> категория:
                    @foreach($categories as $category)
                    {{$category->id == $product->category_id ? $category->title:''}}
                    
                    @endforeach</p>
                </div>
                <hr>
                    <div class="m-4">
                        <p class="text-muted">содержит в 100 граммах: {{$product->carb}}углеводов/{{$product->prot}}белков/{{$product->fat}}жиров</p>
                        <p class="text-muted">гикемический индекс: {{$product->G}}</p>
                        <p class="text-muted">note: </p>
                    </div>
                <hr>
                    <div>
                        <a href="{{route('product.index')}}" class="btn btn-primary m-3">вернуться к списку продуктов</a>
                    </div>
                    @if (auth()->user() && auth()->user()->role == 'admin')
                        <div>
                            <a href="{{route('product.edit', $product->id)}}" class="btn btn-primary m-3">редактировать</a>
                        </div>
                        <div>
                            <!--оборачиваем в форму т.к. в html нет метода delete -->
                            <form action="{{route('product.delete', $product->id)}}" method="POST">
                                @csrf
                                @method('delete')
                                <input type="submit" value = "удалить!" class="btn btn-primary m-3">
                            </form>
                            
                        </div>
                    @endif
        </div>
    </div>
</section>
<br>
<br>
  <br>
    <H1>редактирование продукта</H1>
    
    <div>
    <form action ="{{route('product.update', $product->id)}}" method = "post">
    <!-- токен для безопасной передачи данных всеми методами кроме get-->    
    @csrf
    <!--токен для редактирования, т.к. в html нет метода put/patch -->
    @method('patch')
  <div class="mb-3">
    <label for="title" class="form-label">Title</label>
    <input type="text" name = "name" class="form-control w-25" id="title" placeholder = "title" value = "{{$product->name}}">
  </div>
  <div class="mb-3">
    <label for="fat" class="form-label">жиры</label>
    <input type="text" name = "fat" class="form-control w-25" id="fat" placeholder = "fat" value = "{{$product->fat}}">
  </div>
  <div class="mb-3">
    <label for="carb" class="form-label">углеводы</label>
    <input type="text" name = "carb" class="form-control w-25" id="carb" placeholder = "Углеводы" value = "{{$product->carb}}">
  </div>
  <div class="mb-3">
    <label for="prot" class="form-label w-25">белки </label>
    <input type="text" name = "prot" class="form-control" id="prot" placeholder = "белки" value = "{{$product->prot}}">
  </div>

  

  <div class="form-group">
      <label for="category">Категория</label>
        <select class="form-select w-25" name = "category_id" id="category">
          <option selected>this select menu</option>
        @foreach($categories as $category)  
        
          <option 
            {{$category->id == $product->category_id ? 'selected' : ''}}
          
          value="{{$category->id}}">{{$category->title}}</option>
        @endforeach
        </select>
    </div>

  <button type="submit" class="btn btn-primary mt-3  w-25">обновить</button>
</form>
    </div>
@endsection