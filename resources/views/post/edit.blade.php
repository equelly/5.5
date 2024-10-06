@extends('layouts.guest')
@section('content')

<body>
<section class="home">
<h1 class="title"> Карточка <span>рецепта</span></h1>
  <H1>Редактировать рецепт:</H1>
    <div class="ml-5">
      <div class="card enter">
        <div class="card-header" style="background: #99eb917d">
          <div class="callout mb-1 w-90">
            <form action = "{{route('post.update', $post->id)}}" method = "POST" class="flex justify-center" enctype="multipart/form-data">
              <!-- токен для безопасной передачи данных всеми методами кроме get-->    
              @csrf
              <!--токен для редактирования, т.к. в html нет метода put/patch -->
              @method('patch')
            <input type="text" name = "title" value ="{{old('title')}}" class="form-control w-75 m-4" style="font-size: 18px;" id="title" placeholder = '{{$post->title}}' >
            @error('title')<br>
              <p class="text-danger">{{$message}}</p>
            @enderror
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
                    <ul>   
                      <li>
                      <input class="form-check-input checked:bg-cyan-300 hover:border-green-300" type="checkbox" name = "products[]" value="{{$product->id}}" id="{{$product->id}}" checked> 
                      <label class="form-check-label hover:font-cyan-300  hover:text-green-400" for="{{$product->id}}">-{{$product->name}}_____{{$postproduct['massa']}}гр.</label>
                      </li>
                    </ul>
                      
                    @endif
                  @endforeach
                @endif
              @endforeach
              @error('products')
                <p class="text-danger">{{$message}}</p>
              @enderror
                <p>содержание (в %-x):  {{$post->carb}} угл./ {{$post->prot}} белков/{{$post->fat}} жиров</p>
                <p class="title enter">хлебных ед. - <span>{{$post->carbpercent}}</span></p>  
               
                    <label for="content" class="form-label">Способ приготовления</label>
                      <textarea rows="5" name = "content" class="form-control enter" 
                      id="content" placeholder = '{{$post->content}}'>{{old('content')}}</textarea>
                      @error('content')
                      <p class="text-danger">{{$message}}</p>
                      @enderror
                  @if ($post->image !== NULL)
                <p class="ml-3">фото </p>
                    <div class="flex justify-content-center m-4">
                       
                        <img src="{{asset('storage/'.$post->image)}}" alt='нет фото...'>
                    </div>
                @endif
          </div>
          @if((auth()->user() && auth()->user()->role == 'admin') || (auth()->user() && auth()->user()->id == $post->user_id))
            <div class="grid justify-items-start">
            <button type="submit" class="btn btn-primary m-3 w-25">обновить</button>
            </div>
          </form>      
  
               
              @can('view', auth()->user())
              <!--оборачиваем в форму т.к. в html нет метода delete -->
                <form action="{{route('post.delete', $post->id)}}" method="POST" class="grid justify-items-end">
                  @csrf
                    @method('delete')
                      <button type="submit" class="btn btn-primary m-3 w-25">удалить</button>
                </form>
              @endcan        
            
            </div>   
          @endif

    
        
      </div>
    </div>
              
</section>
    
@endsection