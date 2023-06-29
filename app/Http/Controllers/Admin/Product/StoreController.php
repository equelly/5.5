<?php

namespace App\Http\Controllers\Admin\Product;



use App\Http\Controllers\Post\BaseController;
use App\Http\Requests\Post\StoreRequest;

class StoreController extends BaseController
{
   public function __invoke(StoreRequest $request)
   {  
    //Request
        $data = $request->validated();
    //Service   
        $this->service->store($data);
        
        return redirect()->route('admin.product.index');
      
    }
   
}
