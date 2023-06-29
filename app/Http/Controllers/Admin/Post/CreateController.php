<?php

namespace App\Http\Controllers\Admin\Post;


use App\Models\Post;
use App\Models\Product;
use App\Http\Controllers\Post\BaseController;

class CreateController extends BaseController
{
   public function __invoke()
   {
      $posts = Post::all();
        $products = Product::all();
        return view('admin.post.create', compact('posts', 'products'));  
        
        
   } 

}
