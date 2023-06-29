<?php

namespace App\Http\Controllers\Product;


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

      dd($postproducts);
      $posts = Post::all();
      $post = Post::FindOrFail($id);
      return view('product.show', compact('post','posts', 'postproducts', 'products'));
  
   } 

}
