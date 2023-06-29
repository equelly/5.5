<aside class="main-sidebar sidebar-primary navbar-dark elevation-4 bg-teal">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="{{asset('dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      @can('view', auth()->user())
      <span class="brand-text font-weight-light">{{auth()->user()->role}}</span>
      @endcan
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset('dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
        @can('view', auth()->user())
          <a href="#" class="d-block">{{auth()->user()->name}}</a>
        @endcan
        </div>
      </div>

      <!-- SidebarSearch Form -->
        <div id = "searchpost">
        <searchpost-component></searchpost-component>
        </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
              
               <li class="nav-header">Панель функций</li>
          <li class="nav-item ">
            <a href="#" class="nav-link bg-lightblue">
            <i class="nav-icon fas fa-file"></i>
              <p>
                Рецепты
                <i class="right fas fa-angle-left"></i>
                <span class="badge badge-info right">{{$posts->count()}}</span>
                
              </p>
            </a>
            <ul class="nav nav-treeview">
            <!--can('view', auth()->user())-->
              <li class="nav-item">
                <a href="{{route('admin.post.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Каталог рецептов</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('admin.post.create')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Добавить</p>
                </a>
              </li>
              <!--endcan --> 
            </ul>
            

          <li class="nav-item ">
            <a href="products" class="nav-link bg-lightblue">
          
            <i class="nav-icon fas fa-solid fa-book"></i> 
              <p>
                Продукты
                <i class="right fas fa-angle-left"></i>
                <span class="badge badge-info right">{{$products->count()}}</span>
                
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
              <a href="{{route('admin.product.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Каталог продуктов</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('admin.product.create')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Добавить</p>
                </a>
              </li>
            </ul>
          </li>
               
          <li class="nav-item">
            <a href="pages/kanban.html" class="nav-link">
            <i class="nav-icon fas fa-newspaper"></i>
           
              <p>
                Статьи
              </p>
            </a>
          </li>
          <li class="nav-item">
          <a href="pages/calendar.html" class="nav-link">
            <i class="nav-icon far fa-calendar-alt"></i>
           
              <p>
                Календарь
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>