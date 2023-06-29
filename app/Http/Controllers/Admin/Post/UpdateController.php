<?php

namespace App\Http\Controllers\Admin\Post;


use App\Models\Post;
use App\Http\Controllers\Post\BaseController;
use App\Http\Requests\Post\UpdateRequest;

class UpdateController extends BaseController
{
   public function __invoke(UpdateRequest $request, Post $post)
   {
      $data = $request->validated();
      
     $this->service->update($post, $data);
     return redirect()->route('admin.post.show', $post->id);
     
 }
 public function destroy(Post $post)
 {
     
     $post->destroy($post->id);
     return redirect()->route('admin.post.index');

   } 

}
