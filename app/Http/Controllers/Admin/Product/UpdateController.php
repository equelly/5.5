<?php

namespace App\Http\Controllers\Admin\Product;


use App\Models\Post;
use App\Http\Controllers\Post\BaseController;
use App\Http\Requests\Post\UpdateRequest;
use App\Models\Product;

class UpdateController extends BaseController
{
   public function __invoke(UpdateRequest $request, Product $product)
   {
      $data = $request->validated();
      
     $this->service->update($product, $data);
     return redirect()->route('admin.product.show', $product->id);
     
 }
 public function destroy(Product $product)
 {
     
     $product->destroy($product->id);
     return redirect()->route('admin.product.index');

   } 

}
