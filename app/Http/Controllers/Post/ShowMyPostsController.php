<?php

namespace App\Http\Controllers\Post;

use Illuminate\Support\Facades\DB;
use App\Models\Post;
use App\Http\Controllers\Post\BaseController;
use App\Models\PostProduct;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;


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
      foreach($posts as $post){
        
         $cut_posts []= array(
             'id'=>$post['id'],
             'title'=> $post['title'],
             'content'=> Str::of($post['content'])->limit(15) 
         ); 
         }
      //dd($post->user_id);
      return view('post.showMyRecipe', compact('posts', 'postproducts', 'products', 'myrecipes', 'cut_posts'));
  
   } 

}
