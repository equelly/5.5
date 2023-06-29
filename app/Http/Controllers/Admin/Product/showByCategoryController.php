<?php

namespace App\Http\Controllers\Admin\Product;


use App\Models\Post;
use App\Http\Controllers\Post\BaseController;
use App\Models\Category;
use App\Models\Product;

class showByCategoryController extends BaseController
{

   
   public function __invoke($id)
   {
      $categories = Category::all();
      dd(11111111111);
      $product_cat = Product::where('category_id',$id)->get();
      $products = Product::all();
     $posts = Post::all();
      
      $categories = Category::all();
      return view('admin.product.showByCategory', compact('product_cat', 'categories', 'id', 'posts', 'products'));
    
   } 

}
