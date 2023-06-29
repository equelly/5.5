<?php

namespace App\Http\Controllers\Product;


use App\Models\Post;
use App\Models\Product;
use App\Http\Controllers\Post\BaseController;

class CreateController extends BaseController
{
   public function __invoke()
   {
      $posts = Post::all();
        $products = Product::all();
        return view('post.create', compact('posts', 'products'));  
        
        
   } 

}
