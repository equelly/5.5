@extends('layouts.admin')

@section('content')
<H1>рецепты</H1>
    <div>
        <p><h3>всего Pецептов:  {{$posts->total()}}</h3></p>
        <div>
            <a href="{{route('admin.post.create')}}" class="btn btn-primary mb-3">добавить новый рецепт</a>
        </div>
        @foreach($posts as $post)
        <div>
        <a href ="{{route('admin.post.show', $post->id)}} "> {{$post->id}}. {{$post->title}}____{{$post->content}}</a>
        @endforeach
        </div>
        <!-- пагинация-->
        <div>
            {{$posts->withQueryString()->links()}}
           
        </div>
      
        <div id = "post">
        <post-component></post-component>
        </div>
    </div>
   
@endsection