@extends('layouts.guest')
@section('content')
    
</head>
<body>
<section class="home">
    <div class="container p-1 mt-5">
        <div class = "d-flex justify-content-between title">
            <div><H1>Рецепт:  <span> {{$post->title}}.</span></H1></div>
            <div><h1>всего рецептов: <span>  {{$posts->count()}}<span> </h1></div>
        </div>
        <div class="m-1">
           
            <div class="card enter" style="width:100%">
                <div class="card-header" style="background: #99eb917d">

                    <div class="callout mb-1 w-90"><a href ="{{route('post.show', $post->id)}} ">
                        <h3  style="font-size:1.5em;color:#63c34e;">{{$post->title}}</h3></a>
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
                            <div class="btn m-2 p-1" style = "width: auto;">{{$product->name}}/{{$postproduct['massa']}}гр.</div>
                            </a>
                            @endif
                                
                        
                            @endforeach
                        @endif
                    @endforeach
                    <p>Содержание в 100гр. :  {{$post->carb}} угл./ {{$post->prot}} белков/{{$post->fat}} жиров</p>
               <h3>хлебных ед. - 
               <input type="text" class="" style="width: 10rem; border-bottom: 2px solid #bdf5b0" placeholder = "{{$post->carbpercent}}">
                
                </h3> 
                
                    <hr>
                <p class="text-muted">Способ приготовления: {{$post->content}}</p>
                </div>
                @if ($post->image !== NULL)
                <p class="ml-3">вот что получилось!</p>
                    <div class="flex justify-content-center mt-4 m-2">
                       
                        <img src="{{asset('storage/'.$post->image)}}" alt='some photo...'>
                    </div>
                @endif
                <hr>
             
                @if((auth()->user() && auth()->user()->role == 'admin') || (auth()->user() && auth()->user()->id == $post->user_id))
      
     
                <div  class="flex justify-content-around">
                    <a href="{{route('post.edit', $post->id)}}" class="btn btn-success m-3 w-25 hover:bg-gray-500/50"><p style="color:white">редактировать</p></a>
                
                
                
                    <!--оборачиваем в форму т.к. в html нет метода delete -->
                    <form action="{{route('post.delete', $post->id)}}" method="POST" class="w-25 m-3">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-primary hover:bg-gray-500/50 w-100">удалить</button>
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
                    <textarea name = "message" class="form-control" rows="4" cols="50" style="font-size: 1.5rem;border-radius: 10px;
    border: 2px solid #73AD21;"
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
    
        <div class="toast m-4" style="display:block; font-size:0.8em; width: 75%;  border-radius: 10px;
    border: 2px solid #73AD21;" false role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header" style="background-color: transparent;">
              
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