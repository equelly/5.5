<?php

namespace App\Http\Controllers\Product;


use App\Models\Product;
use App\Http\Controllers\Post\BaseController;


class DestroyController extends BaseController
{
   public function __invoke(Product $product)
   {
      $product->destroy($product->id);
        return redirect()->route('product.index');

   } 

}
