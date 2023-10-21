<?php

namespace App\Http\Controllers\Post\Comment;



use App\Http\Controllers\Post\BaseController;
use App\Models\Comment;
use App\Models\Post;




class DeleteController extends BaseController
{
   public function __invoke(Post $post, Comment $comment)
   { 
    
    $comment->delete();
    

    return redirect()->route('post.show', $post->id);

    
    }
   
}