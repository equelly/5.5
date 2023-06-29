@extends('layouts.admin')

@section('content')
<section class="footer">
<div class="card" style="width: 22rem; float: right; box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.5);">
  <div class="card-body">
    <h5 class="card-title">Калькулятор хлебных единиц</h5>
    <?php //print_r($_SESSION)?>
  </div>
  <ul class="list-group list-group-flush">
    <div id = "listCount"></div>
    
  </ul>
  <div class="card-body">

    <p>Итого: XE(хлебных ед.)
    <input id="sum" type="text" placeholder='XE'value="" style="width: 5rem; float: right;"></p>
  
  </div>
  <div class="card-body">
    <button  type="submit" style="width:100%" class="button btn-cart"name="action" id = "clear" value="" onclick="localStorage.clear();">Очистить</button>
    <a href="/admin/post" class="button btn-cart"style="width:100%; text-align: center;">Вернуться к выбору продуктов</a>
  </div>
</div>	
 </section>
@endsection
