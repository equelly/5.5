<?php

namespace App\Http\Controllers\Product;


use App\Models\Post;
use App\Models\PostProduct;
use App\Models\Product;
use App\Http\Controllers\Post\BaseController;


class EditController extends BaseController
{
   public function __invoke(Product $product)
   {
      $posts = Post::all();
      $products = Product::all();
      $postProducts = PostProduct::all();
      //dd($post);
      return view('product.edit', compact('postProducts','posts', 'products', 'post'));

   } 

}
