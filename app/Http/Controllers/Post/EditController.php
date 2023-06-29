<?php

namespace App\Http\Controllers\Post;


use App\Models\Post;
use App\Models\PostProduct;
use App\Models\Product;
use App\Http\Controllers\Post\BaseController;


class EditController extends BaseController
{
   public function __invoke(Post $post)
   {
      $posts = Post::all();
      $products = Product::all();
      $postproducts = PostProduct::all();
      //dd($post);
      return view('post.edit', compact('postproducts','posts', 'products', 'post'));

   } 

}
