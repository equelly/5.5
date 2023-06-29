<?php

namespace App\Http\Controllers\Admin\Product;


use App\Models\Post;
use App\Models\PostProduct;
use App\Models\Product;
use App\Http\Controllers\Post\BaseController;
use App\Models\Category;

class EditController extends BaseController
{
   public function __invoke(Product $product)
   {
      $categories = Category::all();
      $posts = Post::all();
      $products = Product::paginate(10);
      $postProducts = PostProduct::all();
      //dd($post);
      return view('admin.product.index', compact('postProducts','posts', 'products', 'product', 'categories'));

   } 

}
