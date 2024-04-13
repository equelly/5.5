@extends('layouts.guest')
@section('content')

<body>
<section class="home">  
    <div class="container mt-10">
   <br>
   <br>
   <br>
        <div class="ml-4 pl-4">
            <div id = "searchpost" class="container mt-10">
                <searchpost-component></searchpost-component>
            </div>
            @if(auth()->user() && (auth()->user()->role=='user'|| auth()->user()->role=='admin'))
    
    
            <h1 class="title">Любимые <span>рецепты({{$userLikedPost->count()}})</span></h1>
            <div class="ml-5">
                @foreach($userLikedPost as $post)
               
                    <div class="card">
                    <div class="card-header " style="background: #99eb917d">
                   
                        <div class="callout mb-1 w-90 d-flex justify-content-between">
                            <div><a href ="{{route('post.show', $post->id)}} "><h3 class="fw-light text-muted">{{$post->title}}</h3></a></div>
                            <div  style="color:#63c34e;">
                                <form action="{{route('post.like.store', $post->id)}}" method="POST">
                                    @csrf
                                    <span>{{($post->liked_users_count) > 0 ? $post->liked_users_count : ''}}</span>
                                    <button type="submit" class="border-0 bg-transparent">
                                        @auth()
                                       
                                        @if(auth()->user()->likedPosts->contains($post->id))
                                    <i class="fas fa-heart" style="font-size:1.5em;color:#63c34e;"></i>
                                    @else
                                    <i class="far fa-heart" style="font-size:1.5em;color:#63c34e;"></i>
                                    @endif
                                @endauth
                                    </button>
                                </form>
                            </div>
                            </div>
                        </div>
                  
                    </div>
                <div class="card-body">
                    <p>необходимые продукты</p>
                    @foreach($postproducts as $postproduct)
                        @if($post->id ==$postproduct['post_id'])
                        
                            @foreach($products as $product)
                            
                            @if($postproduct['product_id'] == $product->id )
                            <a href ="{{route('product.show', $product->id)}} "> 
        
                            <div class="btn m-2 p-1" style = "width: auto;font-size: 1.5rem">{{$product->name}}/{{$postproduct['massa']}}гр.</div>
                            </a>
                            @endif
                           
                        
                            @endforeach
                        @endif
                    @endforeach
                    <hr>
                    @foreach($cut_posts as $cut_post)
                        @if($post->id == $cut_post['id'])
                        <p class="text-muted">Способ приготовления: {{$cut_post['content']}}</p>
                        <a href ="{{route('post.show', $post['id'])}} " style ="color:#63c34e">подробнее...</a>
                        @endif
                    @endforeach
            </div>
        </div>
        @endforeach
            
        </div>
    @endif 
    <h1 class="title">Топ <span>рецептов</span></h1>
            <div class="m-1">
                @foreach($likedPosts as $post)
                    <div class="card m-3">
                    <div class="card-header " style="background: #99eb917d">
                   
                        <div class="callout mb-1 w-90 d-flex justify-content-between">
                            <div><a href ="{{route('post.show', $post->id)}} "><h3 style="font-size:1.5em;color:#63c34e;">{{$post->title}}</h3></a></div>
                                <div style="color:#63c34e;">
                                <form action="{{route('post.like.store', $post->id)}}" method="POST">
                                    @csrf
                                    <span>{{($post->liked_users_count) > 0 ? "понравилось_". $post->liked_users_count : ''}}</span>
                                    <button type="submit" class="border-0 bg-transparent">
                                    @auth()
                                       
                                        @if(auth()->user()->likedPosts->contains($post->id))
                                        <i class="fas fa-heart" style="font-size:1.5em;color:#63c34e;"></i>
                                        @else
                                        <i class="far fa-heart" style="font-size:1.5em;color:#63c34e;"></i>
                                        @endif
                                    @endauth
                                    </button>
                                </form>
                                </div>
                        </div>
                  
                    </div>
                <div class="card-body">
                    <p>необходимые продукты</p>
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
                    <hr>
                    @foreach($cut_posts as $cut_post)
                        @if($post->id == $cut_post['id'])
                        <p class="text-muted">Способ приготовления: {{$cut_post['content']}}</p>
                        <a href ="{{route('post.show', $post['id'])}} " style ="color:#63c34e">подробнее...</a>
                        @endif
                    @endforeach
            </div>
        </div>
        @endforeach
            
        </div>
            <h1 class="title">Каталог <span>рецептов</span></h1>
                <h3>Всего рецептов: {{$posts->total()}}</h3>
            

        <div class="ml-5">
            @foreach($posts as $post)
            <div class="card">
                <div class="card-header " style="background: #99eb917d">
                   
                        <div class="callout mb-1 w-90 d-flex justify-content-between">
                            <div><a href ="{{route('post.show', $post->id)}} "><h3 class="fw-light text-muted">{{$post->title}}</h3></a></div>
                            <div style="color:#63c34e;">
                                <form action="{{route('post.like.store', $post->id)}}" method="POST">
                                    @csrf
                                    <span>{{($post->liked_users_count) > 0 ? $post->liked_users_count : ''}}</span>
                                    <button type="submit" class="border-0 bg-transparent">
                                        @auth()
                                        @if(auth()->user()->likedPosts->contains($post->id))
                                    <i class="fas fa-heart" style="font-size:1.5em;color:#63c34e;"></i>
                                    @else
                                    <i class="far fa-heart" style="font-size:1.5em;color:#63c34e;"></i>
                                    @endif
                                @endauth
                                    </button>
                                </form>
                            </div>
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
        
                            <div class="btn m-2 p-1" style = "width: auto;font-size: 1.2rem">{{$product->name}}/{{$postproduct['massa']}}гр.</div>
                            </a>
                            @endif
                           
                        
                            @endforeach
                        @endif
                    @endforeach
                    <hr>
                    @foreach($cut_posts as $cut_post)
                        @if($post->id == $cut_post['id'])
                        <p class="text-muted">Способ приготовления: {{$cut_post['content']}}</p>
                        <a href ="{{route('post.show', $post['id'])}} " style ="color:#63c34e">подробнее...</a>
                        @endif
                    @endforeach
            </div>
            </div>
            @endforeach
            
        </div>
<!-- пагинация-->
        <div class="d-flex justify-content-center">
        <div class="text-success" style="font-size: 20px">{{$posts->withQueryString()->links()}}</div>
        </div>
</section>
        
        
        
@endsection