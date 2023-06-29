<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">    
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
<title>Posts</title>
</head>
<body>
  <header class="header">  
    <div class='container'>
      <div class= 'row'>
        <div class="container-fluid">

        <nav class="navbar navbar-expand-sm" style="background-color: #87c4f1;">
  
    
          <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
              <a class="nav-link active" aria-current="page" href="#">Home</a>
              <a class="nav-link" href="{{route('main.index')}}">Main</a>
              <a class="nav-link" href="{{route('product.index')}}">Продукты</a>
              <a class="nav-link" href="{{route('post.index')}}">Рецепты</a>
              <a class="nav-link" href="{{route('about.index')}}">About</a>
              <a class="nav-link" href="{{route('contacts.index')}}">Contacts</a>
            </div>
          </div>
        </div>
        </nav>

    
     

      </div>
    </div>
    
    <div>
    
    </div>
  
    @yield('content')

    </body><!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

</html>