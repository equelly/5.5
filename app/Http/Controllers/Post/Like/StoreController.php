<?php

namespace App\Http\Controllers\Post\Like;



use App\Http\Controllers\Post\BaseController;

use App\Models\Post;
use App\Models\User;



class StoreController extends BaseController
{
   public function __invoke(Post $post)
   {  
    
    //в модели User определена функция likedPosts 
    auth()->user()-> likedPosts ()->toggle($post->id);

    return redirect()->route('post.index', $post->id);

    
    }
   
}