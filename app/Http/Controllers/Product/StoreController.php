<?php

namespace App\Http\Controllers\Product;



use App\Http\Controllers\Product\BaseController;
use App\Http\Requests\Product\StoreRequest;
use App\Models\Product;

class StoreController extends BaseController
{
   public function __invoke(StoreRequest $request)
   {  
    dd($request);
    //Request
        $data = $request->validated();
    //Service 
    //для синхронного добавления++++  
    /*
        $this->service->store($data);
      return redirect()->route('post.index');
      */
    //+++++++
    //для асинхронного добавления с помощью Vue
      $product = Product::create($data);
       return $product;
        
      
    }
   
}
