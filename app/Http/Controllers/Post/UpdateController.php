<?php

namespace App\Http\Controllers\Post;


use App\Models\Post;
use App\Http\Controllers\Post\BaseController;
use App\Http\Requests\Post\UpdateRequest;
use App\Models\PostProduct;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class UpdateController extends BaseController
{
   public function __invoke(UpdateRequest $request, Post $post)
   {
      $products = Product::all();
      //dd($request);
      //создаем массив для хранения id продуктов и их масс..
      $session= array();
      //перебираем массив продуктов выбранных и полученных в результате запроса в переменной $request
      foreach($request->massa as $k=>$key){
         
         foreach($request->products as $id=>$product_id){
            if($k == $id){
       // в этом массиве содержаться id-продуктов как ключи со значениями массивами их масс переберем и их
         foreach($key as $m){
      //..и добавляем в массив для хранения id продуктов и их масс 
            $session[$k]= array('massa'=>$m);
         }
      }
      }
      };
      
      //создаем массив для хранения выбранных продуктов 
      $productsCart = array();
      //и переменные в которых будем хранить сумму содержащихся углеводов, белков, жиров, ХЕ
      $totalCarb = 0;
      $totalProt = 0;
      $totalFat = 0;
      $totalXE = 0;
      $sumMass = 0;
      $carbpercent = 0;
      //а также массив названий продуктов и их массу
      $totalMassa = [];
      
      
      //dd($session);
      foreach ($session as $id=>$val)
         {
            //dd($session);
            foreach ($val as $k=>$v)
            {
               
               foreach ($products as $product)
               {
                  if ($product['id'] == $id)
                     {	
                        
                        $productsCart[] = $product;
                        $totalXE += round($product['carb']/100*$v/12*$product['G'], 2);
                        $totalCarb += $product['carb']/100*$v;
                        $totalProt += $product['prot']/100*$v;
                        $totalFat += $product['fat']/100*$v;
                        $totalMassa[] = array(
                           'name'=> $product['name'],
                           'massa' => $v
                        );
                        $sumMass += $v;
                     break;
                     }
               }
            } 
         }
        
        
                       
                        $carbpercent = round($totalXE/$sumMass*100, 2);
                        $totalCarb = round($totalCarb/$sumMass*100, 2);
                        $totalProt = round($totalProt/$sumMass*100, 2);
                        $totalFat = round($totalFat/$sumMass*100, 2);
                     
        //dd($request);
             $data = request()->validate([
            
               'title'=>'required|string',
               'content'=>'required|string',
               'products'=>'',
               'user_id'=>'',
               'image'=>''
                        ]);
        
     $data['carb'] = $totalCarb;
     $data['prot'] = $totalProt;
     $data['fat'] = $totalFat;
     $data['carbpercent'] = $carbpercent;
     //$data['products'] = $session[$k];
     //dd($data);

     $this->service->update($post, $session, $data);
     return redirect()->route('post.show', $post->id);
     
 }
 public function destroy(Post $post)
 {
     
     $post->destroy($post->id);
     return redirect()->route('post.index', compact('error'));

   } 

}
