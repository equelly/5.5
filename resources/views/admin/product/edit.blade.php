@extends('layouts.admin')
@section('content')
    <title>Редактор продукта</title>
    <body>
    <H1>редактирование продукта</H1>
    
    <div>
      <form action ="{{route('admin.product.update', $product->id)}}" method = "POST">
      <!-- токен для безопасной передачи данных всеми методами кроме get-->    
      @csrf
      <!--токен для редактирования, т.к. в html нет метода put/patch -->
      @method('patch')
      <div class="mb-3">
        <label for="title" class="form-label">Title</label>
        <input type="text" name = "name" class="form-control" id="title" placeholder = "title" value = "{{$product->name}}">
      </div>
      <div class="mb-3">
        <label for="fat" class="form-label">жиры</label>
        <input type="text" name = "fat" class="form-control" id="fat" placeholder = "fat" value = "{{$product->fat}}">
      </div>
      <div class="mb-3">
        <label for="carb" class="form-label">углеводы</label>
        <input type="text" name = "carb" class="form-control" id="carb" placeholder = "Углеводы" value = "{{$product->carb}}">
      </div>
      <div class="mb-3">
        <label for="prot" class="form-label">белки </label>
        <input type="text" name = "prot" class="form-control" id="prot" placeholder = "белки" value = "{{$product->prot}}">
      </div>

    

        <div class="form-group">
          <label for="category">Категория</label>
            <select class="form-select" name = "category_id" id="category">
              <option selected>this select menu</option>
            @foreach($categories as $category)  
            
              <option 
                {{$category->id == $product->category_id ? 'selected' : ''}}
              
              value="{{$category->id}}">{{$category->title}}</option>
            @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary mt-3">обновить</button>
      </form>
    </div>
@endsection