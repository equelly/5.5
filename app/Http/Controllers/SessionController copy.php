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
       //отсортируем массив полученный из БД по алфавиту******* 
      $sorted = DB::table('products')
         ->orderBy('name', 'asc')
         ->simplePaginate(5);
      $products = Product::all();
      $categories = Category::all();

       //print_r($_POST);
        session_start();
        if (!isset($_SESSION['cart']))
        {
        $_SESSION['cart'] = array();
        }
        
        if (!isset($_SESSION['post_product']))
        {
        $_SESSION['post_id']= array();
        }
        dd($_SESSION);
        // Добавляем элемент в конец массива $_SESSION['cart'].
        if (isset($_POST['action']) and $_POST['action'] == 'добавить')
         //dd($_POST['product_id']);
        {
        // dd($_SESSION['post_id']);
           $_SESSION['post_id'] = $_POST['product_id'];
           $_SESSION['cart'][$_POST['product_id']] =$_POST['massa'] ;
          
          
          $sessionCart =  array_unique($_SESSION['cart']);
          //dd($sessionCart);
         //создаем массив для хранения выбранных продуктов 
         $productsCart = array();
         //и переменные в которых будем хранить сумму содержащихся углеводов, белков, жиров, хлебных единиц
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
      
                  break;
                  }
                  
               }
            }
            $productsCart =  array_unique($productsCart);
            //dd($totalCarb, $totalProt);
        }
        //добавляем рецепт в БД
      if (isset($_POST['action']) and $_POST['action'] == 'добавить рецепт'){
         
         
        //метод  request() возвращает данные из полей input - name='title', name= 'content' и т.д.
        //далее метод validate() валидирует эти данные
         $data = request()->validate([
            'title'=>'required|string',
            'content'=>'required|string',
            'image'=>''
         ]);
            //dd($_SESSION['post_product']);
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
               unset($_SESSION);
              
               return view('product.index', compact('sorted', 'categories', 'products'));
               
               }

        return view('product.index', compact('sorted', 'categories', 'products', 'productsCart', 'totalXE', 'totalCarb', 'totalProt', 'totalFat', 'totalMassa'));
        
       
        //print_r($sessionCart);
       //return view('product.index', compact('sessionCart'));
       
      
    }
}
