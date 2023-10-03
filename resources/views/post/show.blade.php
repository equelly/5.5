@extends('layouts.guest')
@section('content')
    
</head>
<body>
<section class="home">
    <div class="container p-5">
        <H1 class="title">Рецепт <span>№{{$post->id}}.</span></H1>
        <p><h3>всего рецептов:  {{$posts->count()}}</h3></p>
        <div class="ml-5">
           
            <div class="card m-4 w-75">
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
                <p class="text-muted">рецепт: {{$post->content}}</p>
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
                    <form action="{{route('post.delete', $post->id)}}" method="post">
                        @csrf
                        @method('delete')
                        <input type="submit" value = "удалить!" class="btn btn-primary m-3" style="width: 95%;">
                    </form>
                    
                </div>
                @endif
            </div>
        </div>
         
            
        </div>
    </section>
  
   
    
    
    


@endsection