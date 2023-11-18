@extends('layouts.guest')
@section('content')
    
</head>
<body>
<section class="home">
    <div class="container p-1">
        <H1 class="title">Рецепт:  <span> {{$post->title}}.</span></H1>
        <p><h3>всего рецептов:  {{$posts->count()}}</h3></p>
        <div class="m-1">
           
            <div class="card" style="width:100%">
                <div class="card-header" style="background: #99eb917d">

                    <div class="callout mb-1 w-90"><a href ="{{route('post.show', $post->id)}} ">
                        <h3 class="fw-light text-muted">{{$post->title}}</h3></a>
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
                <p class="text-muted">Способ приготовления: {{$post->content}}</p>
                </div>
                <hr>
                <div>
                    <a href="{{route('post.index')}}" class="btn btn-primary m-3" style="width: 95%;">вернуться к рецептам</a>
                </div>
                @if((auth()->user() && auth()->user()->role == 'admin') || (auth()->user() && auth()->user()->id == $post->user_id))
      
     
                <div>
                    <a href="{{route('post.edit', $post->id)}}" class="btn btn-primary m-3" style="width: 95%;">редактировать</a>
                </div>
                
                <div>
                    <!--оборачиваем в форму т.к. в html нет метода delete -->
                    <form action="{{route('post.delete', $post->id)}}" method="POST">
                        @csrf
                        @method('delete')
                        <input type="submit" value = "удалить!" class="btn btn-primary m-3" style="width: 95%;">
                    </form>
                    
                </div>
                @endif
            </div>
        
            <div  class="mt-5">
            
                
            @if(auth()->user() && (auth()->user()->role=='user'|| auth()->user()->role=='admin'))              
                <div>
                <form action="{{route('post.comment.store', $post->id)}}" method="POST"> 
                    @csrf
                    <label for="content" class="form-label"><i class='far fa-edit' style='font-size:24px;color:#63c34e'></i>оставить комментарий</label>
                    <textarea name = "message" class="form-control" rows="4" cols="50" style="font-size: 1.5rem;"
                    id="content" placeholder = "текст комментария..." required>{{old('content')}}</textarea>
                    @error('content')
                    <p class="text-danger">{{$message}}</p>

                    @enderror
                    <button type="submit" class="btn btn-primary m-4">добавить</button>
                </form>    
                </div>
            @endif
            </div>   
        </div>  
    </div>
    <H1 class="title">Комментарии <span>({{$comments->count()}})</span></H1>
    @foreach($comments as $comment)
    
        <div class="toast m-4" style="display:block; font-size:1.1em; width: 90%" false role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header">
              
                <strong class="me-auto">{{$comment->name}} </strong>
                <small class="text-body-secondary">{{$comment->created_at}}</small>
                @if(auth()->user() && (auth()->user()->name == $comment->name))
                
                <form action="{{route('post.comment.delete', [$post->id, $comment->id])}}" method="POST"> 
                    @csrf
                    @method('DELETE')
                <button type="submit" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                </form>
                @endif
            </div>
            <div class="toast-body">
            {{$comment->message}}
            </div>
        </div>
    @endforeach
       

    </section>
  
   
    
    
    


@endsection