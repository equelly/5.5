@extends('layouts.guest')
@section('content')

<body>
<section class="home">
<h1 class="title"> Карточка <span>рецепта</span></h1>
  <H1>Редактировать рецепт:</H1>
    <div class="ml-5">
      <div class="card m-4 w-75">
        <div class="card-header" style="background: #99eb917d">
          <div class="callout mb-1 w-90">
            <form action =  "{{route('post.update', $post->id)}}" method = "POST">
              <!-- токен для безопасной передачи данных всеми методами кроме get-->    
              @csrf
              <!--токен для редактирования, т.к. в html нет метода put/patch -->
              @method('patch')
            <input type="text" name = "title" value ="{{old('title')}}" class="form-control w-75 m-4" style="font-size: 18px;" id="title" placeholder = '{{$post->title}}' >
          </div>
        </div>
          <div class="card-body">
            <p>
              необходимые продукты
            </p>
              @foreach($postproducts as $postproduct)
                @if($post->id ==$postproduct['post_id'])
                  @foreach($products as $product)
                    @if($postproduct['product_id'] == $product->id )
                      <a href ="{{route('product.show', $product->id)}} "> 
                        <div class="btn btn-outline-primary m-2 p-1" style = "width: auto;font-size: 1.2rem">{{$product->name}}/{{$postproduct['massa']}}гр.</div>
                      </a>
                    @endif
                  @endforeach
                @endif
              @endforeach
                <p>содержание (в %-x):  {{$post->carb}} угл./ {{$post->prot}} белков/{{$post->fat}} жиров</p>
                  <h3>хлебных ед. - 
                    <input type="text" class="" style="width: 10rem; border-bottom: 2px solid #bdf5b0" placeholder = "{{$post->carbpercent}}">
                  </h3> 
                  <hr>
                    <label for="content" class="form-label">Способ приготовления</label>
                      <textarea rows="5" name = "content" class="form-control" 
                      id="content" placeholder = '{{$post->content}}' style="font-size: 14px;" ></textarea>
                      @error('content')
                    <p class="text-danger">{{$message}}</p>

                  @enderror
          </div>
            <div>
              <a href="{{route('post.index')}}" class="btn btn-primary m-3" style="width: 95%;">вернуться к рецептам</a>
            </div>
              @can('view', auth()->user())
            <div>
            <!--оборачиваем в форму т.к. в html нет метода delete -->
              <form action="{{route('post.delete', $post->id)}}" method="post">
                @csrf
                  @method('delete')
                    <input type="submit" value = "удалить!" class="btn btn-primary m-3" style="width: 95%;">
              </form>
                    
            </div>
                @endcan

        </form>
      </div>
    </div>
              
</section>
    
@endsection