@extends('layouts.admin')

@section('content')
<body>
    <H1>выбран продукт:</H1>
    
   
    <div>

    <p> {{$product->id}}. {{$product->name}}</p>
    <p> категория:
    @foreach($categories as $category)
    {{$category->id == $product->category_id ? $category->title:''}}
    
    @endforeach</p>
    </div>
    <div>
        <a href="{{route('admin.product.index')}}" class="btn btn-primary mt-3">вернуться к списку продуктов</a>
    </div>
    <div>
        <a href="{{route('admin.product.edit', $product->id)}}" class="btn btn-primary mt-3">редактировать</a>
    </div>
    <div>
        <!--оборачиваем в форму т.к. в html нет метода delete -->
        <form action="{{route('admin.product.delete', $product->id)}}" method="post">
            @csrf
            @method('delete')
            <input type="submit" value = "удалить!" class="btn btn-primary mt-3">
        </form>
        
    </div>

@endsection