<?php

namespace App\Http\Controllers\Post;


use App\Models\Post;
use App\Http\Controllers\Post\BaseController;
use App\Models\PostProduct;
use App\Models\Product;

class ShowController extends BaseController
{
   public function __invoke($id)
   {
      $postproducts = PostProduct::all();
      $products = Product::all();

      //dd($postproducts);
      $posts = Post::all();
      $post = Post::FindOrFail($id);
      //dd($post->user_id);
      return view('post.show', compact('post','posts', 'postproducts', 'products'));
  
   } 

}
