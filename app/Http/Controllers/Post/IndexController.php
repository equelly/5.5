<?php

namespace App\Http\Controllers\Post;


use App\Models\Post;
use App\Models\User;
use App\Http\Controllers\Post\BaseController;
use App\Http\Filters\PostFilter;
use App\Http\Requests\Post\FilterRequest;
use App\Models\PostProduct;
use App\Models\Product;
use Illuminate\Support\Str;


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

      foreach($posts as $post){
        
         $cut_posts []= array(
             'id'=>$post['id'],
             'title'=> $post['title'],
             'content'=> Str::of($post['content'])->limit(15) 
         ); 
         }


      $all_posts = Post::all();
      $products = Product::all();
      $postproducts = PostProduct::all();

      //в модели класса Post прописан метод likedUsers(), который отдает коллекцию(массив) соответствующих отношений таблиц в БД, 
      
      //а метод laravel "withCount" их посчитает, orderBy('<поля сотировки>', 'DESC')-отсортирует,get()- вернет массив, take()- возмет из массива указанное аргументом кол-во элементов


     $likedPosts = Post::withCount('likedUsers')->orderBy('liked_users_count', 'DESC')->get()->take(10);
     
     if(auth()->user()){
      $userLikedPost = auth()->user()->likedPosts;
      
      return view('post.index', compact('posts', 'products', 'postproducts', 'all_posts', 'userLikedPost', 'likedPosts', 'cut_posts'));
     };
      

      

      return view('post.index', compact('posts', 'products', 'postproducts', 'all_posts', 'likedPosts', 'cut_posts'));
   } 

}
