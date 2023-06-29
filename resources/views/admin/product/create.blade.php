@extends('layouts.admin')

@section('content')
<H1>каталог</H1>
<H1>добавление продукта в католог </H1>
    
    
    <div>
    <form action =  "{{route('admin.product.store')}}" method = "POST">
    <!-- токен для безопасной передачи данных всеми методами кроме get-->    
    @csrf
  <div class="mb-3">
    <label for="name" class="form-label">Название</label>
    <input type="text" name = "name" value ="{{old('name')}}" class="form-control" 
    id="title" placeholder = "введите название">
    
    @error('name')
      <p class="text-danger">{{$message}}</p>

    @enderror
  </div>
  <div class="mb-3">
    <label for="fat" class="form-label">жиры</label>
    <input type="text" name = "fat" class="form-control" value ="{{old('fat')}}"
    id="fat" placeholder = "введите...">
  </div>
  @error('fat')
      <p class="text-danger">{{$message}}</p>

    @enderror
  <div class="mb-3">
    <label for="carb" class="form-label">углеводы</label>
    <input type="text" name = "carb" class="form-control" value ="{{old('carb')}}"
    id="carb" placeholder = "введите...">
  </div>
  @error('carb')
      <p class="text-danger">{{$message}}</p>

    @enderror
  <div class="mb-3">
    <label for="prot" class="form-label">белки</label>
    <input type="text" name = "prot" class="form-control" value ="{{old('prot')}}"
     placeholder = "введите...">
  </div>
  @error('prot')
      <p class="text-danger">{{$message}}</p>

    @enderror
  <div class="form-group">
      <label for="category">Категория</label>
        <select class="form-select" id = "category" name = "category_id" >
          
        @foreach($categories as $category)  
          <option  
          {{ old ('category_id') == $category->id ? 'selected' : 'выбрать категорию'}}
           value="{{$category->id}}">{{$category->title}}</option>
        @endforeach
        </select>
    </div>
  <button type="submit" class="btn btn-primary mt-3">добавить</button>
</form>
    </div>@error('category')
      <p class="text-danger">{{$message}}</p>

    @enderror
@endsection