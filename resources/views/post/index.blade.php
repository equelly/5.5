@extends('layouts.main')
@section('content')
    <title>Posts</title>
</head>
<body>
    <H1>рецепты</H1>
    <p><h3>всего рецептов:  {{$posts->count()}}</h3></p>
     <div>
        <a href="{{route('post.create')}}" class="btn btn-primary mb-3">добавить новый рецепт</a>
     </div>
    @foreach($posts as $post)
    <div>
    <a href ="{{route('post.show', $post->id)}} "> {{$post->id}}. {{$post->title}}____{{$post->content}}</a>
    @endforeach
    </div>
    
@endsection