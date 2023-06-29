<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Product;
use App\Models\PostProduct;
use Illuminate\Support\Facades\DB;
use App\Models\Category;


class SessionController extends Controller
{
    //
    public function __invoke()
    {
     
       //отсортируем массив полученный из БД по алфавиту******* 
      $sorted = DB::table('products')
         ->orderBy('name', 'asc')
         ->simplePaginate(10);
      $products = Product::all();
      $categories = Category::all();

       //print_r($_POST);
        session_start();
        if (!isset($_SESSION['cart']))
        {
        $_SESSION['cart'] = array();
        }
        
        // Добавляем элемент в конец массива $_SESSION['cart'].
        if (isset($_POST['action']) and $_POST['action'] == 'добавить')

        {
         //unset($_SESSION['cart']);
           $_SESSION['cart'][$_POST['product_id']] = array($_POST['product_id']=>$_POST['massa']);
           //$_SESSION['cart'][] = $_POST['product_id'];
           //dd($_SESSION['cart']);
           

         
          //dd($sessionCart);
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
         
         
         //dd($sessionCart);
         foreach ($_SESSION['cart'] as $id)
            {
               foreach ($id as $k=>$v)
               {
                  foreach ($products as $product)
                  {
                     if ($product['id'] == $k)
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
           
           // $sessionCart =  array_unique($_SESSION['cart']);
          
                           //dd($sumMass);
                           $carbpercent = round($totalXE/$sumMass*100, 2);
            return view('product.index', compact('sorted', 'categories', 'products', 'productsCart', 'totalXE', 'totalCarb', 'totalProt', 'totalFat', 'totalMassa', 'carbpercent', 'sumMass'));
        
        }
       
        //добавляем рецепт в БД
      if (isset($_POST['action']) and $_POST['action'] == 'добавить рецепт'){
         
        
        //метод  request() возвращает данные из полей input - name='title', name= 'content' и т.д.
        //далее метод validate() валидирует эти данные
         $data = request()->validate([
            
            'title'=>'required|string',
            'content'=>'required|string',
            'carbpercent'=>'',
            'carb'=>'',
            'prot'=>'',
            'fat'=>'',
            'user_id'=>'',
            'image'=>''
         ]);
        // dd($data);
            //
            $post = Post::create($data);
           //из массива $_SESSION['cart'] выберем данные для добавления 
           foreach($_SESSION['cart'] as $k=>$v){
               foreach($v as $product_id=>$massa){

                  //обращаемся к классу PostProduct и добавляем выбранные данные в БД
                  PostProduct::firstOrCreate([
                     'product_id'=>$product_id,
                     'post_id'=>$post->id,
                     'massa'=>$massa
                  ]);
               }
         }
            //метод attach привязывает данные через промежуточную табл post_products, но без дополнительных полей created _at, updated_at, massa
            //$post->product()->attach($_SESSION['cart']);
         // Опустошаем массив $_SESSION['cart'] для последующих рецептов
         
         unset($_SESSION['cart']);
         
         return redirect()->route('product.index');
         
      }
       
         if (isset($_POST['action']) and $_POST['action'] == 'Очистить')
               {
               // Опустошаем массив $_SESSION['cart'].
               unset($_SESSION['cart']);
              
               return view('product.index', compact('sorted', 'categories', 'products'));
               
               }
/*$authors = User::find(2)->posts;
foreach ($authors as $author) {
   //
   dd($author->user_id);
}*/

            return view('product.index', compact('sorted', 'categories', 'products'));
        
       
        //print_r($sessionCart);
       //return view('product.index', compact('sessionCart'));
       
      
    }
}
