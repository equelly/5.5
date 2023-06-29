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
            <h1 class="title">Каталог <span>рецептов</span></h1>
                <h3>Всего рецептов: {{$posts->total()}}</h3>
            
        </div>
        <div class="ml-5">
            @foreach($posts as $post)
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
                    <hr>
                <p class="text-muted">рецепт: {{$post->content}}</p>
            </div>
            </div>
            @endforeach
            
        </div>
<!-- пагинация-->
        <div>
            {{$posts->withQueryString()->links()}}
        </div>
    </section>
        
        
        @can('view', auth()->user())
        <div id = "post">
        <post-component></post-component>
        </div>
        @endcan
    </div>
@endsection