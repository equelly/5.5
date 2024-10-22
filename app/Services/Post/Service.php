<?php

namespace App\Services\Post;

use App\Models\Post;
use App\Models\PostProduct;
use Illuminate\Support\Facades\DB;

class Service 
{
public function store($data)
{
  
  //выделяем в отдельный массив массив продуктов привязанных к рецeпту(post)
    $products = $data['products'];
  //и удаляем его из массива data, т.к. в валидации нет для записи products(a в БД поля)    
    unset($data['products']);
    //без проверки на уникальность по атрибуту 'title'----------
    //$post = Post::create($data);
   //-----------------------------------------------------------
   //с проверкой на уникальность, если в БД eсть такой атрибут(поле 'title'), то добавлен не будет
    $post = Post::firstOrCreate([
        'title'=>$data['title']
      ],
    [
      'title'=>$data['title'],
      'content'=>$data['content'],
      'image'=>$data['image'],
    ]);

  
    $post->title;
    //dd($post);
    $post->product()->attach($products);
  
}

public function update($post, $session, $data)
{
      
      // удалим старые записи из БД 
      DB::table('post_products')->where('post_id', '=', $post->id)->delete();
      //при условии существованя массива  в переданных данных'products' и если он не пустой
      if(isset($session) && count($session) != null){
     
        
          //a из массива $data удалим для последующей его валидации 
            unset($data['products']);  
            //переберем два массива первый с id выбранных продуктов второй с их массами
            
              
              foreach($session as $product_id=>$val){
               
                foreach($val as $k=>$massa){
                
                //затем заново создаем поля с id рецепта и id продуктов
                PostProduct::firstOrCreate([
                'post_id'=>$post->id,
                'product_id'=>$product_id
                ]);
                // обновляем старые записи из таблицы post_products в БД с условием что поле в колонке product_id = id-переданного продукта
                DB::table('post_products')->where('product_id', '=', $product_id)->update(['massa' => $massa]);
                }
              }
            
               
      }
        $post->update($data);
          
    
        return redirect()->route('post.index');
}
public function mydata(){
  return  "done";
} 
}
