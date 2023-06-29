<?php

namespace App\Http\Controllers\Admin\Post;


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
      $postProducts = PostProduct::all();
      //dd($post);
      return view('admin.post.edit', compact('postProducts','posts', 'products', 'post'));

   } 

}
