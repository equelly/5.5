<?php

namespace App\Http\Controllers\Admin\Product;


use App\Models\Post;
use App\Http\Controllers\Post\BaseController;


class DestroyController extends BaseController
{
   public function __invoke(Post $post)
   {
      $post->destroy($post->id);
        return redirect()->route('admin.product.index');

   } 

}
