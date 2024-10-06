@extends('layouts.guest')
@section('content')
    <title>Мои рецепты</title>
</head>
<body>
<body>
<section class="home">
<h1 class="title"> Мои рецепты <span>
<p><h1>{{$myrecipes->count()==0 ? 'пока нет' : $myrecipes->count()}}</h1></p>
       
               
            
   </span>  <a href="{{route('product.index')}}" class="btn">К каталогу</a></h1>
   
   @foreach($myrecipes as $post)
    <div class="m-3">
        <div class="card d-flex justify-content-between">
            <div class="card-header" style="background: #99eb917d">

                <div class="callout mb-1 w-90">
                        <h3 class="fw-light text-muted">{{$post->title}}</h3>
                    </div>
                </div>
               
                
                    <div class="m-4">
                        <p class="text-muted">содержит в 100 граммах:
                            <div class="d-flex justify-content-between">
                            <div>углеводов</div><div>{{$post->carb}}гр.</div>
                            </div>
                            <div class="d-flex justify-content-between">
                            <div>белков</div><div>{{$post->prot}}гр.</div>
                            </div>
                            <div class="d-flex justify-content-between">
                            <div>жиров</div><div>{{$post->fat}}гр.</div>
                            </div>
                        <p class="text-muted">гикемический индекс: </p>
                        @foreach($cut_posts as $cut_post)
                        
                        @if($post->id == $cut_post['id'])
                        <p class="text-muted">Способ приготовления: {{$cut_post['content']}}</p>
                        <a href ="{{route('post.show', $post->id)}} " style ="color:#63c34e">подробнее...</a>
                        @endif
                    @endforeach
                        <p class="text-muted">note: </p>
                    </div>
                <hr>
                   
                    @if (auth()->user() && auth()->user()->role == 'admin')
                        <div>
                            <a href="{{route('post.edit', $post->id)}}" class="btn btn-primary m-3">редактировать</a>
                        </div>
                        <div>
                            <!--оборачиваем в форму т.к. в html нет метода delete -->
                            <form action="{{route('product.delete', $post->id)}}" method="POST">
                                @csrf
                                @method('delete')
                                <input type="submit" value = "удалить!" class="btn btn-primary m-3">
                            </form>
                            
                        </div>
                    @endif
            </div>
        </div>

    
    
   
   
       
        
        @endforeach
        
    
</section> 

    
    


@endsection