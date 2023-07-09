@extends('layouts.guest')
@section('content')

<body>
<section class="home">
<H1>Редактировать рецепт:</H1>
    <div class="ml-5">
      <div class="card m-4 w-75">
        <div class="card-header" style="background: #99eb917d">
          <div class="callout mb-1 w-90">
            <form action =  "{{route('article.update', $article->id)}}" method = "POST">
              <!-- токен для безопасной передачи данных всеми методами кроме get-->    
              @csrf
              <!--токен для редактирования, т.к. в html нет метода put/patch -->
              @method('patch')
            <input type="text" name = "title" value ='{{$article->title}}' class="form-control w-75 m-4" style="font-size: 18px;" id="title"  >
          </div>
        </div>
        <hr>
                    <label for="content" class="form-label">Содержание</label>
                      <textarea rows="2" name = "content" class="form-control" 
                      id="content" placeholder = 'скопируйте и вставте отредактированный текст' style="font-size: 14px;" ></textarea>
                      @error('content')
                    <p class="text-danger">{{$message}}</p>

                  @enderror
                  <div class="form-group m-4">
                    <label for="category">Категория</label>
                      <select class="form-select w-25" name = "category_id" id="category">
                        <option selected>темы
                      @foreach($categories as $category)  
                      
                        <option 
                          {{$category->id == $article->category_id ? 'selected' : ''}}
                        
                        value="{{$category->id}}">{{$category->title}}</option>
                      @endforeach
                      </select>
                  
                    <button type="submit" class="btn btn-primary mt-3  w-50">обновить</button>
                  </div>
        </div>
    </div>
</section>

@endsection