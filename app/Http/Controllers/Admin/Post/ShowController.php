<?php

namespace App\Http\Controllers\Admin\Post;


use App\Models\Post;
use App\Http\Controllers\Post\BaseController;
use App\Models\Product;

class ShowController extends BaseController
{
   public function __invoke($id)
   {
      $products = Product::all();
      $posts = Post::all();
      $post = Post::FindOrFail($id);
      return view('admin.post.show', compact('post','posts','products'));
  
   } 

}
