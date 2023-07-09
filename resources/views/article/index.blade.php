@extends('layouts.guest')
@section('content')

<body>

  
  <section class="home">
    
  <h1 class="title"> Темы <span>статей</span> </h1>
    <!-- Slider main container -->
    <div class="subswiper">
      <!-- Additional required wrapper -->
      <div class="preview-list swiper-wrapper">
        <!-- Slides -->
        @foreach($categories as $category)
        
        <div class="preview-item swiper-slide">
          <div class="text">
            <a href="{{route('product.showByCategory', $category->id)}} " class="btn-slide" style="background:#94bda3; width: 15rem; height: 7rem;">{{$category->title}}</a>
          </div>
          
        </div>
        @endforeach
      </div>
      <div class="swiper-pagination"></div>

     
   

    </div>

  </section>
  <section class="home">
   
    @if (auth()->user() && auth()->user()->role == 'admin') 
    <button class="btn btn-primary mt-3"><a  type="button" href="{{route('article.create')}}" class="nav-link">добавить новую статью</a></button>
    @endif
      
   
        <div class="">
            @foreach($cut_articles as $article)
            <div class="card m-4" style="width: 90%;" >
              <div class="card-header" style="background: #99eb917d">
                <div class="callout mb-1 w-90"><a href ="{{route('article.show', $article['id'])}} ">
                  <h3 class="fw-light text-muted">{{$article['title']}}</h3></a>
                </div>
              </div>  
              <div class="card-body">
                <p class="text-muted">{{$article['content']}}</p><a href ="{{route('article.show', $article['id'])}} ">подробнее...</a>
              </div>
            </div>
            @endforeach
            
        </div>



  <div>
    {{$articles->links()}}
  </div>
  @endsection
  