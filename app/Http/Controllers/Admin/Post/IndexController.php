<?php

namespace App\Http\Controllers\Admin\Post;


use App\Models\Post;
use App\Http\Controllers\Controller;
use App\Http\Filters\PostFilter;
use App\Http\Requests\Post\FilterRequest;
use App\Models\Product;

class IndexController extends Controller
{
   public function __invoke(FilterRequest $request)
   {   
      
  
       //шаблонный подход filter
       $data = $request->validated();
       $filter = app()->make(PostFilter::class, ['queryParams' =>array_filter($data)]);
       //в $filter массив данных из строки запроса
       //метод из трейта scopeFilter = filter
       //dd($filter);
      $products = Product::all();
      
       $posts = Post::filter($filter)->paginate(10); 
      //возвращает файл index.blade.php от view->/admin/post 
      return view('admin.post.index', compact('posts', 'products'));
   } 

}
