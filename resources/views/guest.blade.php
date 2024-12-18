@extends('layouts.guest')

@section('content')
<body>
    


<section class="home">
  <swiper-container style="--swiper-navigation-color: #fff; --swiper-pagination-color: #fff" class="mySwiper"
    speed="1000" parallax="true" pagination="true" pagination-clickable="true" navigation="true">
    <div slot="container-start" class="parallax-bg"
      style="background-image: url(https://swiperjs.com/demos/images/nature-1.jpg);" data-swiper-parallax="-23%"></div>

    <swiper-slide>
      <a href="{{route('post.index')}}"><p class="title" data-swiper-parallax="-300">Рецепты</p></a>
      <p class="subtitle" data-swiper-parallax="-200">Быстрый расчет хлебных единиц</p>
      <div class="" data-swiper-parallax="-100">
  
      <p>
            На любой странице Вы можете найти продукты для рецепта в поле поиска меню указать массу каждого продукта и калькулятор рассчитает суммарое количество хлебных единиц 
            
            
      </p>
        <p class="subtitle" data-swiper-parallax="-200">Доступны множество рецептов </p>
          <p>   
            Для каждого рецепта уже рассчитаны количество содержащихся углеводов, жиров, белков и хлебных единиц.
          </p>
      </div>
    </swiper-slide>
    <swiper-slide>
    <a href="{{route('product.index')}}"><p class="title" data-swiper-parallax="-300">Продукты</p></a>
        <p class="subtitle" data-swiper-parallax="-200">Составить рецепт</p>
        <div class="" data-swiper-parallax="-100">
      
    
        <p>
            Для Вашего рецепта это приложение быстро рассчитает количество белков, жиров, углеводов, хлебных единиц с учетом гликемического индекса продуктов.
            Нужно найти необходимые продукты в каталоге или через поиск, ввести количество в граммах, кликнуть (добавить) и в карточке рецепта описать способ приготовления.
            Зарегистируйтесь и Вы сможете добавлять рецепты в общюю базу данных!Не придется повторно рассчитывать и
            Ваш рецепт будет доступен для всех пользователей.
        </p>   
         
      </div>
    </swiper-slide>
    <swiper-slide>
    <a href="{{route('articles.index')}}"><p class="title" data-swiper-parallax="-300">Статьи</p></a>
        <p class="subtitle" data-swiper-parallax="-200">В разработке...</p>
        <div class="" data-swiper-parallax="-100">
            
        <p>
          Советы и рекомендации специалистов, врачей, научные статьи помогут больше узнать и правильно организовать здоровое питание
        </p>
      </div>
    </swiper-slide>
  </swiper-container>
</section>

@endsection
  <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-element-bundle.min.js"></script>
