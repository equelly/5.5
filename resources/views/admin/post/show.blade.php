@extends('layouts.admin')

@section('content')
<title>Posts</title>
</head>
<body>
    <H1>Рецепт №{{$post->id}}.</H1>
    <p><h3>всего рецептов:  {{$posts->count()}}</h3></p>
   
    <div>
    {{$post->id}}. {{$post->title}}____{{$post->content}}
   
    </div>
    <div>
        <a href="{{route('admin.post.index')}}" class="btn btn-primary mt-3">вернуться к рецептам</a>
    </div>
    <!-- директива can принимает арументом способность 'view' и пользователя из auth()->user() из объекта класса AdminPolicy-->
    @can('view', auth()->user())
    <div>
        <a href="{{route('admin.post.edit', $post->id)}}" class="btn btn-primary mt-3">редактировать</a>
    </div>
    
    <div>
        <!--оборачиваем в форму т.к. в html нет метода delete -->
        <form action="{{route('admin.post.delete', $post->id)}}" method="POST">
            @csrf
            @method('delete')
            <input type="submit" value = "удалить!" class="btn btn-primary mt-3">
        </form>
        
    </div>
    @endcan
@endsection