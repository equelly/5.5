@extends('layouts.guest')
@section('content')
    <title>статьи</title>
</head>
<body>
<br>
<br>
  <br>
    <H1 class="m-3">добавить статью в БД</H1>
    
    
    <div style="font-size: 18px;">
      <form action =  "{{route('article.store')}}" method = "POST">
          <!-- токен для безопасной передачи данных всеми методами кроме get-->    
          @csrf
        <div class="m-3  w-75" style="display: flex; flex-wrap: wrap; align-content: center;">
          <label for="name" class="form-label">наименование</label>
          <input type="text" name = "title" value ="{{old('title')}}" class="form-control" style="font-size: 18px;"
          id="title" placeholder = "введите название">
          
          @error('name')
            <p class="text-danger">{{$message}}</p>

          @enderror
        </div>
        <div class="m-3">
          <label for="content" class="form-label">Содержание</label>
          <textarea name = "content" class="form-control" style="font-size: 16px; height:800px;"
          id="content" placeholder = "Текст статьи >>>">{{old('content')}}</textarea>
          @error('content')
            <p class="text-danger">{{$message}}</p>

          @enderror
        </div>
        <div class="form-group m-3 w-50">
            <label for="category">Категория</label>
              <select class="form-select" id = "category" name = 'category_id' style="font-size: 18px;">
                
              @foreach($categories as $category)  
                <option  
                {{ old ('category_id') == $category->id ? 'selected' : 'выбрать категорию'}}
                value="{{$category->id}}">{{$category->title}}</option>
              @endforeach
              </select>
        </div>
        <button type="submit" class="btn btn-primary m-3">добавить</button>
      </form>
    </div>
    @error('category')
      <p class="text-danger">{{$message}}</p>
    @enderror

@endsection