<?php

namespace App\Http\Controllers\Admin\Product;


use App\Models\Post;
use App\Http\Controllers\Controller;
use App\Http\Filters\PostFilter;
use App\Http\Requests\Post\FilterRequest;
use App\Models\Category;
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
      $products = Product::paginate(5);
      $categories = Category::all();
       $posts = Post::filter($filter)->paginate(2); 
      //возвращает файл index.blade.php от view->/admin/post 
      return view('admin.product.index', compact('posts', 'products', 'categories'));
   } 

}
