@extends('layouts.guest')
@section('content')
   
<body>
    <br>
    <br>
    <br>
    <br>
<section class="home">
<h1 class="title"> Карточка <span>продукта</span></h1>
        <H1>выбран продукт:</H1>
        <div class="card m-4 w-75">
                <div class="card-header" style="background: #99eb917d">

                    <div class="callout mb-1 w-90">
                        <h3 class="fw-light text-muted">{{$product->name}}</h3>
                    </div>
                </div>
                <div class="card-body">
                    <p> категория:
                    @foreach($categories as $category)
                    {{$category->id == $product->category_id ? $category->title:''}}
                    
                    @endforeach</p>
                </div>
                <hr>
                    <div class="m-4">
                        <p class="text-muted">содержит в 100 граммах: {{$product->carb}}углеводов/{{$product->prot}}белков/{{$product->fat}}жиров</p>
                        <p class="text-muted">гикемический индекс: {{$product->G}}</p>
                        <p class="text-muted">note: </p>
                    </div>
                <hr>
                    <div>
                        <a href="{{route('product.index')}}" class="btn btn-primary m-3">вернуться к списку продуктов</a>
                    </div>
                    @if (auth()->user() && auth()->user()->role == 'admin')
                        <div>
                            <a href="{{route('product.edit', $product->id)}}" class="btn btn-primary m-3">редактировать</a>
                        </div>
                        <div>
                            <!--оборачиваем в форму т.к. в html нет метода delete -->
                            <form action="{{route('product.delete', $product->id)}}" method="POST">
                                @csrf
                                @method('delete')
                                <input type="submit" value = "удалить!" class="btn btn-primary m-3">
                            </form>
                            
                        </div>
                    @endif
        </div>
    </div>
</section>

@endsection