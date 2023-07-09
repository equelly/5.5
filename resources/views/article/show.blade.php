@extends('layouts.guest')
@section('content')
   
<body>
    
    
    <br>
    <br>
<section class="home">
<h1 class="title">Статья <span>название темы</span></h1>
        <H1>Просмотр</H1>
        <div class="card m-4" style="width: 90%;">
                <div class="card-header" style="background: #99eb917d">

                    <div class="callout mb-1 w-90">
                        <h3 class="fw-light text-muted">{{$article->title}}</h3>
                    </div>
                </div>
                <p class="m-4"> {{$article->content}}</p>
                
                <hr>
                    <div>
                        <a href="{{route('articles.index')}}" class="btn btn-primary m-3">вернуться к списку статей</a>
                    </div>
                    @if (auth()->user() && auth()->user()->role == 'admin')
                        <div>
                            <a href="{{route('article.edit', $article->id)}}" class="btn btn-primary m-3">редактировать</a>
                        </div>
                        <div>
                            <!--оборачиваем в форму т.к. в html нет метода delete -->
                            <form action="{{route('article.delete', $article->id)}}" method="POST">
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