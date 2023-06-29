<?php

namespace App\Http\Controllers\Admin\Product;


use App\Models\Post;
use App\Models\Product;
use App\Http\Controllers\Post\BaseController;
use App\Models\Category;

class CreateController extends BaseController
{
   public function __invoke()
   {
      $categories = Category::all();
      $posts = Post::all();
        $products = Product::all();
        return view('admin.product.create', compact('posts', 'products', 'categories'));  
        
        
   } 

}
