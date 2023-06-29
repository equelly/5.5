<?php

namespace App\Http\Controllers\Post;



use App\Http\Controllers\Post\BaseController;
use App\Http\Requests\Post\StoreRequest;
use App\Models\Post;

class StoreController extends BaseController
{
   public function __invoke(StoreRequest $request)
   {  
    //dd(1111111111);
    //Request
        $data = $request->validated();
    //Service 
    //для синхронного добавления++++  
        $this->service->store($data);
      return redirect()->route('post.index');
    //+++++++
    //для асинхронного добавления с помощью Vue
     // $post = Post::create($data);
     //   return $post;
        
      
    }
   
}
