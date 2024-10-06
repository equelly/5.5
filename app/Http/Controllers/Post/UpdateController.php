<?php

namespace App\Http\Controllers\Post;


use App\Models\Post;
use App\Http\Controllers\Post\BaseController;
use App\Http\Requests\Post\UpdateRequest;
use Illuminate\Support\Facades\DB;

class UpdateController extends BaseController
{
   public function __invoke(UpdateRequest $request, Post $post)
   {
      
      $data = $request->validated();
        // обновляем старые записи из таблицы в БД posts с условием что поле в колонке id = id-переданного рецепта
       // DB::table('posts')->where('id', '=', $post->id)->update(['fat' => '1000']);
     //dd($post->product);
     //dd($data['products'][0]);
     $this->service->update($post, $data);
     return redirect()->route('post.show', $post->id);
     
 }
 public function destroy(Post $post)
 {
     
     $post->destroy($post->id);
     return redirect()->route('post.index', compact('error'));

   } 

}
