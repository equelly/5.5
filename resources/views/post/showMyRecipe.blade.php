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
   
   @foreach($myrecipes as $recipe)
   <div class="card m-4 w-75">
                <div class="card-header" style="background: #99eb917d">

                    <div class="callout mb-1 w-90">
                        <h3 class="fw-light text-muted">{{$recipe->title}}</h3>
                    </div>
                </div>
               
                
                    <div class="m-4">
                        <p class="text-muted">содержит в 100 граммах: {{$recipe->carb}}углеводов/{{$recipe->prot}}белков/{{$recipe->fat}}жиров</p>
                        <p class="text-muted">гикемический индекс: </p>
                        <p class="text-muted">note: </p>
                    </div>
                <hr>
                   
                    @if (auth()->user() && auth()->user()->role == 'admin')
                        <div>
                            <a href="{{route('product.edit', $recipe->id)}}" class="btn btn-primary m-3">редактировать</a>
                        </div>
                        <div>
                            <!--оборачиваем в форму т.к. в html нет метода delete -->
                            <form action="{{route('product.delete', $recipe->id)}}" method="POST">
                                @csrf
                                @method('delete')
                                <input type="submit" value = "удалить!" class="btn btn-primary m-3">
                            </form>
                            
                        </div>
                    @endif
        </div>

    
    
   
   
       
        
        @endforeach
        
    
</section> 

    
    


@endsection