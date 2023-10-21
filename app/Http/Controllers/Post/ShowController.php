<?php

namespace App\Http\Controllers\Post;


use App\Models\Post;
use App\Http\Controllers\Post\BaseController;
use App\Models\Comment;
use App\Models\PostProduct;
use App\Models\Product;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class ShowController extends BaseController
{
   public function __invoke($id)
   {
      $postproducts = PostProduct::all();
      $products = Product::all();

      //dd($postproducts);
      $posts = Post::all();
     
      $post = Post::FindOrFail($id);
    
      //для вывода коммертариев и авторов объедим табл БД с условием соответсвия id выбранного рецепта (post)
      
       $comments = DB::table('comments')
      ->join('users', 'users.id', '=', 'comments.user_id')
      ->join('posts', 'posts.id', '=', 'comments.post_id')
      ->select('comments.*', 'users.name', 'comments.message')
      ->where('post_id', $id)
      ->where('comments.deleted_at','=', NULL)
      ->get();
    //сделать доступной в любом месте приложения
    //пропишем локаль в App\Providers\AppServiceProvider.php
      //  Carbon::setlocale('ru_Ru');
      //в коллекции комментариев отформатируем поле created_at с помощью класса Carbon и его методов
      foreach($comments as $comment){
         $comment->created_at = Carbon::parse($comment->created_at)->translatedFormat('d F Y');
      }

     //dd($comment);
            return view('post.show', compact('post','posts', 'postproducts', 'products', 'comments'));
  
   } 

}
