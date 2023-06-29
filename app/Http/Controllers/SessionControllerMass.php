<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use App\Models\Category;
use Illuminate\Http\Request;

class SessionController extends Controller
{
    //
    public function __invoke()
    { 
         session_start();
        if (!isset($_SESSION['cart']))
        {
        $_SESSION['cart'] = array();
        $_SESSION['post_product'] = array();
        }
       //отсортируем массив полученный из БД по алфавиту******* 
      $sorted = DB::table('products')
         ->orderBy('name', 'asc')
         ->simplePaginate(5);
      $products = Product::all();
      $categories = Category::all();
     
      /*
      $post_id = DB::table('posts')
                ->latest()
                ->first()->id;
                
      //dd($post_product);

       //print_r($_POST);*/
       
        
        // Добавляем элемент в конец массива $_SESSION['cart'].
        if (isset($_POST['action']) and $_POST['action'] == 'добавить')
         //dd($_POST);
        {
         
         //dd($_SESSION);
           
           $_SESSION['cart'][$_POST['product_id']] =$_POST['massa'] ;
          
          
          $sessionCart =  array_unique($_SESSION['cart']);
          
         //создаем массив для хранения выбранных продуктов 
         $productsCart = array();
         //и переменную в которой будем хранить сумму содержащихся углеводов
         $totalCarb = 0;
         $totalProt = 0;
         $totalFat = 0;
         $totalXE = 0;
         
        
         foreach ($sessionCart as $id=>$val)
            {
               foreach ($products as $product)
               {
               
               if ($product['id'] == $id)
                  {	
                     
                     $productsCart[] = $product;
                     
                     $totalXE += $product['carb']/100*$val/12*$product['G'];
                     $totalCarb += $product['carb']/100*$val;
                     $totalProt += $product['prot']/100*$val;
                     $totalFat += $product['fat']/100*$val;
                     $totalMassa[] = array(
                        'name'=> $product['name'],
                        'massa' => $val,

                     );
                        
                   
                     dd($totalMassa);
                  break;
                  }
                  
               }
            }
            $productsCart =  array_unique($productsCart);
           // dd($productsCart);
        }
        //$_SESSION[$post_id] = [$_POST['product_id']];
       // dd($_SESSION['post_product']);
        //добавляем рецепт в БД
      if (isset($_POST['action']) and $_POST['action'] == 'добавить рецепт'){
         
         
        //метод  request() возвращает данные из полей input - name='title', name= 'content' и т.д.
        //далее метод validate() валидирует эти данные
         $data = request()->validate([
            'title'=>'required|string',
            'content'=>'required|string',
            'image'=>''
         ]);
            //dd($data);
            $post = Post::create($data);
            $post->product()->attach($_SESSION['post_product']);
         // Опустошаем массив $_SESSION['cart'] для последующих рецептов
         unset($_SESSION['cart']);
         return redirect()->route('product.index');
         //return view('product.index', compact('sorted', 'categories', 'products'));

      }
       // var_dump($productsCart);
         if (isset($_POST['action']) and $_POST['action'] == 'Очистить')
               {
               // Опустошаем массив $_SESSION['cart'].
               unset($_SESSION['cart']);
              
               return view('product.index', compact('sorted', 'categories', 'products'));
               
               }

        return view('product.index', compact('sorted', 'categories', 'products', 'productsCart', 'totalXE', 'totalCarb', 'totalProt', 'totalFat', 'totalMassa'));
        
       
        //print_r($sessionCart);
       //return view('product.index', compact('sessionCart'));
       
      
    }
}
