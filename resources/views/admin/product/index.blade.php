@extends('layouts.admin')

@section('content')

<title>добавить продукт</title>
</head>
<body>
    <H1>продукты</H1>
    <p>количество: {{$products->total()}}</p>
   
     <div>
        <a href="{{route('admin.product.create')}}" class="btn btn-primary mb-3">добавить новый продукт</a>
     
   <div class="col-4">
    <div id="list-example" class="list-group-flush sticky-top ">
    <h3>категории</h3>
      <div class="table-responsive">
            @foreach($categories as $category)
            <div>
            <a href ="{{route('admin.product.showByCategory', $category->id)}} "> {{ $category->id}}. {{ $category->title}}</a>
            @endforeach
           
            <div class="col-7">	 
        <h3>каталог</h3>   
    @foreach($products as $product)
    <div>
    <a href ="{{route('admin.product.show', $product->id)}} "> 
        
        {{$product->id}}. {{$product->name}} = {{$product->carb}}</a>
    @endforeach
    </div>
    </div>
        </div>
    </div>
   </div>
   
   
        </div>
        <div>
        {{$products->links()}}
        </div>
@endsection