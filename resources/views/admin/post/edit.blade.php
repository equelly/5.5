@extends('layouts.admin')
@section('content')
    <title>Posts</title>
</head>
<body>
    <H1>Редактировать рецепт №{{$post->id}}.</H1>
    <p><h3>всего рецептов:  {{$posts->count()}}</h3></p>
    
    <div>
    <form action =  "{{route('admin.post.update', $post->id)}}" method = "post">
    <!-- токен для безопасной передачи данных всеми методами кроме get-->    
    @csrf
    <!--токен для редактирования, т.к. в html нет метода put/patch -->
    @method('patch')
  <div class="mb-3">
    <label for="title" class="form-label">Title</label>
    <input type="text" name = "title" class="form-control" id="title" placeholder = "title" value = "{{$post->title}}">
    
  </div>
  <div class="mb-3">
    <label for="content" class="form-label">Content</label>
    <textarea name = "content" class="form-control" id="content" placeholder = "content">{{$post->content}}</textarea>
    
  </div>
  <div class="mb-3">
    <label for="image" class="form-label">Image</label>
    <input type="text" name = "image" class="form-control" id="image" placeholder = "image.jpeg" value = "{{$post->image}}">
    
  </div>
  <div class="form-group">
    <label for="products">продукты</label>
    <select multiple class = "form-control" name = "products[]" id="products">
      @foreach($products as $product)

      <option 
        @foreach($postProducts as $postProduct)
        {{$product->id === $postProduct->product_id && $post->id === $postProduct->post_id ? 'selected' : ''}}
        @endforeach
        value="{{$product->id}}">{{$product->name}}
        
      </option>
      @endforeach
      
    </select>
     
  </div><div>
        <button type="submit" class="btn btn-primary mb-3">обновить </button>
  
        <a href="{{route('admin.post.index')}}" class="btn btn-primary mb-3">вернуться</a>
    </div>
</form>
    </div>
@endsection