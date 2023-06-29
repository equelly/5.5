<?php

namespace App\Http\Controllers\Post;


use App\Models\Post;
use App\Http\Controllers\Post\BaseController;
use App\Http\Filters\PostFilter;
use App\Http\Requests\Post\FilterRequest;
use App\Models\PostProduct;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class IndexController extends BaseController
{
   public function __invoke(FilterRequest $request)
   {    
         
         //шаблонный подход filter
         $data = $request->validated();
         $filter = app()->make(PostFilter::class, ['queryParams' =>array_filter($data)]);
         //в $filter массив данных из строки запроса
         //метод из трейта scopeFilter = filter
         //dd($filter);
         $posts = Post::filter($filter)->paginate(10);

/*реализация фильтра пример:  +++++++++++++++++++++++++       
         public function __invoke(FilterRequest $request)
         {
               $data = $request->validated();
        
        //создаем динамический запрос
        $query = Post::query();
        
        if(isset($data['title'])){
         //к объекту класса Post хранящемся в переменной $query применим метод where первый аргумент ’название колонки’ 
        
         //  оператор сравнения like и между любыми символами % ’данные запроса’ 
         $query->where('title', 'like',"%{$data['title']}%");
         }
         //результат работы передадим в переменную $posts, если нет значения у ключа, передаются все
         
         $posts = $query->get();
         dd($posts);+++++++++++++++++++++++++++*/
      //метод all выведет все записи,а для пагинации применяется метод paginate()
      //$posts = Post::paginate(2);
      $all_posts = Post::all();
      $products = Product::all();
      $postproducts = PostProduct::all();
     
                        //dd($postproducts);
      return view('post.index', compact('posts', 'products', 'postproducts', 'all_posts'));
   } 

}
