<?php

namespace App\Http\Controllers\Admin\Product;


use App\Models\Post;
use App\Http\Controllers\Post\BaseController;
use App\Models\Category;
use App\Models\Product;

class ShowController extends BaseController
{
   public function __invoke($id)
   {
      $categories = Category::all();
      $products = Product::all();
      $posts = Post::all();
      $product = Product::FindOrFail($id);
      return view('admin.product.show', compact('product','posts','products', 'categories'));
  
   } 

}
