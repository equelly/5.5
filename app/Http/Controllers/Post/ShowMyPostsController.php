<?php

namespace App\Http\Controllers\Post;

use Illuminate\Support\Facades\DB;
use App\Models\Post;
use App\Http\Controllers\Post\BaseController;
use App\Models\PostProduct;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class ShowMyPostsController extends BaseController
{
   public function __invoke()
   {
      $id = Auth::user()->id;
      $myrecipes = DB::table('posts')
      ->where('user_id', '=', $id)
      ->get();
      
      $postproducts = PostProduct::all();
      $products = Product::all();

      //dd($postproducts);
      $posts = Post::all();
      $post = 2;
      //dd($post->user_id);
      return view('post.showMyRecipe', compact('post','posts', 'postproducts', 'products', 'myrecipes'));
  
   } 

}
